<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected static function getAppName()
    {
        $isProduction = (config('app.env') == 'production');
        $appName = config('app.name');
        if(!$isProduction)
            $appName = "[DEV] {$appName}";
        return $appName;
    }
}
