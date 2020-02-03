<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckCityCode
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $city = last(explode("/", $request->getUri()));
        $city = strtolower($city);
        $cities = json_decode(file_get_contents(base_path('database/repositories/place_codes.json')));
        if (!in_array($city, $cities)) {
            abort(404, "Wrong city name");
        }

        return $next($request);
    }
}
