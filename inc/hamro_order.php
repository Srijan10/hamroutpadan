<?php
function order($id=''){
    echo "item fucntion ";
    global $wpdb;
    $db_results = $wpdb->get_results(
        $wpdb->prepare(
            "select * from wp_order",''
        ),ARRAY_A
    );
    return $db_results;
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
            if($item['qty']>$quantity){
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
        print_r($error);
        return false;
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
    $bucket_table = $wpdb->prefix . 'bucket';
    if(get_bucket($iid)){
        return $wpdb->delete("$bucket_table",
        array("iid" => $iid
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
    $bucket_table = $wpdb->prefix . 'bucket';
    if(item($iid)['qty']>=$qty){
        $updated = $wpdb->update($bucket_table,array(
            "quantity" => $qty ),
        array("iid" => $iid));
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
