<?php 
function create_slider_cpt() {

$labels = array(
    'name' => _x( 'sliders', 'Post Type General Name', 'Slider' ),
    'singular_name' => _x( 'slider', 'Post Type Singular Name', 'Slider' ),
    'menu_name' => _x( 'sliders', 'Admin Menu text', 'Slider' ),
    'name_admin_bar' => _x( 'slider', 'Add New on Toolbar', 'Slider' ),
    'archives' => __( 'slider Archives', 'Slider' ),
    'attributes' => __( 'slider Attributes', 'Slider' ),
    'parent_item_colon' => __( 'Parent slider:', 'Slider' ),
    'all_items' => __( 'All sliders', 'Slider' ),
    'add_new_item' => __( 'Add New slider', 'Slider' ),
    'add_new' => __( 'Add New', 'Slider' ),
    'new_item' => __( 'New slider', 'Slider' ),
    'edit_item' => __( 'Edit slider', 'Slider' ),
    'update_item' => __( 'Update slider', 'Slider' ),
    'view_item' => __( 'View slider', 'Slider' ),
    'view_items' => __( 'View sliders', 'Slider' ),
    'search_items' => __( 'Search slider', 'Slider' ),
    'not_found' => __( 'Not found', 'Slider' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'Slider' ),
    'featured_image' => __( 'Featured Image', 'Slider' ),
    'set_featured_image' => __( 'Set featured image', 'Slider' ),
    'remove_featured_image' => __( 'Remove featured image', 'Slider' ),
    'use_featured_image' => __( 'Use as featured image', 'Slider' ),
    'insert_into_item' => __( 'Insert into slider', 'Slider' ),
    'uploaded_to_this_item' => __( 'Uploaded to this slider', 'Slider' ),
    'items_list' => __( 'sliders list', 'Slider' ),
    'items_list_navigation' => __( 'sliders list navigation', 'Slider' ),
    'filter_items_list' => __( 'Filter sliders list', 'Slider' ),
);
$args = array(
    'label' => __( 'slider', 'Slider' ),
    'description' => __( 'this post helps to display slider', 'Slider' ),
    'labels' => $labels,
    'menu_icon' => 'dashicons-desktop',
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'post-formats'),
    'taxonomies' => array('category'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
);
register_post_type( 'slider', $args );

}
add_action( 'init', 'create_slider_cpt', 0 );

