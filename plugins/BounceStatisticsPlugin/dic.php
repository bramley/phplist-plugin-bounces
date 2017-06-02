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
 * This file creates a dependency injection container.
 */
use Mouf\Picotainer\Picotainer;
use Psr\Container\ContainerInterface;

return new Picotainer([
    'BounceStatisticsPlugin_Controller_Domain' => function (ContainerInterface $container) {
        return new BounceStatisticsPlugin_Controller_Domain(
            $container->get('BounceStatisticsPlugin_Model'),
            $container->get('BounceStatisticsPlugin_DAO_Bounce'),
            $container->get('attributesById')
        );
    },
    'BounceStatisticsPlugin_Controller_Reason' => function (ContainerInterface $container) {
        return new BounceStatisticsPlugin_Controller_Reason(
            $container->get('BounceStatisticsPlugin_Model'),
            $container->get('BounceStatisticsPlugin_DAO_Bounce'),
            $container->get('attributesById')
        );
    },
    'BounceStatisticsPlugin_Controller_Users' => function (ContainerInterface $container) {
        return new BounceStatisticsPlugin_Controller_Users(
            $container->get('BounceStatisticsPlugin_Model'),
            $container->get('BounceStatisticsPlugin_DAO_Bounce'),
            $container->get('attributesById')
        );
    },
    'BounceStatisticsPlugin_Model' => function (ContainerInterface $container) {
        return new BounceStatisticsPlugin_Model(
            $container->get('attributesById')
        );
    },
    'BounceStatisticsPlugin_DAO_Bounce' => function (ContainerInterface $container) {
        return new BounceStatisticsPlugin_DAO_Bounce(
            $container->get('CommonPlugin_DB')
        );
    },
    'attributesById' => function (ContainerInterface $container) {
        $dao = new CommonPlugin_DAO_Attribute(
            $container->get('CommonPlugin_DB')
        );

        return $dao->attributesById();
    },
    'CommonPlugin_DB' => function (ContainerInterface $container) {
        return new CommonPlugin_DB();
    },
]);
