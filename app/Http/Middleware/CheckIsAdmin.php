<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIsAdmin
{
    
    public function handle(Request $request, Closure $next): Response
    {
        if(session()->get('isAdmin.quyen')){
            return $next($request);
        }
        return back()->with('thongbaonhanvien', "Bạn không có quyền Admin để thực hiện tác vụ này!");
    }
}
