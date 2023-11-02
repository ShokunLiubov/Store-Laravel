<?php

namespace App\Http\Middleware;

use App\Models\Category;
use Closure;
use Illuminate\Http\Request;

class PublicMenu
{
    public function handle(Request $request, Closure $next)
    {
        view()->composer('layout.public', function ($view) {
            $view->with('menu', Category::query()->get());
        });

        return $next($request);
    }
}
