<?php


namespace Martialbe\LaravelBaiduAip\Facade;


use Illuminate\Support\Facades\Facade;

class AipImageSearch extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'AipImageSearch';
    }
}
