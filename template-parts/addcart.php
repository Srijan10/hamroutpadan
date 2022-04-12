<?php 
/* Template Name: addtocart */
get_header();

if(isset($_GET)){
    $action = $_GET['action'];
    if($action){
        if($action=="remove_single_bucket"){
            if(isset($_POST)){
                remove_single_bucket($_POST['iid']);
            }
        }
        if($action=="add_single_bucket"){
            if(isset($_POST)){
                add_single_bucket($_POST['iid']);
            }
        }
        if($action="update_quantity_bucket"){  
            echo "action_update";
            if(isset($_POST)){
                if($_POST['qty']){
                    update_quantity_bucket($_POST['iid'],$_POST['qty']);
                }
            }
        }
        if($action="remove_bucket"){
            remove_bucket($_GET['iid']);
        }
        if($action="insert_bucket"){
            if(isset($_POST)){
                if($_POST['iid']&&$_POST['quantity']){
                    $db_resuly = insert_bucket($_POST['iid'],$_POST['quantity']);
                }
            }
        }
    }
}
$bucket = get_bucket();
$item = item();
include_once("new.php");
?>


<?php 
get_footer();
?>