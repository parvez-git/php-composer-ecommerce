<?php 

use Phroute\Phroute\Exception\HttpMethodNotAllowedException;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Illuminate\Database\Capsule\Manager as Capsule;
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\RouteParser;
use Phroute\Phroute\Dispatcher;

use App\Controllers\Frontend\HomeController;
use App\Controllers\Backend\DashboardController;


require_once 'vendor/autoload.php';


// ILLUMINATE DATABASE
$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'ecommerce_llc',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();


// SESSION START
session_start();


// PHROUTE
$router = new RouteCollector(new RouteParser);

$router->controller('/', HomeController::class);
$router->controller('/dashboard', DashboardController::class);


$dispatcher = new Dispatcher($router->getData());

try {
	
	$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

} catch (HttpRouteNotFoundException $e) {
	echo $e->getMessage();
	die();
} catch (HttpMethodNotAllowedException $e) {
	echo $e->getMessage();
	die();
}
    
echo $response;