<?php
namespace easyrider7522\yii2btswidget;

use yii\web\AssetBundle;


/**
 * TouchSwipeAsset
 *
 * https://github.com/mattbryson/TouchSwipe-Jquery-Plugin
 */
class TouchSwipeAsset extends AssetBundle
{
    public $sourcePath = '@bower/jquery-touchswipe';
    
    public $js = [
        // 'https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.18/jquery.touchSwipe.min.js',
        // 'jquery.touchSwipe.min.js',
        'jquery.touchSwipe.js',
    ];
    
    public $publishOptions = [
        'only' => [
            'jquery.touchSwipe.js',
            'jquery.touchSwipe.min.js',
        ]
    ];
}
