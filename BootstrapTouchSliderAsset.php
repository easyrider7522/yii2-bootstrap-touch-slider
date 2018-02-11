<?php
namespace easyrider7522\yii2btswidget;

use yii\web\AssetBundle;

class BootstrapTouchSliderAsset extends AssetBundle
{
    public $sourcePath = '@vendor/easyrider7522/yii2-bootstrap-touch-slider/assets';
    
    public $css = [
        'bootstrap-touch-slider.css',
    ];
    
    public $js = [
        'bootstrap-touch-slider.js',
    ];
    
    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
        'easyrider7522\yii2btswidget\FontAwesomeAsset',
        'easyrider7522\yii2btswidget\AnimateCssAsset',
        'easyrider7522\yii2btswidget\TouchSwipeAsset',
    ];
}
