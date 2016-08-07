<?php
namespace App\Http\Middleware;
use Closure;
class CheckRole
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
        $actions = $request->route()->getAction();
        $roles = isset($actions['roles']) ? $actions['roles'] : null;
        if ($request->user()->userAUnRole($roles) || !$roles) {
            return $next($request);
        }
        return  redirect()->route('acces_non_autorise');
    }
}