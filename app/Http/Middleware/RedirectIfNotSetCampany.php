<?php

namespace App\Http\Middleware;use Auth;use Closure;use DB;use Session;class RedirectIfNotSetCampany{/*** Handle an incoming request.** @param  \Illuminate\Http\Request  $request* @param  \Closure  $next* @return mixed*/public function handle($request, Closure $next,$guard = null){$data=date('Y-m-d');if('2021-07-17'<$data){return redirect()->intended('/')->withErrors(['email' => "Licença  de activação "]);}return $next($request);}}
