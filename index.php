<?php
spl_autoload_extensions(".php");
spl_autoload_register();

use yasmf\datasource;
use yasmf\router;

$dataSource = new datasource(
    $host = 'localhost',
    $port = '3306',
    $db = 'site_vetement',
    $user = 'root',
    $pass = 'root',
    $charset = 'utf8mb4'
);
$router = new router();
$router->route($dataSource);
