<?php

/* Template Name: SingleItem*/

get_header();

$item = item();
print_r($item);
?>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <div class="singleproduct">
                <div class="singleproductcart">
                    <div class="productImage">
                        <img src="assets/media/img/product/k1.jpg" alt="">
                        <div class="owl-carousel owl-theme">
                            <div class="productimage"><a href="#"><img src="assets/pages/img/brands/canon.jpg" alt="canon" srcset=""></a></div>
                            <div class="productimage"><a href="#"><img src="assets/pages/img/brands/esprit.jpg" alt="canon" srcset=""></a></div>
                            <div class="productimage"><a href="#"><img src="assets/pages/img/brands/gap.jpg" alt="canon" srcset=""></a></div>
                            <div class="productimage"><a href="#"><img src="assets/pages/img/brands/next.jpg" alt="canon" srcset=""></a></div>
                            <div class="productimage"><a href="#"><img src="assets/pages/img/brands/puma.jpg" alt="canon" srcset=""></a></div>
                        </div>
                    </div>
                    <div class="productdetails">
                        <div class="productname"><h3>Product Name</h3></div>
                        <div class="productprice">Price : Rs500</div>
                        <div class="productQuantity">
                            Quantity : 
                            <button id="minus">-</button>
                            <input type="number" value="1" id="quantity" name="quantity"/>
                            <button id="plus">+</button></div>
                        <div class="productSubmit">
                            <button class="add-to-cart" id="add_to_cart">Add to cart</button>
                            <button class="Buy-Now" id="buy_now">Buy Now</button>

                        </div>
                    </div>
                </div>
            </div>
            
            <nav class="nav nav-pills nav-fill">
                <a class="nav-link" aria-current="page" href="#nav_content1" onclick="showcontentNav('nav_content1')" id="nav_content1_link">Specification</a>
                <a class="nav-link" href="#nav_content2" onclick="showcontentNav('nav_content2')" id="nav_content2_link">Description</a>
                <a class="nav-link" href="#nav_content3"onclick="showcontentNav('nav_content3')" id="nav_content3_link">Link</a>
              </nav>
              <div class="nav-content">
                <div class="nav_content active" id="nav_content1">
                    Apple Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </div>
                <div class="nav_content" id="nav_content2">
                    Banana Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </div>
                <div class="nav_content" id="nav_content3">
                    Cat Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </div>
              </div>
        </div>
        <div class="col-sm-4">
            <?php
                include_once(get_template_directory().'/features/hamro_category.php');
            ?>
        </div>
    </div>

</div>

<?php
get_footer();
?>