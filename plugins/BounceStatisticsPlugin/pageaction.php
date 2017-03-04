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
 * This page and class are used to display the phplist help dialog.
 */

class BounceStatisticsPlugin_PageactionController extends CommonPlugin_Controller
{
}

$controller = new BounceStatisticsPlugin_PageactionController();
$action = isset($_GET['action']) ? $_GET['action'] : null;
$controller->run($action);
