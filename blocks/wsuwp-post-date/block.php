<?php namespace WSUWP\Theme\WDS;

class Block_WSUWP_Post_date extends Block {

	protected static $block_name    = 'wsuwp/post-date';
	protected static $default_attrs = array(
		'className' => '',
        'hide'      => false,
		'style'     => 'default',
	);


	public static function render( $attrs, $content = '' ) {

		if ( ! static::is_set( $attrs, 'hide' ) ) {

			$wrapper_classes = 'wsu-meta-date';

			static::add_class( $wrapper_classes, '', 'className', $attrs );
			static::add_class( $wrapper_classes, 'wsu-meta-date--', 'style', $attrs );

			ob_start();

			include __DIR__ . '/templates/default.php';

			return ob_get_clean();

		} else {

			return '';
		}


	}

}