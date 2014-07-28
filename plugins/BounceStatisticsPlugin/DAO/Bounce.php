<?php
/**
 * BounceStatisticsPlugin for phplist
 * 
 * This file is a part of BounceStatisticsPlugin.
 *
 * @category  phplist
 * @package   BounceStatisticsPlugin
 * @author    Duncan Cameron
 * @copyright 2011-2013 Duncan Cameron
 * @license   http://www.gnu.org/licenses/gpl.html GNU General Public License, Version 3
 */

/**
 * This class provides access to the database tables
 */
class BounceStatisticsPlugin_DAO_Bounce extends CommonPlugin_DAO
{
    const PLUGIN = 'BounceStatisticsPlugin';

    private $case;

    private function userAttributeJoin($attributes, $searchTerm = null, $searchAttr = null)
    {
        $searchTerm = sql_escape($searchTerm);
        $attr_fields = '';
        $attr_join = '';

        foreach ($attributes as $attr) {
            $id = $attr['id'];
            $tableName = "{$this->table_prefix}listattr_{$attr['tablename']}";

            $joinType = ($searchTerm && $searchAttr == $id) ? 'JOIN' : 'LEFT JOIN';
            $thisJoin = "
                $joinType {$this->tables['user_attribute']} ua{$id} ON ua{$id}.userid = u.id AND ua{$id}.attributeid = {$id} ";
            
            switch ($attr['type']) {
            case 'radio':
            case 'select':
                $thisJoin .= "
                $joinType {$tableName} la{$id} ON la{$id}.id = ua{$id}.value ";
                
                if ($searchTerm && $searchAttr == $id) {
                    $thisJoin .= "AND la{$id}.name LIKE '%$searchTerm%' ";
                }
                $attr_fields .= ", la{$id}.name as attr{$id}";
                break;
            default:
                if ($searchTerm && $searchAttr == $id) {
                    $thisJoin .= "AND ua{$id}.value LIKE '%$searchTerm%' ";
                }
                $attr_fields .= ", ua{$id}.value as attr{$id}";
                break;
            }
            $attr_join .= $thisJoin;
        }
        return array($attr_join, $attr_fields);
    }

    public function listBounceReasons($attributes, $start, $limit)
    {
        $limitClause = is_null($start) ? '' : "LIMIT $start, $limit";
        $sql = 
            "SELECT umb.bounce
            FROM {$this->tables['user_message_bounce']} AS umb
            JOIN {$this->tables['user']} AS u ON umb.user = u.id
            JOIN {$this->tables['bounce']} AS b ON b.id = umb.bounce
            JOIN {$this->tables['message']} AS m ON m.id = umb.message
            ORDER BY umb.bounce
            $limitClause";

        $bounces = $this->dbCommand->queryColumn($sql, 'bounce');

        if (count($bounces) == 0) {
            return array();
        }
        $bounces = implode(', ', $bounces);

        list($attr_join, $attr_fields) = $this->userAttributeJoin($attributes);
        $sql = 
           "SELECT u.email, u.id, umb.message, umb.bounce, umb.time AS bouncedate,
            $this->case
            $attr_fields
            FROM {$this->tables['user_message_bounce']} AS umb
            JOIN {$this->tables['user']} AS u ON umb.user = u.id
            JOIN {$this->tables['bounce']} AS b ON b.id = umb.bounce
            JOIN {$this->tables['message']} AS m ON m.id = umb.message
            $attr_join
            WHERE umb.bounce IN ($bounces)
            ORDER BY umb.bounce";

        return $this->dbCommand->queryAll($sql);
    }

    public function totalBounceReasons() 
    {
        $sql = 
           "SELECT COUNT(u.email) AS t
            FROM {$this->tables['user_message_bounce']} AS umb
            JOIN {$this->tables['user']} AS u ON umb.user = u.id
            JOIN {$this->tables['bounce']} AS b ON b.id = umb.bounce
            JOIN {$this->tables['message']} AS m ON m.id = umb.message";

        return $this->dbCommand->queryOne($sql, 't');
    }

    public function bouncedUsers($attributes, $start, $limit)
    {
        $limitClause = is_null($start) ? '' : "LIMIT $start, $limit";
        list($attr_join, $attr_fields) = $this->userAttributeJoin($attributes);
        $sql = 
           "SELECT u.email, u.id, u.bouncecount, u.confirmed, u.blacklisted, ub.email as ub_email $attr_fields
            FROM {$this->tables['user']} AS u
            LEFT JOIN {$this->tables['user_blacklist']} ub ON u.email = ub.email
            $attr_join
            WHERE bouncecount > 0
            ORDER BY bouncecount DESC, email
            $limitClause";

        return $this->dbCommand->queryAll($sql);
    }

    public function totalBouncedUsers() 
    {
        $sql = 
           "SELECT COUNT(*) AS t
            FROM {$this->tables['user']} AS u 
            WHERE bouncecount > 0";
        return $this->dbCommand->queryOne($sql, 't');
    }

    public function listBounceDomains($start, $limit)
    {
        $limitClause = is_null($start) ? '' : "LIMIT $start, $limit";
        $sql = 
            "SELECT SUBSTRING_INDEX(email, '@', -1) AS domain, COUNT(*) AS bounces
            FROM {$this->tables['user']} AS u
            JOIN {$this->tables['user_message_bounce']} AS umb ON u.id = umb.user
            JOIN {$this->tables['bounce']} AS b ON b.id = umb.bounce
            GROUP by domain
            ORDER by bounces desc, domain
            $limitClause";

        return $this->dbCommand->queryAll($sql);
    }

    public function totalBounceDomains()
    {
        $sql =
            "SELECT COUNT(*) AS t FROM 
                (SELECT SUBSTRING_INDEX(email, '@', -1) AS domain
                FROM {$this->tables['user']} AS u
                JOIN {$this->tables['user_message_bounce']} AS umb ON u.id = umb.user
                JOIN {$this->tables['bounce']} AS b ON b.id = umb.bounce
                GROUP BY domain
                ) AS alias";

        return $this->dbCommand->queryOne($sql, 't');
    }

    public function __construct($dbCommand)
    {
        parent::__construct($dbCommand);

        if (!is_file($f = dirname(__FILE__) . '/reasons.php')) {
            throw new BounceStatisticsPlugin_DAO_MissingFileException($f);
        }
        $modTime = filemtime($f);

        if (!isset($_SESSION[self::PLUGIN]) || $_SESSION[self::PLUGIN]['modTime'] < $modTime) {
            include $f;

            $case = 
                "CASE";

            foreach ($reasons as $reason => $targets) {
                $reason = sql_escape($reason);

                foreach ($targets as $target) {
                    $target = sql_escape($target);
                    $case .= "\n            WHEN CAST(data AS CHAR) LIKE '%$target%' THEN '$reason'";
                }
            }
            $case .= "
                ELSE 'General Failure ...'
                END AS reason";
            $_SESSION[self::PLUGIN]['case'] = $case;
            $_SESSION[self::PLUGIN]['modTime'] = $modTime;
        }
        $this->case = $_SESSION[self::PLUGIN]['case'];
    }
}

class BounceStatisticsPlugin_DAO_MissingFileException extends CommonPlugin_Exception
{
    /*
     *    Public methods
     */
    public function __construct($f)
    {
        parent::__construct('File "%s" is missing', null, $f);
    }
}
