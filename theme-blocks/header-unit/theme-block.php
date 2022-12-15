<?php namespace WSUWP\Theme\WDS; 


class Theme_Block_Header_Unit extends Theme_Block {

	protected static $panel_type   = 'theme';
	protected static $option_slug  = 'theme_block_header_unit';
	protected static $default_args = array();


	public static function init() {

		//add_action( 'customize_register', array( __CLASS__, 'customize' ), 11 );

	}

	// Call render_block( $args ) in parent class
	protected static function render( $args ) {

		include __DIR__ . '/template.php';

	}


	public static function customize( $wp_customize ) {


	}

}

Theme_Block_Header_Unit::init();