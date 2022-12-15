<?php namespace WSUWP\Theme\WDS; 


class Theme_Block_Navigation_Audience extends Theme_Block {

	protected static $block_slug   = 'navigation_audience';
	protected static $panel_type   = 'theme';
	protected static $option_slug  = 'theme_block_navigation_audience';
	protected static $default_args = array(
		'className'  => '',
	);


	public static function init() {


	}

	// Call render_block( $args ) in parent class
	protected static function render( $args, $context ) {

		if ( has_nav_menu( 'audience' ) ) {

			include __DIR__ . '/template.php';

		}

	}

}

Theme_Block_Navigation_Audience::init();
