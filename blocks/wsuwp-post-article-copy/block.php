<?php namespace WSUWP\Theme\WDS;

class Block_WSUWP_Post_Article_Copy extends Block {

	protected static $block_name    = 'wsuwp/post-article-copy';
	protected static $default_attrs = array(
		'className' => '',
	);


	public static function render( $attrs, $content = '' ) {

		$wrapper_classes = 'wsu-article-copy';

		ob_start();

		include __DIR__ . '/templates/default.php';

		return ob_get_clean();

	}

}