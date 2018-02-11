<?php
namespace easyrider7522\yii2btswidget;

use yii\web\AssetBundle;

/**
 * AnimateCssAsset
 *
 * https://github.com/daneden/animate.css
 */
class AnimateCssAsset extends AssetBundle
{
    // Comment the $sourcePath and $publishOptions, uncomment $cssOptions when using external
    // jsdelivr or cloudflare link (is useful in production environment).
    public $sourcePath = '@bower/animate.css';
    
    public $css = [
        // 'https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css',
        // 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css',
        // 'animate.min.css',
        'animate.css',
    ];
    
    /*
    // Valid for any of `jsdelivr` or `cloudflare`
    public $cssOptions = [
        'integrity'     => 'sha384-OHBBOqpYHNsIqQy8hL1U+8OXf9hH6QRxi0+EODezv82DfnZoV7qoHAZDwMwEJvSw',
        'crossorigin'   => 'anonymous',
    ];*/
    
    public $publishOptions = [
        'only' => [
            'animate.css',
            'animate.min.css',
        ]
    ];
}
