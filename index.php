<?php 

use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\RouteParser;
use Phroute\Phroute\RouteCollector;

use App\Controllers\Frontend\CartController;
use App\Controllers\Frontend\HomeController;

use App\Controllers\Backend\ProductController;
use App\Controllers\Backend\CategoryController;
use App\Controllers\Backend\CheckoutController;
use App\Controllers\Backend\DashboardController;

use Illuminate\Database\Capsule\Manager as Capsule;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\Exception\HttpMethodNotAllowedException;


require_once 'config.php';

define('BASE_URL', __DIR__);

session_start();


// PHROUTE
$router = new RouteCollector(new RouteParser);

$router->controller('/', HomeController::class);
$router->controller('/cart', CartController::class);

$router->filter('auth', function() {    
    if(!isset($_SESSION['login'])) {
        header('Location: /login');
        return false;
    }
});

$router->group(['before' => 'auth'], function(RouteCollector $router){
    $router->controller('/checkout', CheckoutController::class);
});

$router->group(['prefix' => 'dashboard', 'before' => 'auth'], function(RouteCollector $router){
    $router->controller('/', DashboardController::class);
    $router->controller('/categories', CategoryController::class);
    $router->controller('/products', ProductController::class);
});


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