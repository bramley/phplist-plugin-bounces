<?php

$pluginsDir = dirname(__DIR__);

return [
    'BounceStatisticsPlugin_Controller' => $pluginsDir . '/BounceStatisticsPlugin/Controller.php',
    'BounceStatisticsPlugin_ControllerFactory' => $pluginsDir . '/BounceStatisticsPlugin/ControllerFactory.php',
    'BounceStatisticsPlugin_Controller_Domain' => $pluginsDir . '/BounceStatisticsPlugin/Controller/Domain.php',
    'BounceStatisticsPlugin_Controller_Reason' => $pluginsDir . '/BounceStatisticsPlugin/Controller/Reason.php',
    'BounceStatisticsPlugin_Controller_Subscribers' => $pluginsDir . '/BounceStatisticsPlugin/Controller/Subscribers.php',
    'BounceStatisticsPlugin_DAO_Bounce' => $pluginsDir . '/BounceStatisticsPlugin/DAO/Bounce.php',
    'BounceStatisticsPlugin_DAO_MissingFileException' => $pluginsDir . '/BounceStatisticsPlugin/DAO/Bounce.php',
    'BounceStatisticsPlugin_Model' => $pluginsDir . '/BounceStatisticsPlugin/Model.php',
    'BounceStatisticsPlugin_PageactionController' => $pluginsDir . '/BounceStatisticsPlugin/pageaction.php',
];
