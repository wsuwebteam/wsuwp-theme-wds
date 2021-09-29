<?php namespace WSUWP\Theme\WDS;


class Query {


	protected static $exclude_posts = array();


	public static function get_exclude_posts( ) {

		return self::$exclude_posts;

	}

	public static function add_exclude_post( $post_id ) {

		self::$exclude_posts[] = $post_id;

	}


	public static function get_block_query_args( $attrs ) {

		$query_args = array(
			'post_type'      => ( ! empty( $attrs['postType'] ) ) ? explode( ',', $attrs['postType'] ) : array( 'post' ),
			'posts_per_page' => ( ! empty( $attrs['perPage'] ) ) ? $attrs['perPage'] : 10,
			'posts_status'   => ( ! empty( $attrs['postStatus'] ) ) ? explode( ',', $attrs['postStatus'] ) : array( 'publish' ),
		);

		return $query_args;

	}



	/*public static function get_related( $post_id, $taxonomy = 'category', $query_args = array() ) {

		$term_id = Taxonomy::get_related_term_id( $post_id, $taxonomy );

		if ( $term_id ) {

			$query_args['tax_query'] = array(
				array(
					'taxonomy' => $taxonomy,
					'terms'    => $term_id,
				)
			);

		}

		self::add_exclude( $query_args );

		return new \WP_Query( $query_args );

	}


	public static function get( $query_args = array() ) {

		self::add_exclude( $query_args );

		return new \WP_Query( $query_args );

	}


	public static function add_exclude( &$query_args ) {

		$query_args['post__not_in'] = self::get_exclude_posts();

	}*/

}