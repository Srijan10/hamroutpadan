<?php
/* Template Name: payment */

get_header();

if(isset($_POST)){
    if($_POST['payment_submit']){
        insert_order();
        if(!payment()){
            insert_paymentinfo($_POST);
        }else{
            update_paymentinfo($_POST);
        }
    }
}
orderhistory();
?>


<?php
get_footer();