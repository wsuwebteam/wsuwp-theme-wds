<?php namespace WSUWP\Theme\WDS; 


class Theme_Block_Header_Unit extends Theme_Block {

	protected static $panel_type   = 'theme';
	protected static $option_slug  = 'theme_block_header_unit';
	protected static $default_args = array(
		'give_link' => 'https://foundation.wsu.edu/give/?utm_source=wsu-pullman&utm_medium=wsu-link&utm_campaign=wsu-pullman-referral',
	);


	public static function init() {

		//add_action( 'customize_register', array( __CLASS__, 'customize' ), 11 );

	}

	// Call render_block( $args ) in parent class
	protected static function render( $args ) {

		self::parse_options( $args, $context );

		include __DIR__ . '/template.php';

	}


	public static function customize( $wp_customize ) {


	}

	protected static function parse_options( &$args, $context ) {

		$give_link = WSU_Option::get( 'site_options', 'give_link', '' );

		if ( ! empty( $give_link ) ) {

			$args['give_link'] = $give_link;

		}

	}

}

Theme_Block_Header_Unit::init();