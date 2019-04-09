<?php 

use Phroute\Phroute\Dispatcher;
use Illuminate\Database\Capsule\Manager as Capsule;

require_once 'vendor/autoload.php';

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'php_ecommerce_llc',
    'username'  => 'parvez',
    'password'  => 'password',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();