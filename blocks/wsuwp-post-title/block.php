<?php namespace WSUWP\Theme\WDS;

class Block_WSUWP_Post_Title extends Block {

	protected static $block_name    = 'wsuwp/post-title';
	protected static $default_attrs = array(
		'className' => '',
		'type'      => 'default',
		'tag'       => 'h1',
		'linkTitle' => false,
		'tab'       => false,
	);


	public static function render( $attrs, $content = '' ) {

		$wrapper_classes = '';

		static::add_class( $wrapper_classes, '', 'className', $attrs );

		ob_start();

		include __DIR__ . '/templates/default.php';

		return ob_get_clean();

	}

}