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
 * This class is a subclass of the base controller class that implements the CommonPlugin_IPopulator
 * interface to show bounces by reason.
 */
class BounceStatisticsPlugin_Controller_Users extends BounceStatisticsPlugin_Controller implements CommonPlugin_IPopulator, CommonPlugin_IExportable
{
    /*
     * Implementation of CommonPlugin_IPopulator
     */

    public function populate(WebblerListing $w, $start, $limit)
    {
        $w->setTitle($this->i18n->get('User email'));

        foreach ($this->dao->bouncedUsers($this->attributes, $start, $limit) as $row) {
            $key = $row['email'];
            $w->addElement($key, new CommonPlugin_PageURL('userhistory', array('id' => $row['id'])));

            foreach ($this->model->selectedAttrs as $attr) {
                $w->addColumn($key, $this->attributes[$attr]['name'], $row["attr{$attr}"]);
            }
            $w->addColumn($key, $this->i18n->get('bounce count'), $row['bouncecount']);
            $value = $row['confirmed']
                ? ''
                : new CommonPlugin_ImageTag('no.png', $this->i18n->get('not confirmed'));
            $w->addColumnHtml($key, $this->i18n->get('confirmed_heading'), $value);

            $value = $row['blacklisted']
                ? new CommonPlugin_ImageTag('user.png', $this->i18n->get('User is blacklisted'))
                : ($row['ub_email']
                    ? new CommonPlugin_ImageTag('email.png', $this->i18n->get('email is blacklisted'))
                    : '');
            $w->addColumnHtml($key, $this->i18n->get('blacklisted_heading'), $value);
        }
    }

    public function total()
    {
        return $this->dao->totalBouncedUsers();
    }

    /*
     * Implementation of CommonPlugin_IExportable
     */
    public function exportRows()
    {
        return $this->dao->bouncedUsers($this->attributes);
    }

    public function exportFieldNames()
    {
        $fields = array();
        $fields[] = $this->i18n->get('User email');

        foreach ($this->model->selectedAttrs as $attr) {
            $fields[] = $this->attributes[$attr]['name'];
        }

        $fields[] = $this->i18n->get('bounce count');

        return $fields;
    }

    public function exportValues(array $row)
    {
        $values = array();
        $values[] = $row['email'];

        foreach ($this->model->selectedAttrs as $attr) {
            $values[] = $row["attr{$attr}"];
        }
        $values[] = $row['bouncecount'];

        return $values;
    }
}
