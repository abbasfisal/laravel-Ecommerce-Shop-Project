<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse|JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->wantsJson()) {
            if (!Auth::check()) {
                return response()->json(['message' => 'You Must LogedIn Or Register'], 403);
            }
        }

        if (!Auth::check()) {
            return redirect(route('login'));
        }
        return $next($request);
    }
}
