<?php
/**
 * User: Warlof Tutsimo <loic.leuilliot@gmail.com>
 * Date: 04/02/2017
 * Time: 23:51
 */

namespace App\Http\Middleware;


use Illuminate\Contracts\Auth\Guard;
use Closure;

class Authenticate
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if (session()->get('user_id') == null) {
            return redirect('/');
        }
        /*if ($this->auth->guest()) {
            return redirect()->guest('auth/eve');
        }*/

        return $next($request);
    }
}