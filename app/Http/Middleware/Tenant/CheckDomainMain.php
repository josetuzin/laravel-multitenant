<?php

namespace App\Http\Middleware\Tenant;

use Closure;

class CheckDomainMain
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

        if (request()->getHost() != config('tenant.domain_main'))
        {
            abort(401, 'Acceso no permitido!'); 
        }

        return $next($request);
    }
}
