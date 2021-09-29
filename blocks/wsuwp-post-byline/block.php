<?php namespace WSUWP\Theme\WDS;

class Block_WSUWP_Post_Byline extends Block {

	protected static $block_name    = 'wsuwp/post-byline';
	protected static $default_attrs = array(
		'className'   => '',
        'hide'        => false,
		'style'       => 'default',
		'authorName'  => '',
		'authorTitle' => '',
		'authorLink'  => '',
		'authorId'    => '',
		'authors'     => array(),
	);


	public static function render( $attrs, $content = '' ) {

		if ( ! static::is_set( $attrs, 'hide' ) ) {

			self::parse_attrs( $attrs );

			$wrapper_classes = 'wsu-meta-byline';

			static::add_class( $wrapper_classes, '', 'className', $attrs );
			static::add_class( $wrapper_classes, 'wsu-meta-byline--', 'style', $attrs );

			ob_start();

			foreach ( $attrs['authors'] as $author ) {

				$author_name  = ( ! empty( $author['name'] ) ) ? $author['name'] : '';
				$author_title = ( ! empty( $author['title'] ) ) ? $author['title'] : '';
				$author_link  = ( ! empty( $author['link'] ) ) ? $author['link'] : '';

				include __DIR__ . '/templates/default.php';

			} 

			return ob_get_clean();

		} else {

			return '';
		}


	}


	public static function parse_attrs( &$attrs ) {

		if ( empty( $attrs['authorName'] ) ) {

			if ( in_the_loop() ) {

				$attrs['authors'] = array(
					array(
						'name'       => get_the_author(),
						'authorLink' => get_the_author_posts_link(),
					),
				);

			} elseif ( ! empty( $attrs['authorId'] ) ) {

				$attrs['authors'] = array(
					array(
						'name'       => get_the_author_meta( 'display_name', $attrs['authorId'] ),
						'authorLink' => get_the_author_meta( 'display_name', $attrs['authorId'] ),
					),
				);
			}
		}

		$attrs = apply_filters( 'wsu_wds_component_post_byline', $attrs );

	}

}