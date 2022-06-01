<?php namespace WSUWP\Theme\WDS;


class WDS_Options {


	public static function get( $group, $property, $default = '' ) {

		$wds_options = get_option( 'wsu_wds' );

		//var_dump( get_option( 'wsu_wds' ) );

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


	public static function set( $group, $property, $value ) {

		$wds_options = get_option( 'wsu_wds', [] );

		if ( is_array( $wds_options ) ) {

			if ( ! isset( $wds_options[ $group ] ) ) {

				$wds_options[ $group ] = [];

			}

			$wds_options[ $group ][ $property ] = $value;

			update_option( 'wsu_wds', $wds_options );

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


	public static function get_legacy_check( $group, $property, $default, $theme_mod_key ) {

		$theme_value = get_theme_mod( $theme_mod_key, '' );

		if ( $theme_value !== '' ) {

			self::set( $group, $property, $theme_value );

			remove_theme_mod( $theme_mod_key );

			$value = $theme_value;

		} else {

			$value = self::get( $group, $property, $default );

		}

		return $value;

	}

}
