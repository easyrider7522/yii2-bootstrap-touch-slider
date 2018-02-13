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

## Usage

As any Yii2 widget, in desired view or layout file as follows:
````php
<?php
use easyrider7522\yii2btswidget\Carousel;
?>
<div class="site-index">
    <div>
<?= Carousel::widget([
    'options'               => [                            // Widget container attributes.
        'id'                    => 'bootstrap-touch-slider',    // Slider (carousel) id.
        'class'                 => [                            // Array keys are used for possibility to override all the classes present by default.
            'bootstrap'             => 'carousel',                  // Bootstrap carousel style. Should not be changed.
            'widget'                => 'bs-slider',                 // Widget style.
            'effect'                => 'fade',                      // Slide effect.
            'controls'              => 'control-round',             // Left/Right controls styling.
            'indicators'            => 'indicators-line',           // Slide indicator styling.
        ],                                                      // Only the values are rendered (`class="carousel bs-slider fade control-round indicators-line"`).
        'data'                  => [                            // Data attibutes for Bootstrap JS.
            'ride'                  => 'carousel',                  // Animation starts at page load.
            'pause'                 => 'hover',                     // Cycling stops on hovering mouse.
            'interval'              => 'false',                     // Cycling delay.
        ],                                                      // For full specification see https://getbootstrap.com/docs/3.3/javascript/#carousel .
    ],
    'indicatorOptions'      => [                            // array|false Options of the wrapper of the slide indicators.
        'class'                 => 'carousel-indicators',
    ],
    'controlOptions'        => [                            // array|true|false Settings for left/right controls.
        'class'                 => 'carousel-control',          // Wrapper class.
        'leftArrow'             => 'angle-left',                // Font Awesome symbol for the left arrow.
        'rightArrow'            => 'angle-right',               // Font Awesome symbol for the right arrow.
    ],
    'slideWrapperOptions'   => [                            // Slide wrapper <div> options
        'class'                 => 'carousel-inner',
        'role'                  => 'listbox',
    ],
    'startSlide'            => 0,                           // The slide the animation starts with (index in the `slides` array).
    'slideOverlayOptions'   => [                            // The overlay <div> options
        'class'                 => 'bs-slider-overlay',         // Class of the overlay
    ],
    'slides'                => [                            // Array containing slides data.
        '@web/images/slide1.jpeg'=> [                           // Image web path. Aliases can be used, e.g. `@web/images/slider/slide1.jpeg`.
            'alt'                   => 'A carousel slide image 1',  // `alt` attribute contents of the <img> tag.
            'textArea'              => [                            // array Settings for the overlaying text area.
                'align'                 => 'left',                      // string left|center|right Horizontal alignment of the text area.
                'header'                => 'Bootstrap Carousel',        // Header contents.
                'headerAnimation'       => 'zoomInRight',               // Header animation (see https://daneden.github.io/animate.css/ for variants).
                'text'                  => 'Bootstrap carousel now touch enabled slide.',   // Text paragraph contents.
                'textAnimation'         => 'fadeInLeft',                // Text paragraph animation.
                'buttons'               => [                            // array|false Some buttons below the text paragraph can be placed.
                    'select one'            => [                            // array Button caption (inner contents of the <a> tag).
                        'href'                  => '#',                         // Where the link points (`href` attribute of the <a> tag).
                        'type'                  => 'default',                   // In this case its class will become `btn btn-default` (see Bootstrap variants or define one).
                        'animation'             => 'fadeInLeft',                // Buttons can be also animated at appearance.
                        'target'                => '_blank',                    // Other acceptable <a> tag attributes can be added as done here.
                    ],
                    'select two'            => [
                        'href'                  => '#',
                        'type'                  => 'primary',
                        'animation'             => 'fadeInRight',
                        'target'                => '_blank',
                    ],
                ],
            ],
        ],
        '@web/images/slide2.jpeg'=> [
            'alt'                   => 'A carousel slide image 2',
            'textArea'              => [
                'align'                 => 'center',
                'header'                => 'Bootstrap touch slider',
                'headerAnimation'       => 'flipInX',
                'text'                  => 'Make Bootstrap Better together.',
                'textAnimation'         => 'lightSpeedIn',
                'buttons'               => [
                    'select three'          => [
                        'url'                   => '#',
                        'type'                  => 'default',
                        'animation'             => 'fadeInUp',
                        'target'                => '_blank',
                    ],
                    'select four'           => [
                        'url'                   => '#',
                        'type'                  => 'primary',
                        'animation'             => 'fadeInDown',
                        'target'                => '_blank',
                    ],
                ],
            ],
        ],
        '@web/images/slide3.jpeg'=> [
            'alt'                   => 'A carousel slide image 3',
            'textArea'              => [
                'align'                 => 'right',
                'header'                => 'Beautiful Animations',
                'headerAnimation'       => 'zoomInLeft',
                'text'                  => 'Lots of css3 Animations to make slide beautiful.',
                'textAnimation'         => 'fadeInRight',
                'buttons'               => [
                    'select five'           => [
                        'url'                   => '#',
                        'type'                  => 'default',
                        'animation'             => 'fadeInLeft',
                        'target'                => '_blank',
                    ],
                    'select six'            => [
                        'url'                   => '#',
                        'type'                  => 'primary',
                        'animation'             => 'fadeInRight',
                        'target'                => '_blank',
                    ],
                ],
            ],
        ],
    ],
]);?>
    </div>
</div>
````

## Removal
````bash
composer remove easyrider7522/yii2-bootstrap-touch-slider
````

or manually delete it from the `required` section of your project's `composer.json` and run `composer update`

## Dependencies

[Animate.css](https://daneden.github.io/animate.css/)

[TouchSwipe](https://github.com/mattbryson/TouchSwipe-Jquery-Plugin)

## Screenshots
[Sample carousel screenshot: slide 1]: https://raw.githubusercontent.com/easyrider7522/yii2-bootstrap-touch-slider/master/yii2-bootstrap-carousel1-600px.jpg
[Sample carousel screenshot: slide 2]: https://raw.githubusercontent.com/easyrider7522/yii2-bootstrap-touch-slider/master/yii2-bootstrap-carousel2-600px.jpg
[Sample carousel screenshot: slide 3]: https://raw.githubusercontent.com/easyrider7522/yii2-bootstrap-touch-slider/master/yii2-bootstrap-carousel3-600px.jpg
