<?php


namespace Martialbe\LaravelBaiduAip\Facade;


use Illuminate\Support\Facades\Facade;

class AipSpeech extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'AipSpeech';
    }
}
