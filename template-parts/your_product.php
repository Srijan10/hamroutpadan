<?php

/* Template Name: your_product*/
get_header();
$db_results = item('',wp_get_current_user()->ID);
if(isset($_GET['action'])){
    $action = $_GET['action'];
    if($action == "delete"){
        merchantItem_remove($_GET['mid'],$_GET['id']);
    }
}
if($db_results){
    $i=0;
  ?>
  
<div class="table" id="your_product_showcase">
    <table>
        <tr>
            <th colspan="2">edit</th>
            <th>No</th>
            <th>category</th>
            <th>name</th>
            <th>image</th>
            <th>price</th>
            <th>quantity</th>
            <th>description</th>
            <th>status</th>
            <th>time</th>
        </tr>
        <?php foreach($db_results as $index=> $item){
            ?><tr>
            <td><a href="http://localhost/hamroutpadan/additem/?action=edit&id=<?php echo $item['id'];?>&mid=<?php echo $item['mid'];?>">Edit</a></td>
            <td><a href="http://localhost/hamroutpadan/your_product/?action=delete&id=<?php echo $item['id'];?>&mid=<?php echo $item['mid'];?>">Delete</a></td>
            <td><?php echo ++$i; ?></td>
            <td><?php echo "NA/"; ?></td>
            <td><?php echo $item['name']; ?></td>
            <td><?php echo $item['image']; ?></td>
            <td><?php echo $item['price']; ?></td>
            <td><?php echo $item['qty']; ?></td>
            <td><?php echo $item['description']; ?></td>
            <td><?php echo $item['status']; ?></td>
            <td><?php echo $item['time']; ?></td>
        </tr><?php
        } 
        ?>
    </table>
</div>
    <?php
    
}else{
    echo "you dont have any product yet.";
}
get_footer();
?>