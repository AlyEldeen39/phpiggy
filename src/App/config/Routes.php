<?php

declare(strict_types=1);

namespace App\Config;

use App\Controllers\{HomeController, AboutController, AuthController};
use Framework\App;

function registerRoutes(App $app)
{
    $app->get('/', [HomeController::class, 'home']);
    $app->get('/about', [AboutController::class, 'about']);
    $app->get('/register', [AuthController::class, 'registerView']);
    $app->post('/register', [AuthController::class, 'register']);
}

// class RouteRegister
// {
//     private $routes = [
//         ['path' => '/', 'controller' => [HomeController::class, 'home']],
//         ['path' => '/about', 'controller' => [AboutController::class, 'about']]
//     ];

//     public function registerRoutes($app)
//     {
//         foreach ($this->routes as $route) {
//             $app->get($route['path'], $route['controller']);
//         }
//     }
// }
