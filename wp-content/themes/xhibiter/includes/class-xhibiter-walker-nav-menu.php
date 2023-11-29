<?php

class Xhibiter_Walker_Nav_Menu extends Walker_Nav_Menu {

	function start_lvl( &$output, $depth = 0, $args = array() ) { //ul
		$indent = str_repeat("\t", $depth);
		$submenu = ( $depth > 0 ) ? ' nav__dropdown-child-submenu' : '';
		$output .= "\n$indent<ul class=\"dropdown-menu nav__dropdown-menu$submenu depth_$depth\" >\n";
	}

	function end_lvl( &$output, $depth = 0, $args = null ) {
		$output .= "</ul>";
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ($depth) ? str_repeat("\t", $depth) : '';

		$li_attributes = '';
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = ($args->walker->has_children) ? 'nav__dropdown relative' : '';
		$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
		$classes[] = 'group menu-item-' . $item->ID;

		if( $depth && $args->walker->has_children ) {
			$classes[] = 'nav__dropdown-submenu';
		}

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
		$attributes .= ( $args->walker->has_children ) ? ' class="nav__item-dropdown" aria-expanded="false" role="button" ' : '';

		$submenu_icon = ( $depth > 0 && $args->walker->has_children ) ? '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" class="nav__item-submenu-trigger lg:block hidden fill-current">
			<path fill="none" d="M0 0h24v24H0z"></path>
			<path d="M13.172 12l-4.95-4.95 1.414-1.414L16 12l-6.364 6.364-1.414-1.414z"></path>
		</svg>' : '';
		$item_output = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters( 'nav_item_title', $item->title, $item->ID ) . $submenu_icon . $args->link_after;
		$item_output .= ( $args->walker->has_children ) ? '</a><button class="lg:hidden nav__dropdown-trigger" aria-expanded="false" role="button">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="h-4 w-4 dark:fill-white">
						<path fill="none" d="M0 0h24v24H0z"></path>
						<path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z"></path>
				</svg>
		</button>' : '</a>'; 
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

	}

}
