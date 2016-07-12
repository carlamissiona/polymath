<?php

defined('APP_PATH') || define('APP_PATH', realpath('.'));

return new \Phalcon\Config(array(

    'database' => array(
        'adapter'    => 'Mysql',
        'host'       => 'localhost',
        'username'   => 'root',
        'password'   => 'pass',
        'dbname'     => 'dbschyd',
        'charset'    => 'utf8',
    ),

    'application' => array(
        'helpersDir'      => APP_PATH . '/helpers/',
        'modelsDir'      => APP_PATH . '/models/',
        'migrationsDir'  => APP_PATH . '/migrations/',
        'viewsDir'       => APP_PATH . '/views/',
        'baseUri'        => '/schooly/',
    )
));
