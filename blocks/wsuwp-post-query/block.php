<?php namespace WSUWP\Theme\WDS;

class Block_WSUWP_Post_Query extends Block {

	protected static $block_name    = 'wsuwp/post-query';
	protected static $default_attrs = array(
		'className'  => '',
		'postType'   => '',
		'postStatus' => '',
		'perPage'    => '',
	);


	public static function render( $attrs, $content = '' ) {

		ob_start();

		if ( self::is_custom( $attrs ) ) {

			$query_args = Query::get_block_query_args( $attrs );

			var_dump( $query_args );

			include __DIR__ . '/templates/custom-query.php';

		} else {

			include __DIR__ . '/templates/default.php';

		}

		return ob_get_clean();

	}


	protected static function is_custom( $attrs ) {

		$custom_args = array(
			'postType',
			'postStatus',
			'perPage',
		);

		foreach ( $custom_args as $key ) {

			if ( ! empty( $attrs[ $key ] ) ) {

				return true;

			}
		}

		return false;

	}

}