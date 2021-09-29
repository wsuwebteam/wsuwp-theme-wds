<?php namespace WSUWP\Theme\WDS;


class WDS_Options {


	public static function get( $group, $property, $default = '' ) {

		$wds_options = get_option( 'wsu_wds' );

		if ( is_array( $wds_options ) && ! empty( $wds_options[ $group ] ) ) {

			return ( isset( $wds_options[ $group ][ $property ] ) ) ? $wds_options[ $group ][ $property ] : $default;

		} else {

			return $default;

		}

	}

}
