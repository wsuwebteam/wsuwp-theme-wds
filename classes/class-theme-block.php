<?php namespace WSUWP\Theme\WDS;


class Theme_Block {

	protected static $option_slug = false;
	protected static $default_args = array();

	public static function render_block( $args = array() ) {

		$context = Context::get();

		static::render( static::parse_defaults( $args ), $context );

	}

	protected static function parse_defaults( $args ) {

		$block_args = array();

		$set_args = self::get_options();

		foreach ( static::$default_args as $arg_key => $arg_value ) {

			if ( isset( $args[ $arg_key ] ) ) {

				$block_args[ $arg_key ] = $args[ $arg_key ];

			} elseif ( isset( $set_args[ $arg_key ] ) ) {

				$block_args[ $arg_key ] = $set_args[ $arg_key ];

			} else {

				$block_args[ $arg_key ] = $arg_value;

			}

		}

		return $block_args;

	}


	protected static function get_options() {

		$wds_options = get_option( 'wsu_wds', array() );

		return ( isset( $wds_options[ static::$option_slug ] ) ) ? $wds_options[ static::$option_slug ] : array();

	}

}