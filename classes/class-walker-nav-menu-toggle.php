<?php namespace WSUWP\Theme\WDS;

class Walker_Nav_Menu_Toggle extends \Walker_Nav_Menu {


	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {

		$classes     = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );

		$output .= $this->build_list_item_start( $output, $item, $depth, $args, $id );

		$output .= $this->build_link_item( $output, $item, $depth, $args, $id );

	}


	protected function build_list_item_start( &$output, $item, $depth = 0, $args = null, $id = 0) {

		$wp_classes     = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $wp_classes ), $item, $args, $depth ) );

		$classes = 'wsu-navigation-item';

		$classes .= ( in_array( 'current-menu-ancestor', (array) $item->classes, true ) ) ? ' wsu-menu-item--parent' : '';
		$classes .= ( in_array( 'current-menu-item', (array) $item->classes, true ) ) ? ' wsu-menu-item--current' : '';



		$output .= '<li';

		$output .= ( ! empty( $classes ) ) ? ' class="' . esc_attr( $classes ) . '"' : '';

		$is_expanded = ( $this->is_expanded( $item ) ) ? 'true' : 'false';

		$output .= ( in_array( 'menu-item-has-children', (array) $item->classes, true ) ) ? ' aria-expanded="' . $is_expanded . '" aria-haspopup="true"' : '';

		$output .= '>';

	}

	protected function build_link_item( &$output, $item, $depth = 0, $args = null, $id = 0) {

		// Pulled from https://developer.wordpress.org/reference/classes/walker_nav_menu/

		if ( '#' === $item->url && in_array( 'menu-item-has-children', (array) $item->classes, true )  ) {

			$button_label = ( $this->is_expanded( $item ) ) ? 'Close' : 'Open';

			$output .= '<button class="wsu-menu--toggle" aria-label="' . $button_label  . ' submenu for ' . esc_attr( wp_strip_all_tags( $item->title ) ) . '">' . esc_html( $item->title ) . '</button>';

		} else {

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

			$output .= '<a' . $attributes . '>';

			$output .= esc_html( $item->title );

			$output .= '</a>';

			$button_label = ( $this->is_expanded( $item ) ) ? 'Close' : 'Open';

			$output .= ( in_array( 'menu-item-has-children', (array) $item->classes, true ) ) ? '<button aria-label="{' . $button_label . ' submenu ' . esc_attr( wp_strip_all_tags( $item->title ) ) . '" class="wsu-menu--toggle"></button>' : '';

		}

	}


	protected function is_expanded( $item ) {

		return ( in_array( 'current-menu-item', (array) $item->classes, true ) || in_array( 'current-menu-ancestor', (array) $item->classes, true ) );

	}

}
