<?php

namespace App\Http\Middleware\Utilities;
use App\DataTransferObject\BaseResponse;

use Closure;

class ApiAuthentication
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
        if(empty($request->header('Authorization'))){
            return BaseResponse::error("Unauthorized", 401);
        }

        if($request->header('Authorization') != env('UTILITIES_API_PASSWORD')){
            return BaseResponse::error("Incorrect API Password. Please check developer.", 401);
        }

        return $next($request);
    }
}
