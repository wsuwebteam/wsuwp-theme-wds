<?php namespace WSUWP\Theme\WDS;

class Walker_Nav_Menu_Offsite extends \Walker_Nav_Menu {


	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {

		$classes     = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );

		$output .= $this->build_list_item_start( $output, $item, $depth, $args, $id );

		$output .= $this->build_link_item( $output, $item, $depth, $args, $id );

	}


	protected function build_list_item_start( &$output, $item, $depth = 0, $args = null, $id = 0) {

		$output .= '<li>';

	}

	protected function build_link_item( &$output, $item, $depth = 0, $args = null, $id = 0) {

		$atts           = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target ) ? $item->target : '';

		if ( '_blank' === $item->target && empty( $item->xfn ) ) {

			$atts['rel'] = 'noopener';

		} else {

			$atts['rel'] = $item->xfn;

		}

		$atts['href']         = ! empty( $item->url ) ? $item->url : '';
		$atts['class'] = ( false === strpos( get_bloginfo( 'url' ), $item->url ) ) ? 'wsu-link--external' : '';
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

	}

}
