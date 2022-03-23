<?php
/***
 * this is hamro utpadan index page
 */

get_header();
?>
<!-- Set up your HTML -->
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
<div class="container">
    <div class="item">
        <div class="row">
        <div class="col-sm-3 category_col">
            <div class="category">
                <li><ul class="categoryHeader">Category</ul></li>
                <li>
                    <ul><a href="#"><i class="fa fa-mobile"></i>Electronic</a></ul>
                    <ul><a href="#"><i class="fa fa-child"></i>Clothing</a></ul>
                    <ul><a href="#"><i class="fa fa-lemon-o"></i>Fooding</a></ul>
                    <ul><a href="#"><i class="fa fa-shopping-basket"></i>Dairy Products</a></ul>
                    <ul><a href="#"><i class="fa fa-cube"></i>Furniture</a></ul>
                </li>
            </div>
        </div>
        <div class="col-sm-9 category_col">
            <div class="product_body">
                <div class="body_card card1">
                    <div class="card_description">
                        <div class="product_image"><img src="<?php echo get_template_directory_uri(); ?>/assets/media/img/product/p1.jpg" alt=""></div>
                        <div class="productName">Violet Tshirt</div>
                        <div class="productPrice">
                            <div class="price">
                                Rs 300</div>
                            <button class="button"> Add to cart <i class="fa fa-shopping-cart" style="font-size:24px; color:white"></i></button>
                        </div>
                    </div>
                </div>
                <div class="body_card card2">
                    <div class="card_description">
                        <div class="product_image"><img src="<?php echo get_template_directory_uri(); ?>/assets/media/img/product/p2.jpg" alt=""></div>
                        <div class="productName">Violet Tshirt</div>
                        <div class="productPrice">
                            <div class="price">
                                Rs 300</div>
                            <button class="button"> Add to cart <i class="fa fa-shopping-cart" style="font-size:24px; color:white"></i></button>
                        </div>
                    </div>
                </div>
                <div class="body_card card3">
                    <div class="card_description">
                        <div class="product_image"><img src="<?php echo get_template_directory_uri(); ?>/assets/media/img/product/p3.jpg" alt=""></div>
                        <div class="productName">Violet Tshirt</div>
                        <div class="productPrice">
                            <div class="price">
                                Rs 300</div>
                            <button class="button"> Add to cart <i class="fa fa-shopping-cart" style="font-size:24px; color:white"></i></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </div>
    <div class="imagebox">
    <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/media/img/productimage/category-3.jpg" />
                            <a class="category-name" href="">
                                <p>Some text goes here that describes the image</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-250">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/media/img/productimage/category-4.jpg" />
                            <a class="category-name" href="">
                                <p>Some text goes here that describes the image</p>
                            </a>
                        </div>
                        <div class="category-item ch-150">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/media/img/productimage/category-5.jpg" />
                            <a class="category-name" href="">
                                <p>Some text goes here that describes the image</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-150">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/media/img/productimage/category-6.jpg" />
                            <a class="category-name" href="">
                                <p>Some text goes here that describes the image</p>
                            </a>
                        </div>
                        <div class="category-item ch-250">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/media/img/productimage/category-7.jpg" />
                            <a class="category-name" href="">
                                <p>Some text goes here that describes the image</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/media/img/productimage/category-8.jpg" />
                            <a class="category-name" href="">
                                <p>Some text goes here that describes the image</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="item_carousel">
        <div class="item_corousel_header">
            Category
        </div>
    <div class="custom1 owl-carousel owl-theme">
            <div class="body_card card1">
                <div class="card_description">
                    <div class="product_image"><img src="<?php echo get_template_directory_uri(); ?>/assets/media/img/product/model1.jpg" alt=""></div>
                    <div class="productName">Violet Tshirt</div>
                    <div class="productPrice">
                        <div class="price">
                            Rs 300</div>
                        <button class="button"> Add to cart <i class="fa fa-shopping-cart" style="font-size:24px; color:white"></i></button>
                    </div>
                </div>
            </div><div class="body_card card1">
                <div class="card_description">
                    <div class="product_image"><img src="<?php echo get_template_directory_uri(); ?>/assets/media/img/product/model2.jpg" alt=""></div>
                    <div class="productName">Violet Tshirt</div>
                    <div class="productPrice">
                        <div class="price">
                            Rs 300</div>
                        <button class="button"> Add to cart <i class="fa fa-shopping-cart" style="font-size:24px; color:white"></i></button>
                    </div>
                </div>
            </div><div class="body_card card1">
                <div class="card_description">
                    <div class="product_image"><img src="<?php echo get_template_directory_uri(); ?>/assets/media/img/product/model3.jpg" alt=""></div>
                    <div class="productName">Violet Tshirt</div>
                    <div class="productPrice">
                        <div class="price">
                            Rs 300</div>
                        <button class="button"> Add to cart <i class="fa fa-shopping-cart" style="font-size:24px; color:white"></i></button>
                    </div>
                </div>
            </div><div class="body_card card1">
                <div class="card_description">
                    <div class="product_image"><img src="<?php echo get_template_directory_uri(); ?>/assets/media/img/product/model4.jpg" alt=""></div>
                    <div class="productName">Violet Tshirt</div>
                    <div class="productPrice">
                        <div class="price">
                            Rs 300</div>
                        <button class="button"> Add to cart <i class="fa fa-shopping-cart" style="font-size:24px; color:white"></i></button>
                    </div>
                </div>
            </div><div class="body_card card1">
                <div class="card_description">
                    <div class="product_image"><img src="<?php echo get_template_directory_uri(); ?>/assets/media/img/product/model5.jpg" alt=""></div>
                    <div class="productName">Violet Tshirt</div>
                    <div class="productPrice">
                        <div class="price">
                            Rs 300</div>
                        <button class="button"> Add to cart <i class="fa fa-shopping-cart" style="font-size:24px; color:white"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
    </style>
    <div class="shopNow">
        <div class="two_items">
            <div class="two_items_products">
               <div class="apple"> <div class="product_image"><img src="<?php echo get_template_directory_uri(); ?>/assets/media/img/product/k3.jpg" alt=""></div>
                    <div class="productName">Violet Tshirt</div>
                    <div class="productPrice">
                        <div class="price">
                            Rs 300</div>
                        <button class="button"> Add to cart <i class="fa fa-shopping-cart" style="font-size:24px; color:white"></i></button>
                    </div></div>
                    <div class="apple"> <div class="product_image"><img src="<?php echo get_template_directory_uri(); ?>/assets/media/img/product/k4.jpg" alt=""></div>
                    <div class="productName">Violet Tshirt</div>
                    <div class="productPrice">
                        <div class="price">
                            Rs 300</div>
                        <button class="button"> Add to cart <i class="fa fa-shopping-cart" style="font-size:24px; color:white"></i></button>
                    </div></div>
            </div>
            <div class="two_items_sideImage">
                <div class="slidersimage owl-carousel owl-theme">
                    <div class="slider_image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/pages/img/index-sliders/slide1.jpg" alt="canon">
                    </div><div class="slider_image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/pages/img/index-sliders/slide2.jpg" alt="canon">
                    </div><div class="slider_image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/pages/img/index-sliders/slide3.jpg" alt="canon">
                    </div>
                </div>
            </div>
        
        </div>
 
    </div>
    <div class="brands1 owl-carousel owl-theme">
        <div class="brands"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/pages/img/brands/canon.jpg" alt="canon" srcset=""></a></div>
        <div class="brands"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/pages/img/brands/esprit.jpg" alt="canon" srcset=""></a></div>
        <div class="brands"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/pages/img/brands/gap.jpg" alt="canon" srcset=""></a></div>
        <div class="brands"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/pages/img/brands/next.jpg" alt="canon" srcset=""></a></div>
        <div class="brands"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/pages/img/brands/puma.jpg" alt="canon" srcset=""></a></div>
    </div>
</div>   
       
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
</div>


</div>
<?php
get_footer();
?>