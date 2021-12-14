<?php

namespace App\Http\Middleware;

use App\Helpers\Wrapper\Wrapper;
use Closure;

class BasicAuth
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->getUser() != env('BASIC_AUTH_USERNAME') || $request->getPassword() != env('BASIC_AUTH_PASSWORD')) {
            $headers = ['WWW-Authenticate' => 'Basic'];

            return Wrapper::sendResponse(Wrapper::error('Unauthorized', 401), $headers);
        }

        return $next($request);
    }
}
