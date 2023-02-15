<?php namespace WSUWP\Theme\WDS;


class WSU_Option {

	public static function get( $group, $key, $default = '' ) {

		$wsu_option = get_option( 'wsuwp' );

		if ( is_array( $wsu_option ) && ! empty( $wsu_option[ $group ] ) ) {

			if ( isset( $wsu_option[ $group ][ $key] ) ) {

				if ( ! empty( $wsu_option[ $group ][ $key] ) ) {

					return $wsu_option[ $group ][ $key];

				} else {

					return $default;

				}
			}
		} else {

			return $default;

		}

	}


}
