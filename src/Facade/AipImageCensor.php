<?php


namespace Martialbe\LaravelBaiduAip\Facade;


use Illuminate\Support\Facades\Facade;

class AipImageCensor extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'AipImageCensor';
    }
}
