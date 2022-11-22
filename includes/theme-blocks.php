<?php namespace WSUWP\Theme\WDS;


class Theme_Blocks {


	public static function init() {
		
		require_once get_template_directory() . '/classes/class-theme-block.php';
		require_once get_template_directory() . '/classes/class-block-customizer.php';

		require_once get_template_directory() . '/theme-blocks/header-campus/theme-block.php';
		require_once get_template_directory() . '/theme-blocks/header-global/theme-block.php';
		require_once get_template_directory() . '/theme-blocks/header-quicklinks/theme-block.php';
		require_once get_template_directory() . '/theme-blocks/navigation-vertical/theme-block.php';
		require_once get_template_directory() . '/theme-blocks/navigation-mobile/theme-block.php';

	}


	public static function render( $slug, $args = array() ) {

		switch ( $slug ) {

			case 'header_campus':
				Theme_Block_Header_Campus::render_block( $args );
				break;
			case 'header_global':
				Theme_Block_Header_Global::render_block( $args );
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

}

Theme_Blocks::init();