<?php
/*=======================================================
*    Register Custom Taxonomy
* =======================================================*/
/**
 * Portfolio Cat
 */
if ( ! function_exists('rbt_portfolio_taxonomy') ) {
	function rbt_portfolio_taxonomy() {
		/**
		 * Events
		 */
		$labels = array(
			'name'                       => esc_html_x( 'Portfolio Categories', 'Taxonomy General Name', 'trydo' ),
			'singular_name'              => esc_html_x( 'Portfolio Categories', 'Taxonomy Singular Name', 'trydo' ),
			'menu_name'                  => esc_html__( 'Portfolio Categories', 'trydo' ),
			'all_items'                  => esc_html__( 'All Portfolio Category', 'trydo' ),
			'parent_item'                => esc_html__( 'Parent Item', 'trydo' ),
			'parent_item_colon'          => esc_html__( 'Parent Item:', 'trydo' ),
			'new_item_name'              => esc_html__( 'New Portfolio Category Name', 'trydo' ),
			'add_new_item'               => esc_html__( 'Add New Portfolio Category', 'trydo' ),
			'edit_item'                  => esc_html__( 'Edit Portfolio Category', 'trydo' ),
			'update_item'                => esc_html__( 'Update Portfolio Category', 'trydo' ),
			'view_item'                  => esc_html__( 'View Portfolio Category', 'trydo' ),
			'separate_items_with_commas' => esc_html__( 'Separate items with commas', 'trydo' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove items', 'trydo' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'trydo' ),
			'popular_items'              => esc_html__( 'Popular Portfolio Category', 'trydo' ),
			'search_items'               => esc_html__( 'Search Portfolio Category', 'trydo' ),
			'not_found'                  => esc_html__( 'Not Found', 'trydo' ),
			'no_terms'                   => esc_html__( 'No Portfolio Category', 'trydo' ),
			'items_list'                 => esc_html__( 'Portfolio Category list', 'trydo' ),
			'items_list_navigation'      => esc_html__( 'Portfolio Category list navigation', 'trydo' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'portfolio-cat', array( 'portfolio' ), $args );

	}
	add_action( 'init', 'rbt_portfolio_taxonomy', 0 );
}