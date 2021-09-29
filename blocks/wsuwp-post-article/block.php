<?php namespace WSUWP\Theme\WDS;

class Block_WSUWP_Post_Article extends Block {

	protected static $block_name    = 'wsuwp/post-article';
	protected static $default_attrs = array(
		'className' => '',
	);


	public static function render( $attrs, $content = '' ) {

		$wrapper_classes = 'wsu-article';

		static::add_class( $wrapper_classes, '', 'className', $attrs );

		ob_start();

		include __DIR__ . '/templates/default.php';

		return ob_get_clean();

	}

}