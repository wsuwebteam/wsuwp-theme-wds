<?php namespace WSUWP\Theme\WDS;

class Block {

	protected static $block_name        = false;
	protected static $default_attrs     = array();
	protected static $customizer_prefix = 'wsuwp_wds_component_';
	protected static $register_block    = true;


	public static function get( $property ) {

		switch ( $property ) {

			case 'block_name':
				return static::$block_name;

			case 'default_attrs':
				return static::$default_attrs;

			case 'customizer_prefix':
				return static::$customizer_prefix;

			case 'register_block';
				return static::$register_block;

			default:
				return '';

		}

	}


	public static function render_block( $attrs, $content = '' ) {

		self::parse_attrs( $attrs );

		return static::render( $attrs, $content );

	}


	protected static function parse_attrs( &$attrs ) {

		$default_attrs   = self::get( 'default_attrs' );
		$customizer_name = str_replace( '/', '_', self::get( 'blockname' ) );
		$customizer_base = self::get( 'customizer_prefix' ) . '_' . $customizer_name . '_';

		foreach ( $default_attrs as $attr_key => $default_value ) {

			$customizer_setting = $customizer_base . str_replace( '-', '_', $attr_key );

			if ( ! self::is_set( $attrs, $attr_key ) ) {

				$attrs[ $attr_key ] = get_theme_mod( $customizer_setting, $default_value );

			}
		}

		foreach ( $default_attrs as $attr_key => $default_value ) {

			$customizer_prefix = self::get_customizer_prefix();

			$customizer_setting = $customizer_prefix . '_' . str_replace( '-', '_', $attr_key );

			if ( ! self::is_set( $attrs, $attr_key ) ) {

				$attrs[ $attr_key ] = get_theme_mod( $customizer_setting, $default_value );

			}
		}

		foreach ( $attrs as $attr_key => $value ) {

			if ( 'true' === $value || 'false' === $value ) {

				$attrs[ $attr_key ] = ( 'true' === $value ) ? true : false;
			}
		}

	}


	protected static function is_set( $attrs, $key ) {

		if ( empty( $attrs[ $key ] ) || 'default' === $attrs[ $key ] ) {

			return false;

		} else {

			return true;
		}

	}


	protected static function add_class( &$classes, $prefix, $attr_key, $attrs, $value = false ) {

		if ( self::is_set( $attrs, $attr_key ) ) {

			$class_value = ( $value ) ? $value : $attrs[ $attr_key ];

			$classes .= ' ' . $prefix . $class_value;

		}
	}


	protected static function get_customizer_prefix() {

		$block_prefix      = str_replace( array( '/', '-' ), '_', static::$block_name );
        $customizer_prefix = static::get( 'customizer_prefix' ) . '_' . $block_prefix;

		return $customizer_prefix;

	}


	public static function customizer( $wp_customize, $panel ) {

		// Nothing to see here

	}
}
