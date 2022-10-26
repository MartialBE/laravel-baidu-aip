<?php


namespace Martialbe\LaravelBaiduAip\Facade;


use Illuminate\Support\Facades\Facade;

class AipContentCensor extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'AipContentCensor';
    }
}
