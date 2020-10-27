<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Enums\UserType;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class Dashboard
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $routes = [
            UserType::USER => 'user',
            UserType::MANAGER => 'manager',
            UserType::ADMINISTRATOR => 'admin',
        ];

        if ($request->route()->getName() === 'home' && $request->user()) {
            return Redirect::route($routes[$request->user()->role]);
        }
        return $next($request);
    }
}
