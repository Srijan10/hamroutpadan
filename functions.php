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
    wp_enqueue_style('carousel1',get_template_directory_uri().'/assets/OwlCarousel/dist/assets/owl.carousel.min.css');
    wp_enqueue_style('owlTheme',get_template_directory_uri().'/assets/OwlCarousel/dist/assets/owl.theme.default.min.css');
    wp_enqueue_style('cssfile',get_template_directory_uri().'/assets/css/cssfile.css');
    wp_enqueue_style('fontawesome',get_template_directory_uri().'/assets/css/font-awesome/css/font-awesome.min.css');
    wp_enqueue_script('hamro_jsfile',get_template_directory_uri().'/assets/js/hamro_jsfile.js', array(), '1.0.0', true);
	wp_enqueue_script('bootstrap_js',get_template_directory_uri().'/assets/bootstrap/js/bootstrap.min.js', array(), '1.0.0', true);
	wp_enqueue_script('bootstrap_bundle_js',get_template_directory_uri().'/assets/bootstrap/js/bootstrap.bundle.min.js', array(), '1.0.0', true);
    wp_enqueue_script('hamro_script',get_template_directory_uri().'/assets/js/hamro_script.js', array(), '1.0.0', true);
    wp_enqueue_script('OwlCarousel_JS',get_template_directory_uri().'/assets/OwlCarousel/dist/owl.carousel.min.js',array(),'1.0.0',true);
    wp_enqueue_script('hamroJquery','https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js');
}
add_action('wp_enqueue_scripts','hamroutpadan_theme_scripts');



// Register Custom Post Type slider
require get_template_directory().'/inc/sliderfunction.php';

require get_template_directory().'/inc/hamro_itemfunction.php';

require get_template_directory().'/inc/hamro_order.php';

require get_template_directory().'/inc/hamro_role.php';


function valid_utpadan_user(){
  $cid = wp_get_current_user()->ID;
    if($cid>0){
      return true;
    }
    return false;
}




// function form_capture(){
   
//   if(isset($_POST['btn_submit']))
//   {
//   echo "form captured";
//   print_r($_POST);
//   }
// }

// add_action('wp_head','form_capture');
