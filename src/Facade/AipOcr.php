<?php


namespace Martialbe\LaravelBaiduAip\Facade;


use Illuminate\Support\Facades\Facade;

class AipOcr extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'AipOcr';
    }
}
