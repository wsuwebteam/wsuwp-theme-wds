<?php namespace WSUWP\Theme\WDS;


class Template_Part {

	public static function init() {

		add_action( 'wds_template_part', array( __CLASS__, 'render_template_part' ), 10, 3 );
		
	}


	public static function render_template_part( $part_slug, $context, $default_show = true ) {

		$context = str_replace( '-', '_', $context );

		$part_slug = str_replace( '-', '_', $part_slug );

		$theme_mod_key = 'wsu_wds_template_' . $context . '_' . $part_slug . '_show';

		$show_part =  WDS_Options::get_legacy_check( "template_{$context}", $part_slug, $default_show, $theme_mod_key );

		if ( $show_part ) {

			switch ( $part_slug ) {

				case 'post_meta_location_taxonomy':
					get_template_part( 'template-parts/post-meta-location-taxonomy', $context, array( 'context' => $context ) );
					break;
	
			}
		}
	}

}


Template_Part::init();
