<?php namespace WSUWP\Theme\WDS;


class Scripts {


	public static function init() {

		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_scripts' ), 5 );

		add_action( 'wp_head', array( __CLASS__, 'add_head_settings' ), 5 );

	}

	public static function enqueue_scripts() {

		$version      = Theme::get( 'version' );
		$wds_version  = get_theme_mod( 'wsu_wds_version', '2.x' );
		$normalize    = 'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css';
		$wsu_icons    = 'https://cdn.web.wsu.edu/designsystem/1.x/wsu-icons/dist/wsu-icons.bundle.css';
		$wsu_bs_icons = 'https://cdn.web.wsu.edu/designsystem/css/bootstrap-icons.css';
		$wds_css      = "https://cdn.web.wsu.edu/designsystem/{$wds_version}/dist/bundles/wsu-design-system.css";
		$wds_wp_css   = "https://cdn.web.wsu.edu/designsystem/{$wds_version}/dist/bundles/wsu-design-system.wordpress.css";
		$wds_synd_css = "https://cdn.web.wsu.edu/designsystem/{$wds_version}/dist/bundles/wsu-design-system.content-syndicate.css";
		$wds_js       = "https://cdn.web.wsu.edu/designsystem/{$wds_version}/dist/bundles/wsu-design-system.js";
		$wds_init_js  = "https://cdn.web.wsu.edu/designsystem/{$wds_version}/dist/bundles/wsu-design-system.init.js";

		$version .= ( defined( 'WSUWPPLUGINGUTENBERGVERSION' ) ) ? '-' . WSUWPPLUGINGUTENBERGVERSION : '';

		wp_enqueue_style( 'wsu_design_system_normalize', $normalize, array(), $version );
		wp_enqueue_style( 'wsu_design_system_icons', $wsu_icons, array(), $version );
		wp_enqueue_style( 'wsu_design_system_css', $wds_css, array(), $version );
		wp_enqueue_style( 'wsu_design_system_css_wordpress', $wds_wp_css, array(), $version );
		
		if ( WDS_Options::get( 'scripts', 'syndicate', false ) ) {

			wp_enqueue_style( 'wsu_design_system_css_syndicate', $wds_synd_css, array(), $version );

		}

		if ( WDS_Options::get( 'scripts', 'bootstrap', false ) ) {

			wp_enqueue_style( 'wsu_design_system_css_bootstrap', $wsu_bs_icons, array(), $version );

		}


		wp_enqueue_script( 'wsu_design_system_js_init', $wds_init_js, array(), $version, false );
		wp_enqueue_script( 'wsu_design_system_js', $wds_js, array(), $version, true );

		if ( WDS_Options::get( 'scripts', 'jquery', false ) ) {

			wp_enqueue_script( 'jquery' );
			
		}

	}


	public static function add_head_settings() {

		if ( WDS_Options::get( 'script_settings', 'outline_style', false ) ) {

			echo "<style>@font-face { font-family: 'wsu-outline'; src: url('https://cdn.web.wsu.edu/css/Montserrat-Bold-static.ttf') format(\"opentype\"); }</style>";

		}

	}


}

Scripts::init();
