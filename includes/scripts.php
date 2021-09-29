<?php namespace WSUWP\Theme\WDS;


class Scripts {


	public static function init() {

		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_scripts' ), 5 );

		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'enqueue_admin_scripts' ) );

		//add_action( 'wp_enqueue_scripts', array( __CLASS__, 'remove_scripts' ), 20 );

	}



	public static function remove_scripts() {

		wp_dequeue_style( 'wp-block-library' );

	}


	public static function enqueue_scripts() {

		$theme_version = Theme::get( 'version' );
		$wds_version   = ( ! empty( get_theme_mod( 'wsu_wds_theme_beta' ) ) ) ? '2.beta' : '2.x';
		$is_local      = ( defined( 'WDS_LOCALHOST_URL' ) ) ? true : false;

		$wsu_design_system_normalize = 'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css';
		$wsu_design_system_icons     = 'https://cdn.web.wsu.edu/designsystem/1.x/wsu-icons/dist/wsu-icons.bundle.css';
		$wsu_design_system_css_path  = '/dist/bundles/wsu-design-system.css';
		$wsu_design_system_js_path   = '/dist/bundles/wsu-design-system.js';
		$wsu_design_system_host      = ( defined( 'WDS_LOCALHOST_URL' ) ) ? WDS_LOCALHOST_URL : 'https://cdn.web.wsu.edu/designsystem/' . $wds_version;
		$wsu_design_system_css       = $wsu_design_system_host . $wsu_design_system_css_path;
		$wsu_design_system_js        = $wsu_design_system_host . $wsu_design_system_js_path;

		wp_enqueue_style( 'wsu_design_system_normalize', $wsu_design_system_normalize, array(), $theme_version );

		wp_enqueue_style( 'wsu_design_system_icons', $wsu_design_system_icons, array(), $theme_version );

		wp_enqueue_style( 'wsu_design_system_css', $wsu_design_system_css, array(), $theme_version );

		//wp_enqueue_style( 'wsu_design_system_temp', get_stylesheet_directory_uri() . '/temp-style.css', array(), $theme_version );

		wp_enqueue_script( 'wsu_design_system_js', $wsu_design_system_js, array(), $theme_version, true );

	}

	public static function enqueue_admin_scripts() {

		//wp_enqueue_style( 'wsu_design_system_wordpress_admin', 'https://cdn.web.wsu.edu/designsystem/' . self::get('wds_version') . '/build/dist/platforms/wsu-design-system.wordpress.admin.bundle.dist.css', array(), Theme::get( 'version' ) );

	}

	
	public static function get_script_version() {

		return ( ! empty( get_theme_mod( 'wsu_wds_settings_version' ) ) ) ? get_theme_mod( 'wsu_wds_settings_version' ) : '1.x';

	}

}

Scripts::init();
