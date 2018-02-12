# yii2-bootstrap-touch-slider
Implementation of bootstrap-touch-slider from bootstrapthemes.co as Yii2 widget

Thanks to [bootstrapthemes.co](https://bootstrapthemes.co/demo/resource/BootstrapCarouselTouchSlider/)

## Installation
### Composer
````bash
composer require easyrider7522/yii2-bootstrap-touch-slider "@alpha"
````

or manually add to the `required` section of your project's `composer.json`
````json
"easyrider7522/yii2-bootstrap-touch-slider": "@alpha"
````
and run `composer update` shell command

Since it's a pre-release (currently in alpha state) stability flag `@alpha` must be used with the package (as you can see above) in order to be able to install it without changing `minimum-stability` property of the `composer.json`, which is global for your whole project.

## Removal
````bash
composer remove easyrider7522/yii2-bootstrap-touch-slider
````

or manually delete it from the `required` section of your project's `composer.json`

## Dependencies

[Animate.css](https://daneden.github.io/animate.css/)

[TouchSwipe](https://github.com/mattbryson/TouchSwipe-Jquery-Plugin)
