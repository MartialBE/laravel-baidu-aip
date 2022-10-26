<?php


namespace Martialbe\LaravelBaiduAip\Facade;


use Illuminate\Support\Facades\Facade;

class AipNlp extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'AipNlp';
    }
}
