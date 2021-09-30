<?php namespace WSUWP\Theme\WDS;


class Menus {

	public static function init() {

		Theme::load_class( 'walker-nav-menu-toggle' );
		Theme::load_class( 'walker-nav-menu-offsite' );

		add_action( 'after_setup_theme', array( __CLASS__, 'register_menus' ), 0 );

	}

	public static function register_menus() {

		register_nav_menus(
			array(
				'site'    => 'Site Navigation',
				'footer'  => 'Footer Menu',
				'offsite' => 'Offsite Menu',
			)
		);

	}

	public static function get( $format = false ) {

		$nav_menus = wp_get_nav_menus();

		if ( 'select' === $format ) {

			$select = array();

			foreach ( $nav_menus as $nav_menu ) {

				$select[ $nav_menu->slug ] = $nav_menu->name;

			}

			$nav_menus = $select;

		}

		return $nav_menus;

	}

}

Menus::init();
