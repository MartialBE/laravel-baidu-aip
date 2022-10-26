<?php

namespace Martialbe\LaravelBaiduAip;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Martialbe\LaravelBaiduAip\SDK\AipBodyAnalysis;
use Martialbe\LaravelBaiduAip\SDK\AipContentCensor;
use Martialbe\LaravelBaiduAip\SDK\AipFace;
use Martialbe\LaravelBaiduAip\SDK\AipImageCensor;
use Martialbe\LaravelBaiduAip\SDK\AipImageClassify;
use Martialbe\LaravelBaiduAip\SDK\AipImageProcess;
use Martialbe\LaravelBaiduAip\SDK\AipImageSearch;
use Martialbe\LaravelBaiduAip\SDK\AipKg;
use Martialbe\LaravelBaiduAip\SDK\AipNlp;
use Martialbe\LaravelBaiduAip\SDK\AipOcr;
use Martialbe\LaravelBaiduAip\SDK\AipSpeech;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->setupConfig();

        $accounts = config('baidu');

        $apps = [
            'AipBodyAnalysis'  => AipBodyAnalysis::class,
            'AipContentCensor' => AipContentCensor::class,
            'AipFace'          => AipFace::class,
            'AipImageCensor'   => AipImageCensor::class,
            'AipImageClassify' => AipImageClassify::class,
            'AipImageProcess'  => AipImageProcess::class,
            'AipImageSearch'   => AipImageSearch::class,
            'AipKg'            => AipKg::class,
            'AipNlp'           => AipNlp::class,
            'AipOcr'           => AipOcr::class,
            'AipOcr'           => AipOcr::class,
            'AipSpeech'        => AipSpeech::class,
        ];
        foreach ($apps as $name => $class) {
            $this->app->singleton($name, function () use($class, $accounts){
                return new $class($accounts['app_id'], $accounts['app_key'], $accounts['app_secret']);
            });
        }
    }

    /**
     * Setup the config.
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__.'/config.php');
        if ($this->app->runningInConsole()) {
            $this->publishes([
                $source => config_path('baidu.php')
            ]);
        }
    }

}
