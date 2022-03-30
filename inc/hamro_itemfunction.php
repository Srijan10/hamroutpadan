<?php

//crude operation of items

function item($id=''){
    echo "item fucntion ";
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
    return $db_results;
}


function insertItem($name,$price,$qty,$image='',$description='',$status='1'){
    global $wpdb;
    $cid = wp_get_current_user()->ID;
    $item_table = $wpdb->prefix . 'item';
    if($name&&$price&&$qty){

        if($qty==0){
            $status = '0';
        }
        $wpdb->insert($item_table, array(
            'name' => $name,
            'price' => $price,
            'qty' => $qty,
            'image' => $image,
            'description' => $description,
            'status' => $status,
            'mid'=> $cid
        ));
            if($wpdb->insert_id>0){
                echo "inserted succesful";
            }
    }
       
}



function removeItem($iid){
    global $wpdb;
    $item_table = $wpdb->prefix . 'item';
    return $wpdb->delete("$item_table",
    array("id" => $iid
    ));
}

// function updateItem()