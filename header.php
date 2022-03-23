<?php
/****
 * this templete is used to display header
 */
?>
<!DOCTYPE html>
    <head lang="en">
    <title>
        <?php echo get_the_title();?>|
        <?php bloginfo('name')?>
    </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- font awesome -->
       
       <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
       <?php wp_head() ?>
    </head>

    <!-- bootstrap -->
<style>
    
</style>
    <body>
        <!-- header starts -->
        <div class="mainheader">
            <!-- topheader -->
           <div class="topheader">
               <div class="topheader_right">
                    HamroUtpadan, 9860111111
               </div>
               <div class="topheaderButtons">
                   <button>login/Register</button>
               </div>
           </div>
           <!-- middleheader -->
           <div class="middleheader">
            <ul>
                <li>HOME</li>
                <li>SHOP</li>
                <li>DASHBOARD</li>
             </ul>
           </div>
           <!-- bottomheader -->
           <div class="buttomheader">
               <div class="row">
                   <div class="col-sm-3"><div class="right_menu">
                    <i class="fa fa-home"></i>
                </div></div>
                   <div class="col-sm-6"> <div class="search"><input type="text" placeholder="Search.."> <i class="fa fa-search"></i></div></div>
                   <div class="col-sm-3">
                       <div class="leftbuttomheader">
                        <div class="setting"><i class="fa fa-gear"></i></div>
                        <div class="cart"><i class="fa fa-cart-plus"></i></div></div>
                       </div>
               </div>
           </div>
        </div>
        <!-- header ends -->
        <!-- body starts -->
        <div class="mainbody" id="mainbody">