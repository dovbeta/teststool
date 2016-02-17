<?php

namespace App\Http\Middleware;

use Closure;
use Route;

/**
 * Class RedirectIfHasOpenedTask
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
                if (
                    $task->status === 'IN-PROGRESS' &&
                    Route::currentRouteName() != 'frontend.tasks.resume' &&
                    Route::currentRouteName() != 'frontend.tasks.update'
                ) {
                   return redirect()->route('frontend.tasks.resume', [$task->id]);
                }
            }
        }

        return $next($request);
    }
}
