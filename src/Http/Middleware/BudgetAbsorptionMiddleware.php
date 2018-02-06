<?php namespace Bantenprov\BudgetAbsorption\Http\Middleware;

use Closure;

/**
 * The BudgetAbsorptionMiddleware class.
 *
 * @package Bantenprov\BudgetAbsorption
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class BudgetAbsorptionMiddleware
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
        return $next($request);
    }
}
