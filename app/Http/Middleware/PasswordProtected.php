<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PasswordProtected
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(Request): (Response) $next
     * @return Application|ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response|mixed|Response
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if ($request->has('password')) {
            if ($request->input('password') === 'eintracht2023') {
                session(['password' => $request->input('password')]);
                return $next($request);
            } else {
                return redirect('/password');
            }
        } elseif (session('password') !== 'eintracht2023') {
            return redirect('/password');
        }

        return $next($request);
    }
}
