<?php namespace WSUWP\Theme\WDS;

class Walker_Nav_Menu_Collapse extends \Walker_Nav_Menu {


	public function __construct( $args = array() ) {

		$this->menu_args = $args;

		$this->in_context = true;

		$this->is_context_menu = $args['inContext'] ?? false;

	}


	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {


		$classes     = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );

		$output .= $this->build_list_item_start( $output, $item, $depth, $args, $id );

		$output .= $this->build_link_item( $output, $item, $depth, $args, $id );

	}

	public function start_lvl( &$output, $depth = 0, $args = null ) {

		if ( $this->in_context ) {

			parent::start_lvl( $output, $depth, $args );
		}
	}

	public function end_lvl( &$output, $depth = 0, $args = null ) {

		if ( $this->in_context ) {

			parent::end_lvl( $output, $depth, $args );

		}
	}


	protected function build_list_item_start( &$output, $item, $depth = 0, $args = null, $id = 0) {

		$this->set_context( $item, $depth, $args, $id );

		if ( $this->in_context ) {

			$wp_classes     = empty( $item->classes ) ? array() : (array) $item->classes;
			$class_names = implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $wp_classes ), $item, $args, $depth ) );

			$classes = '';

			$parent_classes = array( 'current-menu-ancestor', 'current-page-ancestor' );

			$classes .= ( array_intersect( $parent_classes, (array) $item->classes ) ) ? ' wsu-menu-collapse--current-item-parent' : '';
			$classes .= ( in_array( 'current-menu-item', (array) $item->classes, true ) ) ? ' wsu-menu-collapse--current-item' : '';

			$output .= '<li';

			$output .= ( ! empty( $classes ) ) ? ' class="' . esc_attr( $classes ) . '"' : '';

			if ( ! ( $this->is_context_menu && $depth == 0 ) ) {

				$is_expanded = ( $this->is_expanded( $item ) ) ? 'true' : 'false';

				$output .= ( in_array( 'menu-item-has-children', (array) $item->classes, true ) ) ? ' aria-expanded="' . $is_expanded . '" aria-haspopup="true"' : '';

			}

			$output .= '>';

		}


	}

	protected function build_list_item_end( &$output, $item, $depth = 0, $args = null, $id = 0) {

		$this->set_context( $item, $depth, $args, $id );

		if ( $this->in_context ) {

			$output .= '</li>';

		}

	}

	protected function build_link_item( &$output, $item, $depth = 0, $args = null, $id = 0) {

		$this->set_context( $item, $depth, $args, $id );

		if ( $this->in_context ) {

			if ( '#' === $item->url && in_array( 'menu-item-has-children', (array) $item->classes, true )  ) {

				$button_label = ( $this->is_expanded( $item ) ) ? 'Close' : 'Open';

				$output .= '<button class="wsu-menu-collapse--action-toggle" aria-label="' . $button_label  . ' submenu for ' . esc_attr( wp_strip_all_tags( $item->title ) ) . '">' . esc_html( $item->title ) . '</button>';

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

				if ( ! ( $this->is_context_menu && $depth == 0 ) ) {

					$button_label = ( $this->is_expanded( $item ) ) ? 'Close' : 'Open';

					$output .= ( in_array( 'menu-item-has-children', (array) $item->classes, true ) ) ? '<button aria-label="{' . $button_label . ' submenu ' . esc_attr( wp_strip_all_tags( $item->title ) ) . '" class="wsu-menu-collapse--action-toggle"></button>' : '';

				}
			}
		}

	}


	protected function is_expanded( $item ) {

		$expand_classes = array( 'current-menu-item', 'current-menu-ancestor', 'current-page-ancestor' );

		return ( array_intersect( $expand_classes, (array) $item->classes ) ) ? true : false;

	}

	protected function set_context( $item, $depth, $args, $id ) {


		if ( ! empty( $this->menu_args['inContext'] ) ) { // this is a context menu

			if ( 0 === $depth ) {

				$context_classes = array( 'current-menu-ancestor', 'current-page-ancestor', 'current-menu-item' );

				$this->in_context = ( array_intersect( $context_classes, (array) $item->classes ) ) ? true : false;

			}
		} else {

			return true; // not a context menu;

		}

	}

}
