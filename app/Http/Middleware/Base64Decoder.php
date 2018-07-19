<?php

namespace App\Http\Middleware;

use Closure;

class Base64Decoder
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
        $contentType = $request->headers->get('content-type');
        if(strstr($contentType, 'application/json'))
        {
            $requestGets = $request->query->all();
            $requestPosts = $request->request->all();
            $countKeys = array_keys($requestPosts);
            if(
                count($countKeys) === 1 &&
                isset($requestPosts['data']) &&
                is_string($requestPosts['data']))
            {
                $json = base64_decode($requestPosts['data']);
                $data = json_decode($json, true);
                $request->initialize($requestGets, $data);
            }
        }

        return $next($request);
    }
}
