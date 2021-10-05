<?php namespace WSUWP\Theme\WDS;


class Scripts {


	public static function init() {

		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_scripts' ), 5 );

	}

	public static function enqueue_scripts() {

		$theme_version = Theme::get( 'version' );
		$wds_version   = get_theme_mod( 'wsu_wds_version', '2.x' );
		$wds_css       = "https://cdn.web.wsu.edu/designsystem/{$wds_version}/dist/bundles/wsu-design-system.css";
		$wds_wp_css    = "https://cdn.web.wsu.edu/designsystem/{$wds_version}/dist/bundles/wsu-design-system.wordpress.css";
		$wds_js        = "https://cdn.web.wsu.edu/designsystem/{$wds_version}/dist/bundles/wsu-design-system.js";
		$wds_init_js   = "https://cdn.web.wsu.edu/designsystem/{$wds_version}/dist/bundles/wsu-design-system.init.js";

		wp_enqueue_style( 'wsu_design_system_normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css', array(), $theme_version );
		wp_enqueue_style( 'wsu_design_system_icons', 'https://cdn.web.wsu.edu/designsystem/1.x/wsu-icons/dist/wsu-icons.bundle.css', array(), $theme_version );
		wp_enqueue_style( 'wsu_design_system_css', $wds_css, array(), $theme_version );
		wp_enqueue_style( 'wsu_design_system_css_wordpress', $wds_wp_css, array(), $theme_version );

		wp_enqueue_script( 'wsu_design_system_js_init', $wds_init_js, array(), $theme_version, false );
		wp_enqueue_script( 'wsu_design_system_js', $wds_js, array(), $theme_version, true );

	}

}

Scripts::init();
