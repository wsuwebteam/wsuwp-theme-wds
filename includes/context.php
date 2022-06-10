<?php namespace WSUWP\Theme\WDS;


class Context {

	public static function get() {

		if ( is_front_page() ) {

			return 'home';

		} elseif ( is_singular() ) {

			if ( is_page() ) {

				return 'page';

			} elseif ( is_single() ) {

				return 'post';

			}

			return 'single';

		} elseif ( is_archive() ) {

			if ( is_post_type_archive() ) {

				return 'post-archive';

			} elseif ( is_category() ) {

				return 'category';

			} elseif ( is_tag() ) {

				return 'tag';

			} elseif ( is_tax() ) {

				return 'taxonomy';

			}

			return 'archive';

		} elseif ( is_search() ) {

			return 'search';

		} elseif ( is_404() ) {

			return '404';

		}

		return 'index';

	}
}
