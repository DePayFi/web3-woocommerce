<?php
/**
 * Lifestyle Store: Block Patterns
 *
 * @since Lifestyle Store 1.0
 */

/**
 * Registers block patterns and categories.
 *
 * @since Lifestyle Store 1.0
 *
 * @return void
 */
function lifestyle_store_register_block_patterns() {
	$block_pattern_categories = array(
		'lifestyle-store'    => array( 'label' => __( 'Lifestyle Store', 'lifestyle-store' ) ),
	);

	$block_pattern_categories = apply_filters( 'lifestyle_store_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}
}
add_action( 'init', 'lifestyle_store_register_block_patterns', 9 );
