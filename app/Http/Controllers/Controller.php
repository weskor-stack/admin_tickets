<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function set_language($language){
        if(array_key_exists($language, config('languages'))){
            session()->put('applocale', $language);
        }
        return back();
    }

    public function handle($request, Closure $next)
     {
         if (session()->has('locale')) {
             App::setLocale(session()->get('locale'));
         }
         return $next($request);
     }
}
