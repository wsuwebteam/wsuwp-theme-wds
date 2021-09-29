<?php namespace WSUWP\Theme\WDS;

class Block_WSUWP_Post_Layout extends Block {

	protected static $block_name    = 'wsuwp/post-layout';
	protected static $default_attrs = array(
		'className' => '',
        'hide'      => false,
		'format'    => 'default',
		'style'     => 'default',
		'context'   => '',
	);


	public static function render( $attrs, $content = '' ) {


		$wrapper_classes = 'wsu-layout';

		$context = ( ! empty( $attrs['context'] ) ) ? $attrs['context'] .'-' : '';

		static::add_class( $wrapper_classes, '', 'className', $attrs );
		static::add_class( $wrapper_classes, 'wsu-layout--', 'style', $attrs );
		static::add_class( $wrapper_classes, 'wsu-layout--', 'format', $attrs );

		ob_start();

		switch ( $attrs['format'] ) {

			case 'sidebar':
				include __DIR__ . '/templates/sidebar.php';
				break;
			default:
				include __DIR__ . '/templates/default.php';
				break;
			
		}

		return ob_get_clean();

	}

}