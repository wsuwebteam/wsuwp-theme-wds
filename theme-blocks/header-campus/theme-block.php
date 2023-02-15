<?php namespace WSUWP\Theme\WDS; 


class Theme_Block_Header_Campus extends Theme_Block {

	protected static $panel_type   = 'theme';
	protected static $option_slug  = 'theme_block_header_campus';
	protected static $default_args = array(
		'show'      => false,
		'menuDepth' => 3,
		'give_link' => 'https://foundation.wsu.edu/give/?utm_source=wsu-edu&utm_medium=wsu-link&utm_campaign=wsu-referral',
	);


	public static function init() {

		add_action( 'customize_register', array( __CLASS__, 'customize' ), 11 );

	}

	// Call render_block( $args ) in parent class
	protected static function render( $args ) {

		if ( $args['show'] ) {

			include __DIR__ . '/template.php';

		}

	}


	public static function customize( $wp_customize ) {

		require_once __DIR__ . '/customizer.php';

		$block_customizer = new Block_Customizer_Header_Campus();

		$block_customizer->add_customizer( $wp_customize, self::$panel_type, array(), self::$option_slug );

	}

}

Theme_Block_Header_Campus::init();
