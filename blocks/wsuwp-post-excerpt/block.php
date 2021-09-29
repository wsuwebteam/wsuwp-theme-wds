<?php namespace WSUWP\Theme\WDS;

class Block_WSUWP_Post_Excerpt extends Block {

	protected static $block_name    = 'wsuwp/post-excerpt';
	protected static $default_attrs = array(
		'className'   => '',
		'type'        => 'default',
		'style'       => '',
		'hideCaption' => false,
	);


	public static function render( $attrs, $content = '' ) {

		$wrapper_classes = 'wsu-caption';

		static::add_class( $wrapper_classes, '', 'className', $attrs );
		static::add_class( $wrapper_classes, 'wsu-caption--', 'style', $attrs );

		ob_start();

		if ( ! $attrs['hideCaption'] ) {

			include __DIR__ . '/templates/default.php';

		}

		return ob_get_clean();

	}

}