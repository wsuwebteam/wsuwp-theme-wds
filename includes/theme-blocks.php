<?php namespace WSUWP\Theme\WDS;


class Theme_Blocks {


	public static function init() {
		
		require_once get_template_directory() . '/classes/class-theme-block.php';
		require_once get_template_directory() . '/classes/class-block-customizer.php';

		require_once get_template_directory() . '/theme-blocks/header-campus/theme-block.php';
		require_once get_template_directory() . '/theme-blocks/header-global/theme-block.php';
		require_once get_template_directory() . '/theme-blocks/header-system/theme-block.php';
		require_once get_template_directory() . '/theme-blocks/header-quicklinks/theme-block.php';
		require_once get_template_directory() . '/theme-blocks/header-unit/theme-block.php';
		require_once get_template_directory() . '/theme-blocks/navigation-audience/theme-block.php';
		require_once get_template_directory() . '/theme-blocks/navigation-mobile/theme-block.php';
		require_once get_template_directory() . '/theme-blocks/navigation-vertical/theme-block.php';
		

	}


	public static function render( $slug, $args = array() ) {

		switch ( $slug ) {

			case 'header_campus':
				Theme_Block_Header_Campus::render_block( $args );
				break;
			case 'header_system':
				Theme_Block_Header_System::render_block( $args );
				break;
			case 'header_global':
				Theme_Block_Header_Global::render_block( $args );
				break;
			case 'header_unit':
				Theme_Block_Header_Unit::render_block( $args );
				break;
			case 'navigation_audience':
				Theme_Block_Navigation_Audience::render_block( $args );
				break;
			case 'navigation_vertical':
				Theme_Block_Navigation_Vertical::render_block( $args );
				break;
			case 'navigation_mobile':
				Theme_Block_Navigation_Mobile::render_block( $args );
				break;
			case 'header_quicklinks':
				Theme_Block_Header_Quicklinks::render_block( $args );
				break;

		}

	}

	public static function render_option( $option_slug, $default_option = false, $args = array() ) {

		$block_slug = WDS_Options::get( 'theme_options', $option_slug, $default_option );

		if ( ! empty( $block_slug ) ) {

			self::render( $block_slug, $args );

		}

	}

}

Theme_Blocks::init();
