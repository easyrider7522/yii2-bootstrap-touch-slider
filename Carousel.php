<?php
namespace easyrider7522\yii2btswidget;

use yii\bootstrap\Widget;
use yii\helpers\Html;


class Carousel extends Widget
{
    /**
     * @var array the HTML attributes for the widget container div. The following special options are recognized:
     *
     * - id: string, defaults to "bootstrap-touch-slider", the id of the carousel.
     *
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];
	
	// array|false Options of the wrapper of the slide indicators.
	public $indicatorOptions = [
		'class'	=> 'carousel-indicators',
	];
	
	// array|false Settings for left/right controls.
	public $controlOptions = [
		'class'			=> 'carousel-control',
		'leftArrow'		=> 'angle-left',
		'rightArrow'	=> 'angle-right',
	];
	
	// Slide wrapper <div> options
	public $slideWrapperOptions = [
		'class'	=> 'carousel-inner',
		'role'	=> 'listbox',
	];
	
	public $startSlide = 0;
	
	public $slideOverlayOptions = [
		'class' => 'bs-slider-overlay',
	];
	
	public $slides = [];
	
	
	/**
	 * Initializes the widget.
	 *
	 * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
	 */
	public function init()
	{
		parent::init();
		
		Html::addCssClass( $this->options, [							// Add default classes with respect to ones updated by the user
			'bootstrap'		=> 'carousel',								// Bootstrap carousel style. Should not be changed.
			'widget'		=> 'bs-slider',								// Widget style.
			'effect'		=> 'fade',									// Slide effect.
			'controls'		=> 'control-round',							// Left/Right controls styling.
			'indicators'	=> 'indicators-line',						// Slide indicator styling.
		]);
		
		$options = [													// Default options
			'id'	=> $this->getId(),
			'data'	=> [
				'ride'		=> 'carousel',
				'pause'		=> 'hover',
				'interval'	=> 'false',
			],
		];
		
		$options = array_merge( $options, $this->options );				// Merge defaults with user-defined
		
		echo Html::beginTag( 'div', $options );							// Opens the main tag of the carousel
		
		echo $this->renderIndicators();
		
		echo $this->renderSlides();
		
		echo $this->renderControls();
		
		echo Html::endTag( 'div' );										// Close the main tag of the carousel
	}
	
	
	/**
	 * Renders the widget.
	 */
	public function run()
	{
		$this->registerClientScript();
	}
	
	
	/**
	 * Returns rendered indicators as HTML string
	 */
	public function renderIndicators()
	{
		$html = Html::beginTag( 'ol', $this->indicatorOptions );		// Open wrapper tag of the indicator
		
		$options = [													// Item options
			'data'		=> [
				'target'	=> '#' . $this->options[ 'id' ],
				'slide-to'	=> 0,
			]
		];
		
		$slideKeys = array_keys( $this->slides );						// Get a list of slides
		
		foreach( $slideKeys as $index => $key )							// Render as many items as slides present
		{
			$options[ 'data' ][ 'slide-to' ] = $index;
			
			if( $index == $this->startSlide )
				Html::addCssClass( $options, 'active' );
			
			$html .= Html::tag( 'li', '', $options );
			
			Html::removeCssClass( $options, 'active' );					// Removes class if found and the whole attribute if empty
		}
		
		$html .= Html::endTag( 'ol' );									// Close wrapper tag
		
		return $html;
	}
	
	
	/**
	 * Returns rendered slides as HTML string
	 */
	public function renderSlides()
	{
		$slideKeys = array_keys( $this->slides );
		
		$html = Html::beginTag( 'div', $this->slideWrapperOptions );	// Opens wrapper tag of the slides
		
		foreach( $slideKeys as $id => $key )							// Render slides
		{
			$html .= $this->renderSlide( $id, $key );
		}
		
		$html .= Html::endTag( 'div' );									// Close wrapper tag of the slides
		
		return $html;
	}
	
	
	/**
	 * Returns rendered slide as HTML string
	 */
	public function renderSlide( $index, $image )
	{
		// Create main div
		$html = Html::beginTag( 'div', [
			'class'	=> 'item' . ( $index == $this->startSlide ? ' active' : '' ),
		]);
		
		// Create <img> tag
		$html .= Html::img( $image, [
			'alt'	=> isset( $this->slides[ $image ][ 'alt' ]) ? $this->slides[ $image ][ 'alt' ] : "Carousel slide image #{$index}",
			'class'	=> 'slide-image',
		]);
		
		// Crate the overlay <div>
		$html .= Html::tag( 'div', '', $this->slideOverlayOptions );
		
		// Create textArea
		if( isset( $this->slides[ $image ][ 'textArea' ]))
		{
			$settings = $this->slides[ $image ][ 'textArea' ];			// Get slide options
			
			$html .= Html::beginTag( 'div', [							// Open <div> of the `textArea` with custom alignment if present
				'class'	=> 'slide-text' . ( isset( $settings[ 'align' ]) ? ' slide_style_' . $settings[ 'align' ] : '' ),
			]);
			
			// Create animated text header if present
			if( isset( $settings[ 'header' ]))
			{
				if( isset( $settings[ 'headerAnimation' ]))
					$options = [
						'data-animation' => "animated {$settings['headerAnimation']}",
					];
				else
					$options = [];
				
				$html .= Html::tag( 'h1', $settings[ 'header' ], $options );
			}
			
			// Create animated text paragraph if present
			if( isset( $settings[ 'text' ]))
			{
				if( isset( $settings[ 'textAnimation' ]))
					$options = [
						'data-animation' => "animated {$settings['textAnimation']}",
					];
				else
					$options = [];
				
				$html .= Html::tag( 'p', $settings[ 'text' ], $options );
			}
			
			// Create buttons
			foreach( $settings[ 'buttons' ] as $caption => $options )
			{
				Html::addCssClass( $options, [ 'btn', 'btn-' . ( isset( $options[ 'type' ]) ? $options[ 'type' ] : 'default' )]);
				
				unset( $options[ 'type' ]);
				
				if( isset( $options[ 'animation' ]))
					$options[ 'data-animation' ] ="animated {$options['animation']}";
				
				unset( $options[ 'animation' ]);
				
				$html .= Html::tag( 'a', $caption, $options );
			}
			
			$html .= Html::endTag( 'div' );								// End of textArea <div>
		}
		
		$html .= Html::endTag( 'div' );									// End of slide <div>
		
		return $html;
	}
	
	
	/**
	 * Returns rendered controls as HTML string
	 */
	public function renderControls()
	{
		$href = "#{$this->options['id']}";
		
		$class = isset( $this->controlOptions[ 'class' ]) ? ' ' . $this->controlOptions[ 'class' ] : '';
		
		// Left control
		$symbol = isset( $this->controlOptions[ 'leftArrow' ]) ? $this->controlOptions[ 'leftArrow' ] : 'angle-left';
		
		$html = $this->renderButton( $href, "left{$class}", $symbol, 'prev', 'Previous' );
		
		// Right control
		$symbol = isset( $this->controlOptions[ 'rightArrow' ]) ? $this->controlOptions[ 'rightArrow' ] : 'angle-right';
		
		$html .= $this->renderButton( $href, "right{$class}", $symbol, 'next', 'Next' );
		
		return $html;
	}
	
	
	/**
	 * Returns rendered controls as HTML string
	 */
	public function renderButton( $href, $class, $symbol, $target, $text )
	{
		$options = [
			'class'			=> $class,
			'href'			=> $href,
			'role'			=> 'button',
			'data-slide'	=> $target,
		];
		
		// Button caption
		$caption = Html::tag( 'span', '', [
			'class'			=> 'fa fa-' . $symbol,
			'aria-hidden'	=> 'true',
		]);
		
		// Caption text substitute
		$caption .= Html::tag( 'span', $text, [
			'class' => 'sr-only',
		]);
		
		return Html::tag( 'a', $caption, $options );
	}
	
	
	/**
	 * Registers the required css/js
	 */
	public function registerClientScript()
	{
		$view = $this->getView();
		
		BootstrapTouchSliderAsset::register( $view );
		
		$view->registerJs( '$("#' . $this->options[ 'id' ] . '").bsTouchSlider();' );
	}
}