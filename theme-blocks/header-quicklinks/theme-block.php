<?php namespace WSUWP\Theme\WDS; 


class Theme_Block_Header_Quicklinks extends Theme_Block {

	protected static $block_slug   = 'header_global';
	protected static $panel_type   = 'theme';
	protected static $option_slug  = 'theme_block_header_global';
	protected static $default_args = array(
		'show'         => false,
		'className'    => '',
		'local_search' => true,
	);


	public static function init() {

		add_action( 'customize_register', array( __CLASS__, 'customize' ), 11 );

	}

	// Call render_block( $args ) in parent class
	protected static function render( $args, $context ) {

		self::parse_options( $args, $context );

		if ( $args['show'] ) {

			include __DIR__ . '/template.php';
		}

	}


	public static function customize( $wp_customize ) {

		require_once __DIR__ . '/customizer.php';

		$block_customizer = new Block_Customizer_Header_Quicklinks();

		$block_customizer->add_customizer( $wp_customize, self::$panel_type, array(), self::$option_slug );

	}

	protected static function parse_options( &$args, $context ) {

		$args['local_search'] = WSU_Option::get( 'wds', 'local_search', $args['local_search'] );

	}


}

Theme_Block_Header_Quicklinks::init();
