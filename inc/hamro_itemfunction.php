<?php

//crude operation of items


function item($id='',$mid='',$order=''){
    global $wpdb;
    $db_results = $wpdb->get_results(
        $wpdb->prepare(
            "select * from wp_item",''
        ),ARRAY_A
    );
    if($id){
        $db_results = $wpdb->get_row(
            $wpdb->prepare(
                "select * from wp_item where id=$id",''
            ),ARRAY_A
        );
    }
    if($mid){
        $db_results = $wpdb->get_results(
            $wpdb->prepare(
                "select * from wp_item where mid=$mid",''
            ),ARRAY_A
        );
    }if($order){
        if($order=="asc"){
            $db_results = $wpdb->get_results(
                $wpdb->prepare(
                    "select * from wp_item ORDER BY price",''
                ),ARRAY_A
            );
        }if($order=="desc"){
            $db_results = $wpdb->get_results(
                $wpdb->prepare(
                    "select * from wp_item ORDER BY price DESC",''
                ),ARRAY_A
            );
        }
    }
    return $db_results;
}


function insertItem($name,$price,$qty,$image='',$description='',$status='1'){
    global $wpdb;
    $cid = wp_get_current_user()->ID;
    if(is_merchant($cid)){
        $item_table = $wpdb->prefix . 'item';
        if($name&&$price&&$qty){
            if($image){
                $error = save_Image($image);
                if($qty==0){
                    $status = '0';
                }
                    if(count($error)==0){
                        $wpdb->insert($item_table, array(
                            'name' => $name,
                            'price' => $price,
                            'qty' => $qty,
                            'image' => $image['name'],
                            'description' => $description,
                            'status' => $status,
                            'mid'=> $cid
                        ));
                            if($wpdb->insert_id>0){
                                echo "inserted succesful";
                                return true;
                            }else{
                                return false; 
                            }
                }return false;
            }return false;
        }return false;
    }else{
        echo "invalid user. login as merchant";
        return false;
    }
   
}
function updateItem($iid,$mid,$preImage,$name,$price,$qty,$image='',$description='',$status='1'){
   
    global $wpdb;
    
    $cid = wp_get_current_user()->ID;
    if(is_merchant($cid)){
        $item_table = $wpdb->prefix . 'item';
        if($name&&$price&&$qty){
            if($image['error']==0){
                echo "apple";
                $error = save_Image($image);
                $preImage = $image['name'];
            }
            $updated = $wpdb->update("$item_table",array(
                "name" => $name,
                "price" => $price,
                "qty" => $qty,
                "image" => $preImage,
                "description" => $description,
                "status" => $status),
            array("id" => $iid));
            if(false === $updated){
                echo "error in update";
            }

        }    
    }else{
        echo "invalid user. login as merchant";
        return false;
    }
}



function merchantItem_remove($mid,$iid){
    $error = array();
    $cid = wp_get_current_user()->ID;
    if(is_merchant($cid)){
        if($cid==$mid){
            $cid = item($iid)['mid'];
            if($cid){
                if($cid!=$mid){
                    $error['not_your_product']="this product doesnt belong to you";
                }
            }else{
                $error['no product']="product doesnt exist";
            }
        }else{
            $error['invalid_user']="your cannot delete this product";
        }
        if(count($error)>0){
            print($error);
            return false;
        }else{
            removeItem($iid);
            echo "your product is removed";
            return true;
        }
    }else{
        echo "invalid user. login as merchant";
        return false;
    }
}
function removeItem($iid){
    global $wpdb;
    $item_table = $wpdb->prefix . 'item';
    return $wpdb->delete("$item_table",
    array("id" => $iid
    ));
}



//save image

function save_Image($image){
    $error = array();
    define("MEDIA_DIR_PATH",get_template_directory());
    $target_dir= MEDIA_DIR_PATH.'/assets/media/img/product/';
    $target_file = $target_dir.basename($image["name"]);
    $imagename=basename($image["name"]);
    $uploadOK = 1 ;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($image["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
          } else {
            $error['filenotimage']="file not image";
            $uploadOk = 0;
          }
          
    // Check if file already exists
    if (file_exists($target_file)) {
        $error['fileexistance']="Sorry, file already exists.";
        $uploadOk = 0;
      }
      
      // Check file size
      if ($image["size"] > 500000) {
        $error['filesizeerror']="Sorry, your file is too large.";
        $uploadOk = 0;
      }
      
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
        $error['filenotallowed']="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      }
      
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        $error['filenotuploaded']="Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($image["tmp_name"], $target_file)) {
          echo " ";
        } else {
          $error['filenotuploaded']="Sorry, there was an error uploading your image.";
        }
      }
    if(count($error)>0){
        print_r($error);
  
    }
    return $error;
  }


//   shop

function category_item($cat){
    global $wpdb;
    $db_results = $wpdb->get_results(
        $wpdb->prepare(
            "select id from wp_item where category=$cat",''
        ),ARRAY_A
    );
    return $db_results;
}


function display_shop_item($id){
    $item = item($id);
    ?>
    <div class="shopcard_container">
    <div class="shopcard">
            <div class="shopcard_image"><a href="http://localhost/hamroutpadan/singleitem/?id=<?php echo $item['id']; ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/media/img/product/<?php echo $item['image'];?>" alt=""></a></div>
            <div class="shopcard_name"><a href="http://localhost/hamroutpadan/singleitem/?id=<?php echo $item['id']; ?>"><?php echo $item['name'];?></a> </div>
            <div class="shopcard_price"><a href="http://localhost/hamroutpadan/singleitem/?id=<?php echo $item['id']; ?>"><?php echo $item['price'];?> </a></div>
    </div>
</div>
<?php
}

function shop_item($id='',$mid='',$order=''){
    global $wpdb;
    $db_results = $wpdb->get_results(
        $wpdb->prepare(
            "select id from wp_item",''
        ),ARRAY_A
    );
    if($id){
        $db_results = $wpdb->get_row(
            $wpdb->prepare(
                "select id from wp_item where id=$id",''
            ),ARRAY_A
        );
    }
    if($mid){
        $db_results = $wpdb->get_results(
            $wpdb->prepare(
                "select id from wp_item where mid=$mid",''
            ),ARRAY_A
        );
    }if($order){
        if($order=="asc"){
            $db_results = $wpdb->get_results(
                $wpdb->prepare(
                    "select id from wp_item ORDER BY price",''
                ),ARRAY_A
            );
        }if($order=="desc"){
            $db_results = $wpdb->get_results(
                $wpdb->prepare(
                    "select id from wp_item ORDER BY price DESC",''
                ),ARRAY_A
            );
        }
    }
    return $db_results;
}

function sort_product_price($db_results,$sort){
    global $wpdb;
    $sortproduct = array();
    
    for($i = 0;$i<count($db_results);$i++){
        $sortproduct[$i]['price'] = item($db_results[$i]['id'])['price'];
        $sortproduct[$i]['id']=$db_results[$i]['id'];
    }
    if($sort == 'desc'){
        asort($sortproduct);
    }elseif($sort=='asec'){
        arsort($sortproduct);
    }
    $i=0;
    foreach($sortproduct as $x){
        $db_results[$i]['id']=$x['id'];
        $i++;
    }
    return $db_results;
}