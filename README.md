# Bounce Statistics Plugin #

## Description ##

The plugin provides three pages, which are added to the Statistics menu:

* domain - groups bounces by domain with the number for each
* reason - lists a standard reason for each bounce.
* users - lists all subscribers whose bounce count is > 0

## Installation ##

### Dependencies ###

Requires php version 5.2 or later.

Requires the Common Plugin to be installed. 

See <https://github.com/bramley/phplist-plugin-common>

### Set the plugin directory ###
You can use a directory outside of the web root by changing the definition of `PLUGIN_ROOTDIR` in config.php.
The benefit of this is that plugins will not be affected when you upgrade phplist.

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
    2013-08-24  Added to GitHub
    2013-05-10  Initial version for phplist 2.11.9 converted from 2.10 version
