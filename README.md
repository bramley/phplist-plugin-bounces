# Bounce Statistics Plugin #

## Description ##

The plugin provides three pages, which are added to the Statistics menu:

* domain - groups bounces by domain with the number for each
* reason - lists a standard reason for each bounce.
* users - lists all subscribers whose bounce count is > 0

## Installation ##

### Dependencies ###

Requires php version 7 or later.

Requires the Common Plugin version 3.11.0 or later to be installed.
phplist now includes Common Plugin so you should need only to enable it on the Manage Plugins page.

See <https://github.com/bramley/phplist-plugin-common>

### Install through phplist ###
Install on the Plugins page (menu Config > Plugins) using the package URL `https://github.com/bramley/phplist-plugin-bounces/archive/master.zip`.

### Install manually ###
Download the plugin zip file from <https://github.com/bramley/phplist-plugin-bounces/archive/master.zip>

Expand the zip file, then copy the contents of the plugins directory to your phplist plugins directory.
This should contain

* the file BounceStatisticsPlugin.php
* the directory BounceStatisticsPlugin

## Donation ##

This plugin is free but if you install and find it useful then a donation to support further development is greatly appreciated.

[![Donate](https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=W5GLX53WDM7T4)

## Version history ##

    version     Description
    2.2.1+20210418  Revise bounce reasons
    2.2.0+20200306  Rework handling of attribute DAO
    2.1.6+20200216  Revise bounce reasons
    2.1.5+20200118  Additional bounce reasons
    2.1.4+20190528  Improve display of bounced subscribers page
    2.1.3+20181211  Link to user page instead of user history
    2.1.2+20180408  Revise bounce reasons
    2.1.1+20171112  Further bounce reasons
    2.1.0+20170603  Internal code changes
    2.0.4+20170304  Use core phplist help dialog
    2.0.3+20160527  Add class map for autoloading
    2.0.2+20160321  Added bounce reasons
    2.0.1+20151231  Further bounce reasons
    2.0.0+20150815  Added dependencies
    2015-05-30      Improved German translation
    2015-03-23      Change to autoload approach
    2014-07-13      Added bounce date
    2013-08-24      Added to GitHub
    2013-05-10      Initial version for phplist 2.11.9 converted from 2.10 version
