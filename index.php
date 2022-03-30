<?php
/***
 * this is hamro utpadan index page
 */

get_header();

//slider

// print_r(wp_get_current_user()->roles);
// $author_obj = get_user_by('id',3);
// print_r($author_obj);
// echo $author_obj->roles[0];
// print_r(wp_get_current_user());
$id = 2;
if(is_merchant($id)){
    include_once('merchant/merchant-index.php');
}elseif(is_customer($id)){
    include_once('features/slider.php');
    include_once('customer/customer_index.php');
}
// $item = item();
// print_r($item);

?>
<!-- Set up your HTML -->

<!--        
<div class="container">
<div class="row">
    <div class="post_container col-sm-8">
    <?php 
    $args = array(
        'post_type'=> 'slider'
    );
    $slider_post = new WP_QUERY($args);
        if ( $slider_post->have_posts() ) : 
            while ( $slider_post->have_posts() ) : $slider_post->the_post(); ?>
                <article class="home-post">
                    <div class="post-header">
                        
                    <h1><?php the_title()?></h1>
                        <div class="home-featured row ml-0 mr-0">
                            <a href="<?php the_permalink() ?>">
                            <?php the_post_thumbnail('home-featured')?></a>
                        </div>
                    </div>
                    <div class="post-description">
                        <?php the_excerpt() ?>
                    </div>
                    <div class="post-footer">
                        <div class="post-meta">
                            <strong>Author:</strong><?php the_author(); ?>
                        </div>
                        <div class="post-meta">
                            <strong>Posted on:</strong><?php the_time(); ?>
                        </div>
                    </div>
                </article>
                <?php
            endwhile; 
        endif; 
    

        ?>
        <div class="pagination row ml-0 mr-0">

        <?php echo paginate_links(); ?>
        </div>
    </div>
    <div class="sidebar col-sm-4">
    </div>
</div> -->


</div>
<?php
get_footer();
?>