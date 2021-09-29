<?php namespace WSUWP\Theme\WDS;

class Block_WSUWP_Pagination extends Block {

	protected static $block_name    = 'wsuwp/pagination';
	protected static $default_attrs = array(
		'className'    => '',
		'type'         => 'default',
		'baseUrl'      => '',
		'nextLink'     => '',
		'previousLink' => '',
	);


	public static function init() {

		add_filter( 'next_posts_link_attributes', array( __CLASS__, 'posts_link_attributes' ) );

		add_filter( 'previous_posts_link_attributes', array( __CLASS__, 'posts_link_attributes' ) );

	}


	public static function render( $attrs, $content = '' ) {

		$wrapper_classes = 'wsu-pagination';

		static::add_class( $wrapper_classes, '', 'className', $attrs );
		static::add_class( $wrapper_classes, 'wsu-pagination--', 'style', $attrs );

		ob_start();

		switch ( $attrs['type'] ) {

			case 'week':
				self::set_weekly_pagination_links( $attrs );
				include __DIR__ . '/templates/week.php';

			default:
				include __DIR__ . '/templates/default.php';

		}

		return ob_get_clean();

	}




	protected static function set_weekly_pagination_links( &$attrs ) {

		$base_url = '';

		//$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		if ( is_category() ) {

			$term_id = get_queried_object_id();

			$base_url = get_category_link( $term_id );

		} elseif ( is_tax() ) {

			$term_id = get_queried_object_id();

			$base_url = get_term_link( $term_id );

		} elseif ( is_post_type_archive() ) {

			$base_url = get_post_type_archive_link( get_post_type() );

		}

		$page_links = paginate_links(

			array(
				'base' => $base_url . '%_%',
				'total' => 100,
				'type' => 'array',
				'end_size' => 0,
				'mid_size' => 0,

			)
		);

		var_dump( $page_links );

		//$attrs['nextLink']     => ( 1 < $paged ) ? '<a href="' . $base_url . '">Next</a>' : '';
		//$attrs['previousLink'] => ( ! empty( $attrs['previousLink'] ) ) ? $attrs['previousLink'] : previous_posts_link( 'Previous' ),

	}


	public static function posts_link_attributes() {

		return 'class="wsu-button wsu-button--inline"';

	}

}