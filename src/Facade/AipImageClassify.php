<?php


namespace Martialbe\LaravelBaiduAip\Facade;


use Illuminate\Support\Facades\Facade;

class AipImageClassify extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'AipImageClassify';
    }
}
