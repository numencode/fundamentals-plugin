<?php namespace NumenCode\Fundamentals\Extensions;

use Cache;
use Cms\Classes\Controller;
use NumenCode\Fundamentals\Classes\ImageResize;

class TwigExtensions
{
    public static function filters()
    {
        return [
            'resize'   => [new ImageResize, 'makeResizeUrl'],
            'url_path' => function ($value) {
                return parse_url($value, PHP_URL_PATH);
            },
        ];
    }

    public static function functions()
    {
        return [
            'app'            => function ($param = null) {
                return app($param);
            },
            'asset_hash'     => function () {
                return Cache::rememberForever('numencode.fundamentals.asset.hash', function () {
                    return date('YmdHis');
                });
            },
            'class_basename' => function ($class) {
                return class_basename($class);
            },
            'collect'        => function ($items = null) {
                return collect($items);
            },
            'config'         => function ($param = null) {
                return config($param);
            },
            'd'              => function () {
                d(...func_get_args());
            },
            'dd'             => function () {
                dd(...func_get_args());
            },
            'require'        => function ($path) {
                return file_get_contents(base_path($path));
            },
            'trans'          => function ($code) {
                return trans($code);
            },
            'trim'           => function ($string) {
                return trim($string);
            },
            'url_params'     => function () {
                return collect(Controller::getController()->getRouter()->getParameters());
            },
        ];
    }
}
