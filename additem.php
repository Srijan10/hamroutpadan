<?php

/* Template Name: additem */
get_header();
$apple ='';

if(isset($_POST)){
    if(!empty($_POST)){
        if($_POST['action']=='edit'){
            updateItem($_POST['iid'],$_POST['mid'],$_POST['updateImage'],$_POST['item_name'],$_POST['item_price'],$_POST['item_quantity'],$_FILES['image'],$_POST['item_description'],$_POST['status']);
        }else{ 
            if(insertItem($_POST['item_name'],$_POST['item_price'],$_POST['item_quantity'],$_FILES['image'],$_POST['item_description'],$_POST['status'])){
            echo "item inserted succesfullty";
            }
        }
   }
}
if(isset($_GET)){
    if($_GET['action']=='edit'){
         $item = item($_GET['id']);
         print_r($item);
    }
}
?>
<div class="container">
    <div class="addItem">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="addItem_form">
                <?php if($_GET['action']){
                    ?>
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="iid" value="<?php echo $item['id']; ?>">
                    <input type="hidden" name="mid" value="<?php echo $item['mid']; ?>">
                    <input type="hidden" name="updateImage" value="<?php echo $item['image'];?>">
                    <?php
                    }?>
                <input type="text" name="item_name" placeholder="item_name" required value="<?php echo $item['name']; ?>">
                <input type="number" name="item_price" placeholder="item_price" required value="<?php echo $item['price']; ?>">
                <input type="number" name="item_quantity" placeholder="item_quantity" required value="<?php echo $item['qty']; ?>">
                <textarea type="text" name="item_description" placeholder="item_description" required value="<?php echo $item['description']; ?>"><?php echo $item['description']; ?></textarea>
                <input type="file" id="image" name="image" accept="image/png, image/jpeg, image/jpg" <?php if(!$_GET['action']){ echo "required";} ?> value="<?php echo $item['image']; ?>">
                <input type="radio" id="Available" name="status" value="1" <?php if($item['status']==1){echo "checked";} ?>>
                <label for="Available">Available</label>
                <input type="radio" id="Unavailable" name="status" value="0" <?php if($item['status']==0){echo "checked";} ?>>
                <label for="Unavailable">Unavailable</label><br>
                <input type="submit" name="item_submit" value="submit">
            </div>
        </form>
    </div>
</div>




    <?php
get_footer();