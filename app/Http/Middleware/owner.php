<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class owner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$model)
    {
        $Model = 'App\\Models\\'.$model;
        $id = $request->segments()[1];
        $registre = $Model::findOrFail($id);

        if ($registre->user_id !== Auth::user()->id) {
            abort(403, 'Must Be Owner.');
        }

        return $next($request);
    }
}
