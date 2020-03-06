<?php

/**
 * BounceStatisticsPlugin for phplist.
 *
 * This file is a part of BounceStatisticsPlugin.
 *
 * @category  phplist
 *
 * @author    Duncan Cameron
 * @copyright 2011-2017 Duncan Cameron
 * @license   http://www.gnu.org/licenses/gpl.html GNU General Public License, Version 3
 */

/**
 * This class is a concrete implementation of CommonPlugin_ControllerFactoryBase.
 *
 * @category  phplist
 */
use phpList\plugin\Common\Container;

class BounceStatisticsPlugin_ControllerFactory extends CommonPlugin_ControllerFactoryBase
{
    /**
     * Custom implementation to create a controller using plugin and page.
     *
     * @param string $pi     the plugin
     * @param array  $params further parameters from the URL
     *
     * @return CommonPlugin_Controller
     */
    public function createController($pi, array $params)
    {
        $depends = include __DIR__ . '/depends.php';
        $container = new Container($depends);
        $class = $pi . '_Controller_' . ucfirst($params['page']);

        return $container->get($class);
    }
}
