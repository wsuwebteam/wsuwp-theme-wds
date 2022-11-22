<?php namespace WSUWP\Theme\WDS; 


class Theme_Block_Navigation_Mobile extends Theme_Block {

	protected static $block_slug   = 'navigation_mobile';
	protected static $panel_type   = 'theme';
	protected static $option_slug  = 'theme_block_navigation_mobile';
	protected static $default_args = array(
		'show'       => false,
	);


	public static function init() {

		add_action( 'customize_register', array( __CLASS__, 'customize' ), 11 );

	}

	// Call render_block( $args ) in parent class
	protected static function render( $args, $context ) {

		if ( $args['show'] ) {

				include __DIR__ . '/template.php';

		}

	}


	public static function customize( $wp_customize ) {

		

		require_once __DIR__ . '/customizer.php';

		$block_customizer = new Block_Customizer_Navigation_Mobile();

		$block_customizer->add_customizer( $wp_customize, self::$panel_type, array(), self::$option_slug );

	}


}

Theme_Block_Navigation_Mobile::init();
