<?php

namespace App\Http\Middleware;

use Closure;
use App\Category;
Use Session;

class VerifyCategoriesCount
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
        if(Category::all()->count() == 0)
        {
            Session::flash('info', 'You must have a category to post');

            return redirect(route('category.create'));
        }
        return $next($request);
    }
}
