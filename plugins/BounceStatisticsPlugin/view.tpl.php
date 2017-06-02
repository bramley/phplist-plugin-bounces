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
 * This is the html template
 */

/**
 *
 * Available fields
 * - $tabs: WebblerTabs
 * - $listing: results
 * - $help: CommonPlugin_Widget
 * - $download: CommonPlugin_Widget
 */
?>
<div>
    <hr>
<?php echo $toolbar; ?>
    <div style='padding-top: 10px;'>
<?php if (isset($form)) echo $form; ?>
<?php echo $listing; ?>
        <p><a href='#top'>[<?php echo $this->i18n->get('top'); ?>]</a></p>
    </div>
</div>
