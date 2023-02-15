<?php namespace WSUWP\Theme\WDS; 


class Theme_Block_Header_Global extends Theme_Block {

	protected static $block_slug   = 'header_global';
	protected static $panel_type   = 'theme';
	protected static $option_slug  = 'theme_block_header_global';
	protected static $default_args = array(
		'show'           => true,
		'className'      => '',
		'parent_name'    => '',
		'parent_mobile'  => '',
		'parent_url'     => '',
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

		$block_customizer = new Block_Customizer_Header_Global();

		$block_customizer->add_customizer( $wp_customize, self::$panel_type, array(), self::$option_slug );

	}

	protected static function parse_options( &$args, $context ) {

		$args['parent_name']        = ( ! empty( $args['parent_name'] ) ) ? $args['parent_name'] : WSU_Option::get( 'site_options', 'parent_name' );
		$args['parent_name_mobile'] = ( ! empty( $args['parent_name_mobile'] ) ) ? $args['parent_name_mobile'] : WSU_Option::get( 'site_options', 'parent_name_mobile' );
		$args['parent_url']         = ( ! empty( $args['parent_url'] ) ) ? $args['parent_url'] : WSU_Option::get( 'site_options', 'parent_url' );

	}


}

Theme_Block_Header_Global::init();
