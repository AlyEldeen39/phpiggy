<?php

declare(strict_types=1);

namespace App\Config;

use App\Controllers\{HomeController, AboutController, AuthController, ErrorController, ReceiptController, TransactionController};
use App\Middleware\{AuthRequiredMiddleware, GuestOnlyMiddleware};
use Framework\App;

function registerRoutes(App $app)
{
    $app->get('/', [HomeController::class, 'home'])->addRouteMiddleware(AuthRequiredMiddleware::class);
    $app->get('/about', [AboutController::class, 'about']);
    $app->get('/register', [AuthController::class, 'registerView'])->addRouteMiddleware(GuestOnlyMiddleware::class);
    $app->post('/register', [AuthController::class, 'register'])->addRouteMiddleware(GuestOnlyMiddleware::class);
    $app->get('/login', [AuthController::class, 'loginView'])->addRouteMiddleware(GuestOnlyMiddleware::class);
    $app->post('/login', [AuthController::class, 'login'])->addRouteMiddleware(GuestOnlyMiddleware::class);
    $app->get('/logout', [AuthController::class, 'logout'])->addRouteMiddleware(AuthRequiredMiddleware::class);
    $app->get('/transaction', [TransactionController::class, 'createView'])->addRouteMiddleware(AuthRequiredMiddleware::class);
    $app->post('/transaction', [TransactionController::class, 'create'])->addRouteMiddleware(AuthRequiredMiddleware::class);
    $app->get('/transaction/{transaction}', [TransactionController::class, 'editView'])->addRouteMiddleware(AuthRequiredMiddleware::class);
    $app->post('/transaction/{transaction}', [TransactionController::class, 'edit'])->addRouteMiddleware(AuthRequiredMiddleware::class);
    $app->delete('/transaction/{transaction}', [TransactionController::class, 'delete'])->addRouteMiddleware(AuthRequiredMiddleware::class);
    $app->get('/transaction/{transaction}/receipt', [ReceiptController::class, 'uploadView'])->addRouteMiddleware(AuthRequiredMiddleware::class);
    $app->post('/transaction/{transaction}/receipt', [ReceiptController::class, 'upload'])->addRouteMiddleware(AuthRequiredMiddleware::class);
    $app->get('/transaction/{transaction}/receipt/{receipt}', [ReceiptController::class, 'download'])->addRouteMiddleware(AuthRequiredMiddleware::class);
    $app->delete('/transaction/{transaction}/receipt/{receipt}', [ReceiptController::class, 'delete'])->addRouteMiddleware(AuthRequiredMiddleware::class);

    $app->setErrorHandler([ErrorController::class, 'notFound']);
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
