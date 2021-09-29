<?php namespace WSUWP\Theme\WDS;

class Block_WSUWP_Post_Header extends Block {

	protected static $block_name    = 'wsuwp/post-header';
	protected static $default_attrs = array(
		'className' => '',
        'hide'      => false,
		'style'     => 'default',
	);


	public static function render( $attrs, $content = '' ) {

		if ( ! static::is_set( $attrs, 'hide' ) ) {

			$wrapper_classes = 'wsu-article-header';

			static::add_class( $wrapper_classes, '', 'className', $attrs );
			static::add_class( $wrapper_classes, 'wsu-article-header--', 'style', $attrs );

			ob_start();

			include __DIR__ . '/templates/default.php';

			return ob_get_clean();

		} else {

			return '';
		}


	}

}