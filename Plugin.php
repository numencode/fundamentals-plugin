<?php namespace NumenCode\Fundamentals;

use System\Classes\PluginBase;
use NumenCode\Fundamentals\Bootstrap\BackendOverride;
use NumenCode\Fundamentals\Extensions\TwigExtensions;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name'        => 'numencode.fundamentals::lang.plugin.name',
            'description' => 'numencode.fundamentals::lang.plugin.description',
            'author'      => 'Blaz Orazem',
            'icon'        => 'oc-icon-cogs',
            'homepage'    => 'https://github.com/numencode/fundamentals-plugin',
        ];
    }

    public function boot()
    {
        (new BackendOverride())->init();
    }

    public function register()
    {
        require_once __DIR__ . '/helpers.php';
    }

    public function registerMarkupTags()
    {
        return [
            'filters'   => TwigExtensions::filters(),
            'functions' => TwigExtensions::functions(),
        ];
    }
}