<?php

namespace App\Http\Middleware;

use Closure, Session;

class SessMiddleware
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
        $url = ltrim(strrchr($request->route()->getName(), '.'), '.');
        if( in_array($url, array(CREATE_METHOD, EDIT_METHOD)) ){
            Session::forget('FORM_DATA_ADD');
        }
        if( in_array( $url, array(STORE_METHOD, UPDATE_METHOD)) && $request->input('except') != 'except'){
            
            if($sess = Session::get('FORM_DATA_ADD')){
                foreach($sess as $key=>$item){
                    $request->offsetSet($key, $item);
                }
            }
        
        }
       

        return $next($request);
    }
}
