<?php 

use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\RouteParser;

use Illuminate\Database\Capsule\Manager as Capsule;

require_once '../vendor/autoload.php';

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

Capsule::schema()->create('users', function ($table) {
    $table->increments('id');
    $table->string('name');
    $table->string('email')->unique();
    $table->string('password');
    $table->boolean('active');
    $table->date('email_verified_at')->nullable();
    $table->string('email_verification_token')->nullable();
    $table->timestamps();
});