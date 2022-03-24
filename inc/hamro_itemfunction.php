<?php

function item($id=''){
    echo "item fucntion ";
    global $wpdb;
    $db_results = $wpdb->get_results(
        $wpdb->prepare(
            "select * from wp_item",''
        ),ARRAY_A
    );
    return $db_results;
}