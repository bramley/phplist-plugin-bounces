<?php
/**
 * BounceStatisticsPlugin for phplist
 * 
 * This file is a part of BounceStatisticsPlugin.
 *
 * @category  phplist
 * @package   BounceStatisticsPlugin
 * @author    Duncan Cameron
 * @copyright 2011-2012 Duncan Cameron
 * @license   http://www.gnu.org/licenses/gpl.html GNU General Public License, Version 3
 */

/**
 * This class is a subclass of the base controller class that implements the CommonPlugin_IPopulator
 * interface to show bounces by reason 
 */
class BounceStatisticsPlugin_Controller_Reason 
    extends BounceStatisticsPlugin_Controller
    implements CommonPlugin_IPopulator, CommonPlugin_IExportable
{
    /*
     * Implementation of CommonPlugin_IPopulator
     */

    function populate(WebblerListing $w, $start, $limit)
    {
        $w->setTitle($this->i18n->get('bounce'));

        foreach ($this->model->listBounceReasons($start, $limit) as $row) {
            $key = $row['bounce'];
            $w->addElement($key, new CommonPlugin_PageURL('bounce', array('id' => $row['bounce'])));
            $w->addColumnEmail(
                $key, $this->i18n->get('User email'), $row['email'],
                new CommonPlugin_PageURL('user', array('id' => $row['id']))
            );
            $w->addColumn($key, $this->i18n->get('message id'), $row['message'],
                new CommonPlugin_PageURL('message', array('id' => $row['message']))
            );
            $w->addColumn($key, $this->i18n->get('Date'), $row['bouncedate']);

            foreach ($this->model->selectedAttrs as $attr) {
                $w->addColumn($key, $this->model->attributes[$attr]['name'], $row["attr{$attr}"]);
            }
            $w->addColumn($key, $this->i18n->get('reason'), $row['reason']);
        }
    }

    function total()
    {
        return $this->model->totalBounceReasons();
    }
    /*
     * Implementation of CommonPlugin_IExportable
     */
    public function exportRows()
    {
        return $this->model->listBounceReasons();
    }

    public function exportFieldNames()
    {
        $fields = array(
            $this->i18n->get('bounce'),
            $this->i18n->get('User email')
        );
        $fields[] = $this->i18n->get('message id');
        $fields[] = $this->i18n->get('bounce date');

        foreach ($this->model->selectedAttrs as $attr)
            $fields[] = $this->model->attributes[$attr]['name'];

        $fields[] = $this->i18n->get('reason');
        return $fields;
    }

    public function exportValues(array $row)
    {
        $values = array(
            $row['bounce'],
            $row['email']
        );
        $values[] = $row['message'];
        $values[] = $row['bouncedate'];

        foreach ($this->model->selectedAttrs as $attr)
            $values[] = $row["attr{$attr}"];
        $values[] = $row['reason'];
        return $values;
    }
}
