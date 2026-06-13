<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class DownloadMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if (
            $user->access_level != 'view_download' &&
            $user->role != 'admin'
        ) {
            abort(403);
        }

        return $next($request);
    }
}
