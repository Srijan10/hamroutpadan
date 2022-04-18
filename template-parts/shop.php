<?php

/* Template Name: shop*/

get_header();

$items = item();
// $ccat = category_item(12);
// print_r($ccat);
if(isset($_GET['order'])){
    $items = item('','',$_GET['order']);
}
$sort = isset($_GET['sort'])?trim($_GET['sort']):"";
$db_results = shop_item();
if($_GET['cat']){
    $db_results = category_item($_GET['cat']);
}
if($sort){
    $db_results = sort_product_price($db_results,$sort);
}
?>
        <div class="shop_container">
            <div class="shopleft_container">
                <?php
                    include_once(get_template_directory().'/features/hamro_category.php');
                ?>
            </div>
            <div class="shopright_container">
                <div class="shopheading">
                    <div class="shopheader">
                        SHOP / <?php echo count($items); ?> items found
                    </div>
                    <div class="shopfilters">
                        sort by
                        <a href="http://localhost/hamroutpadan/shop/?sort=asec<?php if($_GET['cat']){echo "&cat=".$_GET['cat'];} ?>">low to high</a>
                        <a href="http://localhost/hamroutpadan/shop/?sort=desc<?php if($_GET['cat']){echo "&cat=".$_GET['cat'];} ?>">high to low</a>
                    </div>
                </div>
                <?php 
                foreach($db_results as $index=>$item){
                    display_shop_item($item['id']);
                    } 
                    ?>
            </div>
        </div>
<?php

get_footer();
?>