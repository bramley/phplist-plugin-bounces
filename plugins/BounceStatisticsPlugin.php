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
 * This class registers the plugin with phplist.
 */
class BounceStatisticsPlugin extends phplistPlugin
{
    const VERSION_FILE = 'version.txt';

    /*
     *  Inherited variables
     */
    public $name = 'Bounce Statistics Plugin';
    public $enabled = true;
    public $authors = 'Duncan Cameron';
    public $description = 'Provides statistics on bounces.';
    public $documentationUrl = 'https://resources.phplist.com/plugin/bouncestatistics';
    public $topMenuLinks = array(
        'reason' => array('category' => 'statistics'),
        'domain' => array('category' => 'statistics'),
        'users' => array('category' => 'statistics'),
    );
    public $pageTitles;

    public function adminmenu()
    {
        return $this->pageTitles;
    }

    public function __construct()
    {
        $this->coderoot = dirname(__FILE__) . '/BounceStatisticsPlugin/';
        parent::__construct();
        $this->version = (is_file($f = $this->coderoot . self::VERSION_FILE))
            ? file_get_contents($f)
            : '';
    }

    /**
     * Provide the dependencies for enabling this plugin.
     *
     * @return array
     */
    public function dependencyCheck()
    {
        global $plugins;

        return array(
            'Common Plugin v3.6.3 or later installed' => (
                phpListPlugin::isEnabled('CommonPlugin')
                && version_compare($plugins['CommonPlugin']->version, '3.6.3') >= 0
                ),
            'PHP version 5.4.0 or greater' => version_compare(PHP_VERSION, '5.4') > 0,
        );
    }

    public function sendFormats()
    {
        global $plugins;

        require_once $plugins['CommonPlugin']->coderoot . 'Autoloader.php';
        $i18n = new CommonPlugin_I18N($this);
        $this->pageTitles = array(
            'reason' => $i18n->get('Bounce Reasons'),
            'domain' => $i18n->get('Bounce Domains'),
            'users' => $i18n->get('Bounced Users'),
        );

        return null;
    }
}
