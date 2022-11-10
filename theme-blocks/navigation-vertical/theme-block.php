<?php namespace WSUWP\Theme\WDS; 


class Theme_Block_Navigation_Vertical extends Theme_Block {

	protected static $block_slug   = 'navigation_vertical';
	protected static $panel_type   = 'theme';
	protected static $option_slug  = 'theme_block_navigation_vertical';
	protected static $default_args = array(
		'show'       => false,
		'inContext'  => false,
		'className'  => '',
		'menuStyle'  => 'vertical',
	);


	public static function init() {

		add_action( 'customize_register', array( __CLASS__, 'customize' ), 11 );

		add_filter( 'wsu_wds_menu_html', array( __CLASS__, 'check_menu_options' ), 10, 4 );

	}

	// Call render_block( $args ) in parent class
	protected static function render( $args, $context ) {

		if ( $args['show'] ) {

			$menu_html = self::get_menu( $args, $context );

			if ( ! empty( $menu_html ) ) {
				include __DIR__ . '/template.php';
			}
		}

	}


	public static function customize( $wp_customize ) {

		require_once __DIR__ . '/customizer.php';

		$block_customizer = new Block_Customizer_Navigation_Vertical();

		$block_customizer->add_customizer( $wp_customize, self::$panel_type, array(), self::$option_slug );

	}


	protected static function get_menu( $args, $context ) {

		$menu_classes = array( 'wsu-menu-collapse' );

		$menu_classes[] = 'wsu-menu-collapse--style-' . $args['menuStyle'];

		ob_start();

		wp_nav_menu(
			array(
				'theme_location' => 'site',
				'menu_class'     => implode( ' ', $menu_classes ),
				'container'      => '',
				'walker'         => new Walker_Nav_Menu_Collapse( $args ),
				'menu_id'        => 'wsu-site-menu',
			)
		);

		return apply_filters( 'wsu_wds_menu_html', ob_get_clean(), $args, $context, self::$block_slug );

	}


	public static function check_menu_options( $menu_html, $args, $context, $block ) {

		if ( $block === self::$block_slug ) {

			if ( ! str_contains( $menu_html, 'sub-menu' ) ) {

				$menu_html = '';

			}
		}

		return $menu_html;

	}


}

Theme_Block_Navigation_Vertical::init();
