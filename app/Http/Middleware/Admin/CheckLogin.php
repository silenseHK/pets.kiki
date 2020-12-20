<?php


namespace App\Http\Middleware\Admin;

use Closure;

class CheckLogin
{

    public function handle($request, Closure $next){
        if(!session('admin_info')){
            return redirect('/admin/login');
        }
        return $next($request);
    }

}
