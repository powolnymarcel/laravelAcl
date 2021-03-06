<?php
namespace App\Http\Middleware;
use Closure;
class Admin
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
        if ($request->user() === null) {
            return  redirect()->route('acces_non_autorise');
        }
        if ($request->user()->aUnRole('Admin')) {
            return $next($request);
        }
        return  redirect()->route('acces_non_autorise');
    }
}