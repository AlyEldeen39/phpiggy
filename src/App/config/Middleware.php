<?php

declare(strict_types=1);

namespace App\Config;

use App\Middleware\{
    AuthRequiredMiddleware,
    CSRFGuard,
    CSRFMiddleware,
    FlashMiddleware,
    GuestOnlyMiddleware,
    SessionMiddleware,
    TemplateDataMiddleware,
    ValidationExceptionMiddleware
};
use Framework\App;

function registerMiddleware(App $app)
{
    $app->addGlobalMiddleware(CSRFGuard::class);
    $app->addGlobalMiddleware(CSRFMiddleware::class);
    $app->addGlobalMiddleware(TemplateDataMiddleware::class);
    $app->addGlobalMiddleware(ValidationExceptionMiddleware::class);
    $app->addGlobalMiddleware(FlashMiddleware::class);
    $app->addGlobalMiddleware(SessionMiddleware::class);
}
