<?php 
    $args = array(
        'post_type'=> 'slider'
    );
    $slider_post = new WP_QUERY($args);
        if ( $slider_post->have_posts() ) : 
            while ( $slider_post->have_posts() ) : $slider_post->the_post(); ?>
              <?php
            endwhile; 
        endif; 
    

        ?>
	 <div class="sideImage">
                <div class="slidersimage owl-carousel owl-theme">
                    <?php
                if ( $slider_post->have_posts() ) : 
            while ( $slider_post->have_posts() ) : $slider_post->the_post(); ?>
            <div class="slider_image">
            <?php the_post_thumbnail('home-featured')?>
                       
                    </div>
              <?php
            endwhile; 
        endif; ?>
                </div>
            </div>