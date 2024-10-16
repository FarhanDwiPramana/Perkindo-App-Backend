<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user()->tokenCan('admin:access')) {
            return response()->json(['message' => 'Unauthorized - Admin Only'], 403);
        }

        return $next($request);
    }
}
