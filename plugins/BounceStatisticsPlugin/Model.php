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
 * This class holds the fields entered in the url, and provides an interface to the DAO
 */
class BounceStatisticsPlugin_Model extends CommonPlugin_Model
{
    /*
     *    private variables
     */
    private $dao;

    /*
     *    Inherited protected variables
     */
    protected $properties = array(
        'page' => 'reason',
        'selectedAttrs' => array()
    );
    protected $persist = array(
        'selectedAttrs' => '',
    );
    /*
     *    Public variables
     */
    public $attributes = array();

    /*
     *    Private methods
     */
    private function filterAttrs($key)
    {
        return isset($this->attributes[$key]);
    }
    /*
     *    Public methods
     */
    public function __construct($db)
    {
        parent::__construct('BounceStatistics');
        $this->dao = new BounceStatisticsPlugin_DAO_Bounce($db);
        $this->attributeDAO = new CommonPlugin_DAO_Attribute($db);
        $this->attributes = $this->attributeDAO->attributesById();
        // remove selected attributes that no longer exist and re-index
        $this->properties['selectedAttrs']
            = array_values(array_filter($this->properties['selectedAttrs'], array($this, 'filterAttrs')));
    }

    public function listBounceDomains($start = null, $limit = null)
    {
        return $this->dao->listBounceDomains($start, $limit);
    }

    public function totalBounceDomains()
    {
        return $this->dao->totalBounceDomains();
    }

    public function listBounceReasons($start = null, $limit = null)
    {
        return $this->dao->listBounceReasons($this->attributes, $start, $limit);
    }

    public function totalBounceReasons()
    {
        return $this->dao->totalBounceReasons();
    }

    public function bouncedUsers($start = null, $limit = null)
    {
        return $this->dao->bouncedUsers($this->attributes, $start, $limit);
    }

    public function totalBouncedUsers()
    {
        return $this->dao->totalBouncedUsers();
    }

}
