<?php namespace WSUWP\Theme\WDS;

class Block_WSUWP_Post_Social extends Block {

	protected static $block_name    = 'wsuwp/post-social';
	protected static $default_attrs = array(
		'className' => '',
        'hide'      => false,
		'style'     => 'default',
		'bodyText'  => '',
		'title'     => '',
		'link'      => '',
		'twitter'   => '',
		'facebook'  => '',
		'linkedin'  => '',
		'instagram' => '',
		'setFrom'   => 'post',
	);


	public static function render( $attrs, $content = '' ) {

		if ( ! static::is_set( $attrs, 'hide' ) ) {

			self::set_attrs( $attrs );

			$wrapper_classes = 'wsu-social-icons';

			static::add_class( $wrapper_classes, '', 'className', $attrs );
			static::add_class( $wrapper_classes, 'wsu-social-icons--', 'style', $attrs );

			ob_start();

			include __DIR__ . '/templates/default.php';

			return ob_get_clean();

		} else {

			return '';
		}

	}


	public static function set_attrs( &$attrs ) {

		if ( 'post' === $attrs['setFrom'] ) {

			if ( in_the_loop() ) {

				//$attrs['link'] = ( empty( $attrs['link'] ) ) ? urlencode( get_permalink() ) : $attrs['link'];
	
				//$attrs['title'] = ( empty( $attrs['link'] ) ) ? urlencode( get_the_title() ) : $attrs['title'];
	
				$attrs['link'] = ( empty( $attrs['link'] ) ) ? get_permalink() : $attrs['link'];
	
				$attrs['title'] = ( empty( $attrs['title'] ) ) ? get_the_title() : $attrs['title'];

				$attrs['twitter']   = $attrs['link'];
				$attrs['facebook']  = $attrs['link'];
				$attrs['linkedin']  = $attrs['link'];
				$attrs['instagram'] = $attrs['link'];
				$attrs['email']     = $attrs['link'];
	
			}

		} elseif ( 'options' === $attrs['setFrom'] ) {

			$attrs['twitter']   = WDS_Options::get( 'social', 'twitter' );
			$attrs['facebook']  = WDS_Options::get( 'social', 'facebook' );
			$attrs['linkedin']  = WDS_Options::get( 'social', 'linkedin' );
			$attrs['instagram'] = WDS_Options::get( 'social', 'instagram' );
			$attrs['email']     = WDS_Options::get( 'social', 'email', get_bloginfo( 'url' ) );

		}

	}


}