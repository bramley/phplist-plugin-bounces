<?php
/**
 * BounceStatisticsPlugin for phplist
 * 
 * This file is a part of BounceStatisticsPlugin.
 *
 * @category  phplist
 * @package   BounceStatisticsPlugin
 * @author    Duncan Cameron
 * @copyright 2011-2017 Duncan Cameron
 * @license   http://www.gnu.org/licenses/gpl.html GNU General Public License, Version 3
 */

/**
 * This class holds the fields entered in the url, and provides an interface to the DAO
 */
class BounceStatisticsPlugin_Model extends CommonPlugin_Model
{
    protected $properties = array(
        'page' => 'reason',
        'selectedAttrs' => array()
    );
    protected $persist = array(
        'selectedAttrs' => '',
    );
    public $attributes;

    public function __construct(array $attributes)
    {
        parent::__construct('BounceStatistics');
        $this->attributes = $attributes;
        // remove selected attributes that no longer exist and re-index
        $this->properties['selectedAttrs'] = array_values(
            array_filter(
                $this->properties['selectedAttrs'],
                function ($attrId) {
                    return isset($this->attributes[$attrId]);
                }
            )
        );
    }
}
