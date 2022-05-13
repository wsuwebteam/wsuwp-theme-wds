<?php namespace WSUWP\Theme\WDS;


class WDS_Options {


	public static function get( $group, $property, $default = '' ) {

		$wds_options = get_option( 'wsu_wds' );

		if ( is_array( $wds_options ) && ! empty( $wds_options[ $group ] ) ) {

			if ( isset( $wds_options[ $group ][ $property ] ) ) {

				if ( ! empty( $wds_options[ $group ][ $property ] ) ) {

					return $wds_options[ $group ][ $property ];

				} else {

					return $default;

				}
			}
		} else {

			return $default;

		}

	}

	public static function get_option_class( $group, $property, $prefix, $default = '' ) {

		$value = self::get( $group, $property, $default );

		$class = '';

		if ( ! empty( $value ) && 'default' !== $value ) {

			$class = $prefix . $value;

		}

		return $class;

	}

}
