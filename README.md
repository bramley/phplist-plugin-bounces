# Bounce Statistics Plugin #

## Description ##

The plugin provides three pages, which are added to the Statistics menu:

* domain - groups bounces by domain with the number for each
* reason - lists a standard reason for each bounce.
* users - lists all subscribers whose bounce count is > 0

## Installation ##

### Dependencies ###

Requires php version 5.3 or later.

Requires the Common Plugin version 3 to be installed. You should install or upgrade to the latest version.

See <https://github.com/bramley/phplist-plugin-common>

### Set the plugin directory ###
You can use a directory outside of the web root by changing the definition of `PLUGIN_ROOTDIR` in config.php.
The benefit of this is that plugins will not be affected when you upgrade phplist.

### Install through phplist ###
Install on the Plugins page (menu Config > Plugins) using the package URL `https://github.com/bramley/phplist-plugin-bounces/archive/master.zip`.

In phplist releases 3.0.5 and earlier there is a bug that can cause a plugin to be incompletely installed on some configurations (<https://mantis.phplist.com/view.php?id=16865>). 
Check that these files are in the plugin directory. If not then you will need to install manually. The bug has been fixed in release 3.0.6.

* the file BounceStatisticsPlugin.php
* the directory BounceStatisticsPlugin

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
    2.0.1+20151231  Further bounce reasons
    2.0.0+20150815  Added dependencies
    2015-05-30      Improved German translation
    2015-03-23      Change to autoload approach
    2014-07-13      Added bounce date
    2013-08-24      Added to GitHub
    2013-05-10      Initial version for phplist 2.11.9 converted from 2.10 version
