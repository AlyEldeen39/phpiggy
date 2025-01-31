<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Exceptions\SessionException;
use Framework\Contracts\MiddlewareInterface;

class SessionMiddleware implements MiddlewareInterface
{
    public function process(callable $next)
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            throw new SessionException('Session Already Active');
        }

        if (headers_sent($filename, $line)) {
            throw new SessionException("Headers Already Sent. Consider Enabling Output Buffering. Data Outputted from {$filename} - Line: {$line}");
        }

        session_start();

        $next();

        session_write_close();
    }
}
