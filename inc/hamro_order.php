<?php

//order functionality
function order($cid=''){
    global $wpdb;
    $db_results = $wpdb->get_results(
        $wpdb->prepare(
            "select * from wp_order",''
        ),ARRAY_A
    );
    if($cid){
        $db_results = $wpdb->get_results(
            $wpdb->prepare(
                "select * from wp_order where cid=$cid",''
            ),ARRAY_A
        );
    }
    return $db_results;
}
function insert_order(){
    $track=generateRandomString(6);
    $buckets = get_bucket();
    if($buckets){
        foreach($buckets as $index=>$bucket){
            global $wpdb;
            $wpdb->insert("wp_order",array(
                "cid"=>$bucket['cid'],
                "iid"=>$bucket['iid'],
                "quantity"=>$bucket['quantity'],
                "date"=> $bucket['date'],
                "status"=> '1',
                "track"=> $track.$bucket['iid'],
                "phase"=> '0',
                "bid"=>$bucket['id']
            ));
            if($wpdb->insert_id>0){
                remove_bucket($bucket['iid']);
                ?>
                <script>
                    alert("thanks for ordering. You can track your order in order History");
                </script>
                <?php
            }
        }
    }
    else{
        echo "you dont have any items in your bucket.";
    }
}


function payment(){
    global $wpdb;
    $cid = wp_get_current_user()->ID;
    $db_results = $wpdb->get_row(
        $wpdb->prepare(
            "select * from users_payment where uid=$cid",''
        ),ARRAY_A
    );
    return $db_results;
}

function insert_paymentinfo($payment){
    global $wpdb;
    $cid = wp_get_current_user()->ID;
    $wpdb->insert("users_payment",array(
        "payment_method"=>$payment['payment_method'],
        "district"=>$payment['district'],
        "street_address"=>$payment['street_address'],
        "appartment_address"=>$payment['appartment_address'],
        "mobile"=>$payment['phone'],
        "uid"=>$cid
    ));
    if($wpdb->insert_id>0){
        return true;
    }
    else{
        return false;
    }
}

function update_paymentinfo($payment){
    global $wpdb;
    $cid = wp_get_current_user()->ID;
    if(payment()){ 
        $preepayment = payment();
        $updated = $wpdb->update("users_payment",array(
            "payment_method"=>$payment['payment_method'],
            "district"=>$payment['district'],
            "street_address"=>$payment['street_address'],
            "appartment_address"=>$payment['appartment_address'],
            "mobile"=>$payment['phone'],
            "uid"=>$cid),
        array("id" => $preepayment['id']));
        if ( false === $updated ) {
            echo "There was an error while updating.";
        }
    }
   
}
//cart functionalities

function insert_bucket($iid,$quantity){
    global $wpdb;
    $error = array();
    $bucket_table = $wpdb->prefix . 'bucket';
    $cid = wp_get_current_user()->ID;
    if($cid>0){
        if(item($iid)){
            $item = item($iid);
            echo $item['qty'];
            echo $quantity;
            if($item['qty']>=$quantity){
                if(!get_bucket($iid)){
                    $wpdb->insert("$bucket_table",array(
                        "cid"=>$cid,
                        "iid"=>$iid,
                        "quantity"=>$quantity
                    ));
                    if($wpdb->insert_id>0){
                        return true;
                    }else{
                        $error['insertion_error'] = "there is error in insertion";
                    }
                }
                else{
                    $error['multiple_item'] = "item already in cart";
                }
            } else{
                $error['excess_quantity'] =  "not enough quantity";
            }
        }else{
            $error['item_not_found'] =  "item doesnt exist";
        }
    }else{
        $error['invalid_user']="Please login to addcart";
    }
    
    if(count($error)>0){
        return $error;
    }
}

function get_bucket($iid=''){
    global $wpdb;
    $bucket_table = $wpdb->prefix . 'bucket';
    $cid = wp_get_current_user()->ID;
    if($cid>0){
        $db_results = $wpdb->get_results(
            $wpdb->prepare(
                "select * from $bucket_table where cid = $cid",''
            ),ARRAY_A
        );
        if($iid){
            $db_results = $wpdb->get_row(
                $wpdb->prepare(
                    "select * from $bucket_table where cid = $cid and iid=$iid",''
                ),ARRAY_A
            );
        }
        return $db_results;
    }
}

function remove_bucket($iid){
    global $wpdb;
    $error = array();
    $bucket = get_bucket($iid);
    $bucket_table = $wpdb->prefix . 'bucket';
    if(get_bucket($iid)){
        return $wpdb->delete("$bucket_table",
        array("id" => $bucket['id']
        ));
    }else{
        $error['item_not_found'] = "no item in carts";
    }
    if(count($error)>0){
        print_r($error);
        return false;
    }
}
function add_single_bucket($iid,$qty=1){
    global $wpdb;
    $error = array();
    $bucket_table = $wpdb->prefix . 'bucket';
    if(!get_bucket($iid)){
        insert_bucket($iid,$qty);
    }
    else{
        update_quantity_bucket($iid,get_bucket($iid)['quantity']+$qty);
    }
}
function update_quantity_bucket($iid,$qty){
    global $wpdb;
    $error = array();
    $bucket = get_bucket($iid);
    $bucket_table = $wpdb->prefix . 'bucket';
    if(item($iid)['qty']>=$qty){
        $updated = $wpdb->update($bucket_table,array(
            "quantity" => $qty ),
        array("id" => $bucket['id']));
        if ( false === $updated ) {
            $error['error_in_update'] = "There was an error while updating.";
        }
    }
    else{
        $error['excess_quantity'] = "excess quantity";
    }
    if(count($error)>0){
        print_r($error);
        return false;
    }
}
function remove_single_bucket($iid,$qty=1){
    global $wpdb;
    $error = array();
    $bucket_table = $wpdb->prefix . 'bucket';
    if(get_bucket($iid)){
        $item = get_bucket($iid);
        if($qty>$item['quantity']){
            $error['excess_quantity_deletion'] = "Deleted Quantity is more then in the cart.";
        }
        if($qty==$item['quantity']){
            remove_bucket($iid);
        }
        if($qty<$item['quantity']){
            update_quantity_bucket($iid,$item['quantity']-$qty);
        }
    }else{
        $error['item_not_found'] = "no item in carts";
    }
    if(count($error)>0){
        print_r($error);
        return false;
    }
}



function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }


  function orderhistory(){
      global $wpdb;
      $cid = wp_get_current_user()->ID;
      $orders = order($cid);
      $i=0;
      ?>
      <style>
          .orderimage {
    height: 150px;
    width: 200px;
    overflow: hidden;
    padding: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    align-content: center;
}.ordercontainer tr th {
    padding: 10px;
}
      </style>
      
      <div class="container ordercontainer">
      <table>
          <tr>
              <th>sn</th>
              <th>item_name</th>
              <th>item_Image</th>
              <th>item_Quantity</th>
              <th>Order Track No.</th>
              <th>Date</th>
              <th>Phase</th>
              <th>Discart the order</th>
          </tr>
            <?php
            foreach($orders as $index=>$order){
                $item = item($order['iid']);
                ?>
                <tr>
                    <td><?php echo ++$i;?></td>
                    <td><?php echo $item['name']; ?></td>
                    <td><div class="orderimage">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/media/img/product/<?php echo $item['image']; ?>" alt="">
                        
                    </div>
                        </td>
                    <td><?php echo $order['quantity']; ?></td>
                    <td><?php echo $order['track']; ?></td>
                    <td><?php echo $order['date']; ?></td>
                    <td><?php echo $order['phase'];?></td>
                    <td><?php echo "discart";?></td>
                </tr><?php
            }
            ?>
      </table>

      </div>
      
      <?php
  }