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
use Psr\Container\ContainerInterface;

/*
 * This file provides the dependencies for use by the dependency injection container.
 */

return [
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
    'BounceStatisticsPlugin_Controller_Subscribers' => function (ContainerInterface $container) {
        return new BounceStatisticsPlugin_Controller_Subscribers(
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
            new CommonPlugin_DB()
        );
    },
    'attributesById' => function (ContainerInterface $container) {
        $dao = $container->get('phpList\plugin\Common\DAO\Attribute');

        return $dao->attributesById(20, 15);
    },
];
