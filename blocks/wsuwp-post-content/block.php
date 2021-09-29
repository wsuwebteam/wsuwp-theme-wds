<?php namespace WSUWP\Theme\WDS;

class Block_WSUWP_Post_Content extends Block {

	protected static $block_name    = 'wsuwp/post-content';
	protected static $default_attrs = array(
		'className' => '',
		'ignoreMore' => '',
	);


	public static function render( $attrs, $content = '' ) {

		ob_start();

		if ( ! empty( $attrs['ignoreMore'] ) ) {

			global $post;

			$content = $post->post_content;

			$content = str_replace( '<!--more-->', '', $content );

			echo apply_filters( 'the_content', $content );

		} else {

			the_content();

		}

		return ob_get_clean();

	}

}