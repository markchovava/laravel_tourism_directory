<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'http://127.0.0.1:8003/login',
        'http://127.0.0.1:8003/login/',
        'http://127.0.0.1:8003/register',
        'http://127.0.0.1:8003/register/',
        'http://127.0.0.1:8003/role',
        'http://127.0.0.1:8003/review',
        'http://127.0.0.1:8003/review/*',
        'http://127.0.0.1:8003/review-by-place-id/*'

    ];
}
