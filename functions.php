<?php

//this is our functions file

function register_my_menus() {
    add_theme_support('custom-logo');
  
    add_theme_support('title-tag');
  
    add_theme_support('post-thumbnails');
  
    $args = array(
      'default-image'=> get_template_directory_uri().'/assets/img/app.jpg ',
      'default-text-color' =>'000',
      'width' =>1920,
      'height' =>400,
      'flex-width'=>true,
      'flex-height'=>true,
    );
    add_theme_support('custom-header',$args);
  
    add_image_size('home-featured',1500,495,array('center','center'));
  
      register_nav_menus(
        array(
          'header-menu' => __( 'Header Menu','Slider' )
         )
       );
     }
  add_action( 'init', 'register_my_menus' );
  
function hamroutpadan_theme_scripts(){
    wp_enqueue_style('style',get_stylesheet_uri());
    wp_enqueue_style('bootstrap_css',get_template_directory_uri().'/assets/bootstrap/css/bootstrap.min.css');
    wp_enqueue_script('jquery');
    wp_enqueue_style('carousel1',get_template_directory_uri().'/assets/OwlCarousel/dist/assets/owl.carousel.min.css');
    wp_enqueue_style('owlTheme',get_template_directory_uri().'/assets/OwlCarousel/dist/assets/owl.theme.default.min.css');
    wp_enqueue_style('cssfile',get_template_directory_uri().'/assets/css/cssfile.css');
    wp_enqueue_style('fontawesome',get_template_directory_uri().'/assets/css/font-awesome/css/font-awesome.min.css');
    wp_enqueue_script('hamro_jsfile',get_template_directory_uri().'/assets/js/hamro_jsfile.js', array(), '1.0.0', true);
    wp_enqueue_script('hamro_script',get_template_directory_uri().'/assets/js/hamro_script.js', array(), '1.0.0', true);
    wp_enqueue_script('OwlCarousel_JS',get_template_directory_uri().'/assets/OwlCarousel/dist/owl.carousel.min.js',array(),'1.0.0',true);
    wp_enqueue_script('hamroJquery','https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js');
}
add_action('wp_enqueue_scripts','hamroutpadan_theme_scripts');



// Register Custom Post Type slider
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

