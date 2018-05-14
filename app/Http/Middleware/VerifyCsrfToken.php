<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware {

	/* Token verify except  */
	protected $except = [
	    'paypal_success','response_sucess','response_failed','fund_payu_failed','fund_payu_success'


	];

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		//return parent::handle($request, $next);
		$regex = '#' . implode('|', $this->except) . '#';
	    if ( preg_match($regex, $request->path()))
	    {
	        return $this->addCookieToResponse($request, $next($request));
	    }

		if ( ! $request->is('api/*'))
	    {
	        return parent::handle($request, $next);
	    }

	   

	    return $next($request);
	}

}
