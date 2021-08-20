<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Category;
use Illuminate\Http\Request;

class VerifyCategory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Category::all()->count() == 0){
            Session()->flash('error','ต้องเพิ่มประเภทบทความก่อนสร้างบทความ');
            return redirect('categories/create');
        }
        return $next($request);
    }
}
