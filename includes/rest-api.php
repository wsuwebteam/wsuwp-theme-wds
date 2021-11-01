<?php namespace WSUWP\Theme\WDS;


class Rest_API {


	public static function init() {
		
		add_filter( 'rest_post_query', array( __CLASS__, 'add_taxonomy_and_logic' ), 10, 2 );

	}


	public static function add_taxonomy_and_logic( $args, $request ) {

		if ( 'AND' === $request['term_relation'] && ! empty( $request['categories'] ) ) {

			$args['category__and'] = $request['categories'];

		}

		return $args;

	}

}

Rest_API::init();
