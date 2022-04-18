<?php
$db_results = item();

?>
<div class="container">
    <div class="item">
        <div class="row">
        <div class="col-sm-3 category_col">
            <?php
            include_once(get_template_directory().'/features/hamro_category.php');
            ?>
        </div>
        <div class="col-sm-9 category_col">
            <div class="product_body">
                <?php
                $i = 0;
                foreach($db_results as $index=> $item){
                    $i++;
                    if($i<4){
                    ?>      
                        <div class="body_card card<?php echo $i; ?>">
                            <div class="card_description">
                                <div class="product_image"><img src="<?php echo get_template_directory_uri(); ?>/assets/media/img/product/<?php echo $item['image'];?>" alt=""></div>
                                <div class="productName"><?php echo $item['name']; ?></div>
                                <div class="productPrice">
                                    <div class="price">
                                        Rs <?php echo $item['price'];?></div>
                                    <a href="http://localhost/hamroutpadan/singleitem/?id=<?php echo $item['id']; ?>" class="button"> Add to cart <i class="fa fa-shopping-cart" style="font-size:24px; color:white"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php
                }}
                ?>
            </div>

        </div>
        </div>
    </div>
    <?php

        $category = category();
        $x =rand(0,count($category));
        $randx = array();
        for($j=0;$j<count($category);$j++){

            $value = $x%6+1;
            $randx[$j] = $value;
            $x=$x+1;
        }
        
    ?>
    <div class="imagebox">
    <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                            <?php 
                            $count = array_pop($randx);
                            $cat1 = $category[$count-1];?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/media/img/productimage/<?php echo $cat1['image']; ?>" />
                            <a class="category-name" href="http://localhost/hamroutpadan/shop/?cat=<?php echo $cat1['id']; ?>">
                                <p><?php echo $cat1['categories']; ?></p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-250">
                            <?php 
                            $count = array_pop($randx);
                            $cat1 = $category[$count-1];?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/media/img/productimage/<?php echo $cat1['image']; ?>" />
                            <a class="category-name" href="http://localhost/hamroutpadan/shop/?cat=<?php echo $cat1['id']; ?>">
                                <p><?php echo $cat1['categories']; ?></p>
                            </a>
                        </div>
                        <div class="category-item ch-150">
                            <?php 
                            $count = array_pop($randx);
                            $cat1 = $category[$count-1];?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/media/img/productimage/<?php echo $cat1['image']; ?>" />
                            <a class="category-name" href="http://localhost/hamroutpadan/shop/?cat=<?php echo $cat1['id']; ?>">
                                <p><?php echo $cat1['categories']; ?></p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-150">
                            <?php 
                            $count = array_pop($randx);
                            $cat1 = $category[$count-1];?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/media/img/productimage/<?php echo $cat1['image']; ?>" />
                            <a class="category-name" href="http://localhost/hamroutpadan/shop/?cat=<?php echo $cat1['id']; ?>">
                                <p><?php echo $cat1['categories']; ?></p>
                            </a>
                        </div>
                        <div class="category-item ch-250">
                            <?php 
                            $count = array_pop($randx);
                            $cat1 = $category[$count-1];?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/media/img/productimage/<?php echo $cat1['image']; ?>" />
                            <a class="category-name" href="http://localhost/hamroutpadan/shop/?cat=<?php echo $cat1['id']; ?>">
                                <p><?php echo $cat1['categories']; ?></p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                            <?php 
                            $count = array_pop($randx);
                            $cat1 = $category[$count-1];?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/media/img/productimage/<?php echo $cat1['image']; ?>" />
                            <a class="category-name" href="http://localhost/hamroutpadan/shop/?cat=<?php echo $cat1['id']; ?>">
                                <p><?php echo $cat1['categories']; ?></p>
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
    <?php
                $i = 0;
                foreach($db_results as $index=> $item){
                    $i++;
                    ?>      
                        <div class="body_card card<?php echo $i; ?>">
                            <div class="card_description">
                                <div class="product_image"><img src="<?php echo get_template_directory_uri(); ?>/assets/media/img/product/<?php echo $item['image'];?>" alt=""></div>
                                <div class="productName"><?php echo $item['name']; ?></div>
                                <div class="productPrice">
                                    <div class="price">
                                        Rs <?php echo $item['price'];?></div>
                                    <a href="http://localhost/hamroutpadan/singleitem/?id=<?php echo $item['id']; ?>" class="button"> Add to cart <i class="fa fa-shopping-cart" style="font-size:24px; color:white"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php
                }
                ?>
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