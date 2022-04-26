<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class SessionVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->has('type')){
            return $next($request);
        }
        else{
            $request->session()->flash('message', 'Invalid Request!');

                return redirect()->route('login')
                ->with([
                    'error' => true,
                    'message' => 'Please login first'
                ]);
        }
    }
}
