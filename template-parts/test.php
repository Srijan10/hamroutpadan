<?php

/* Template Name: testPage*/
get_header();
// if(insert_bucket(10,10)){
//     echo "item successfully added";
// }

// $cartcart =get_bucket(1);
// print_r($cartcart);
// if(remove_bucket(18)){
//     echo "remobie";
// }else{
//     echo "appl";
// }
// remove_single_bucket(9);function insertItem($category_id='',$name,$price,$qty,$image,$decription,$status='1'){
// insertItem("books",32,2);

// print_r(item(9));

// if(!get_bucket(130)){
//     echo "found";
// }else{
//     echo "not found";
// }
// add_single_bucket(10,4);

if(valid_utpadan_user()){
    echo "valide";
}else{
    echo "invalid";
}
?>

<?php
get_footer();
?>