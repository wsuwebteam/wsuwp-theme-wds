<?php namespace WSUWP\Theme\WDS;

class Walker_Nav_Menu_Category extends \Walker_Nav_Menu {


	public $child_link = false;


	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {

		$classes     = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );

		if ( $this->child_link ) {

			$output .= '<li>' . $this->child_link . '</li>';

			$this->child_link = false;

		}

		$output .= $this->build_list_item_start( $output, $item, $depth, $args, $id );

		$output .= $this->build_link_item( $output, $item, $depth, $args, $id );

	}

	public function end_lvl( &$output, $depth = 0, $args = null ) {

		if ( $depth = 1 ) { 

			$output .= '<li class="wsu-navigation-site-horizontal__menu-item-close"><button class="wsu-button-ui--close wsu-menu--submenu-close">Close</button></li>';

		}

        $output .= '</ul>';

    }


	protected function build_list_item_start( &$output, $item, $depth = 0, $args = null, $id = 0) {

		$wp_classes     = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $wp_classes ), $item, $args, $depth ) );

		$classes = '';

		$classes .= ( in_array( 'current-menu-ancestor', (array) $item->classes, true ) ) ? ' wsu-menu-item--parent' : '';

		if ( in_array( 'current-menu-item', (array) $item->classes, true ) ) {
			$classes .= ( in_array( 'menu-item-has-children', (array) $item->classes, true ) ) ? ' wsu-menu-item--parent' : ' wsu-menu-item--current';
		}

		$output .= '<li';

		$output .= ( ! empty( $classes ) ) ? ' class="' . esc_attr( $classes ) . '"' : '';

		$is_expanded = ( $this->is_expanded( $item, $depth ) ) ? 'true' : 'false';

		$output .= ( in_array( 'menu-item-has-children', (array) $item->classes, true ) ) ? ' aria-expanded="' . $is_expanded . '" aria-haspopup="true"' : '';

		$output .= '>';

	}

	protected function build_link_item( &$output, $item, $depth = 0, $args = null, $id = 0) {

		$label = ( ! empty( $item->attr_title ) ) ? $item->attr_title :  $item->title;

		if ( '#' === $item->url || in_array( 'menu-item-has-children', (array) $item->classes, true )  ) {

			$button_label = ( $this->is_expanded( $item, $depth ) ) ? 'Close' : 'Open';

			$output .= '<button class="wsu-menu--toggle" aria-label="' . $button_label  . ' submenu for ' . esc_attr( wp_strip_all_tags( $item->title ) ) . '">' . esc_html( $item->title ) . '</button>';

		}

		if ( '#' !== $item->url ) {

			$atts           = array();
			$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
			$atts['target'] = ! empty( $item->target ) ? $item->target : '';

			if ( '_blank' === $item->target && empty( $item->xfn ) ) {

				$atts['rel'] = 'noopener';

			} else {

				$atts['rel'] = $item->xfn;

			}

			$atts['href']         = ! empty( $item->url ) ? $item->url : '';
			$atts['aria-current'] = $item->current ? 'page' : '';
			$atts['aria-role'] = ( '#' === $item->url ) ? 'button' : '';

			$atts       = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
			$attributes = '';

			foreach ( $atts as $attr => $value ) {

				if ( is_scalar( $value ) && '' !== $value && false !== $value ) {

					$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			$link = '<a' . $attributes . '>';

			$link .= esc_html( $label );

			$link .= '</a>';

			if ( in_array( 'menu-item-has-children', (array) $item->classes, true ) ) {

				$this->child_link = $link;

			} else {

				$output .= $link;

			}
		}

	}


	protected function is_expanded( $item, $depth ) {

		if ( $depth < 1 ) {

			return false;

		} 

		return ( in_array( 'current-menu-item', (array) $item->classes, true ) || in_array( 'current-menu-ancestor', (array) $item->classes, true ) );

	}

}
