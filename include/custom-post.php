<?php
/*=======================================================
*    Register Post type
* =======================================================*/
/**
 * Portfolio
 */
if ( ! function_exists('rbt_portfolio') ) {
	function rbt_portfolio() {
	
		$labels = array(
			'name'                  => esc_html_x( 'Portfolios', 'Post Type General Name', 'trydo' ),
			'singular_name'         => esc_html_x( 'Portfolio', 'Post Type Singular Name', 'trydo' ),
			'menu_name'             => esc_html__( 'Portfolio', 'trydo' ),
			'name_admin_bar'        => esc_html__( 'Portfolio', 'trydo' ),
			'archives'              => esc_html__( 'Item Archives', 'trydo' ),
			'parent_item_colon'     => esc_html__( 'Parent Item:', 'trydo' ),
			'all_items'             => esc_html__( 'All Items', 'trydo' ),
			'add_new_item'          => esc_html__( 'Add New Item', 'trydo' ),
			'add_new'               => esc_html__( 'Add New', 'trydo' ),
			'new_item'              => esc_html__( 'New Item', 'trydo' ),
			'edit_item'             => esc_html__( 'Edit Item', 'trydo' ),
			'update_item'           => esc_html__( 'Update Item', 'trydo' ),
			'view_item'             => esc_html__( 'View Item', 'trydo' ),
			'search_items'          => esc_html__( 'Search Item', 'trydo' ),
			'not_found'             => esc_html__( 'Not found', 'trydo' ),
			'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'trydo' ),
			'featured_image'        => esc_html__( 'Featured Image', 'trydo' ),
			'set_featured_image'    => esc_html__( 'Set featured image', 'trydo' ),
			'remove_featured_image' => esc_html__( 'Remove featured image', 'trydo' ),
			'use_featured_image'    => esc_html__( 'Use as featured image', 'trydo' ),
			'inserbt_into_item'     => esc_html__( 'Insert into item', 'trydo' ),
			'uploaded_to_this_item' => esc_html__( 'Uploaded to this item', 'trydo' ),
			'items_list'            => esc_html__( 'Items list', 'trydo' ),
			'items_list_navigation' => esc_html__( 'Items list navigation', 'trydo' ),
			'filter_items_list'     => esc_html__( 'Filter items list', 'trydo' ),
		);
		$args = array(
			'label'                 => esc_html__( 'Portfolio', 'trydo' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'   			=> 'dashicons-index-card',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'portfolio', $args );
	}
	add_action( 'init', 'rbt_portfolio', 0 );

}






