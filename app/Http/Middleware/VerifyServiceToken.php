<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class VerifyServiceToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        ##check x-token exist
        if (!$request->header('X-Token')) {
            return response()->json([
                "errorCode"    => 9,
                "errorMessage" => 'Yetkisiz İşlem'
            ]);
        }

        ##check db x-token
        if (!User::CheckToken($request->header('X-Token'))->count()) {
            return response()->json([
                "errorCode"    => 10,
                "errorMessage" => 'Geçersiz yada süresi dolmuş token'
            ]);
        }

        return $next($request);
    }
}
