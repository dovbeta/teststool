<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Route;

/**
 * Class RedirectIfAuthenticated
 * @package App\Http\Middleware
 */
class RedirectIfHasOpenedTask
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()) {
            foreach ($request->user()->tasks as $task) {
                if ($task->status === 'IN-PROGRESS' && Route::currentRouteName() != 'frontend.tasks.resume') {
                   return redirect()->route('frontend.tasks.resume', [$task->id]);
                }
            }
        }

        return $next($request);
    }
}
