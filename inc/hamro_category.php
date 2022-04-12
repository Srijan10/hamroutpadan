<?php   

function category_development(){
    add_menu_page("Category Option","Category Option","manage_options","wp-category-Option","category_wp_call");
    add_submenu_page("wp-category-Option","Add Category","Add Category","manage_options","wp-Category-Option","add_category");

}


add_action("admin_menu","category_development");

function category($id = ''){
    global $wpdb;
    if(!empty($id)){
      $db_category = $wpdb->get_row(
        $wpdb->prepare(
            "SELECT * FROM wp_category WHERE id = $id AND status = '1'",''
        ),ARRAY_A
    );
    
    }
    else{
        $db_category = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM wp_category WHERE status = '1'",''
            ),ARRAY_A
        );
    }
    return $db_category;
}



function category_wp_call(){

    if($_GET){
        if($_GET['action']=="delete"){
            if($_GET['id']){
                echo "your item is deleted";
                global $wpdb;
                $wpdb->delete("wp_category",
                array("id" => $_GET['id']
                ));
            }
        }
        if($_GET['msg']&&($_GET['action']=='edit')){
            echo "Category updated Successully";
        }if($_GET['msg']&&($_GET['action']=='insert')){
            echo "Category Added Successully";
        }
    }

    $db_category = category();
    wp_head();
    $i = 0;
    ?>
    <div class="container">
        <div class="category_table">
            <table>
                <tr>
                    <th>Sn</th>
                    <th>Category_name</th>
                    <th>status</th>
                    <th>image</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
                
                <?php foreach($db_category as $index =>$category){
                    $i++;
                        ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $category['categories']; ?></td>
                    <td><?php echo $category['status']; ?></td>
                    <td><?php echo $category['image'];?></td>
                    <td><a href="http://localhost/hamroutpadan/wp-admin/admin.php?page=wp-Category-Option&action=edit&id=<?php echo $category['id']; ?>">edit</a></td>
                    <td><a href="http://localhost/hamroutpadan/wp-admin/admin.php?page=wp-category-Option&id=<?php echo $category['id']; ?>&action=delete">delete</a></td>
                </tr>
                <?php
                    }
                    ?>
            </table>
        </div>
    </div>
    <?php
} 



function add_category(){

    if($_GET){
        $id =$_GET['id'];
        global $wpdb;
        $db_category = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT * FROM wp_category WHERE id = $id",''
            ),ARRAY_A
        );
    }
    if($_POST){
        global $wpdb;
        $error = array();
        if($_POST['action']){
            if($_FILES['error']===0){
                $image= $_FILES['image'];
                $error = save_Image($image);
                $_POST['oldImageName']=$_FILES['image']['name'];
            }
            if(count($error)==0){
            $updated = $wpdb->update('wp_category',array(
                'categories' => $_POST['category'],
                'status' => $_POST['status'],
                "image" => $_POST['oldImageName'],
                'icon' => $_POST['icon']),
            array("id" => $_POST['id']));
            }if(false===$updated){
                echo "error in uploading";
            }
            else{?>
                <script>
                location.href="<?php echo site_url() ?>/wp-admin/admin.php?page=wp-category-Option&msg=suc&action=edit";
              </script><?php
            }
        }
        else{
            $image= $_FILES['image'];
            $error = save_Image($image);
            if(count($error)==0){
                $wpdb->insert('wp_category', array(
                    'categories' => $_POST['category'],
                    'status' => $_POST['status'],
                    'image' => $_FILES['image']['name'],
                    'icon' =>$_POST['icon']
                ));
            }
            if($wpdb->insert_id>0){
                ?>
                <script>
                location.href="<?php echo site_url() ?>/wp-admin/admin.php?page=wp-category-Option&msg=suc&action=insert";
              </script><?php
            }
        }

        

    } 
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <?php
        if($_GET['action']=="edit"){
            ?>

            <input type="hidden" name="oldImageName" value="<?php echo $db_category['image'] ?>">
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <?php
        }
        ?>


        <input type="text" name="category" placeholder="Enter New Category" value="<?php echo $db_category['categories']; ?>" required><br>
        <label for="status">status</label>
        <input type="radio" name="status" value="1" <?php if($db_category['status']==1){echo "checked";} ?>>Active
        <input type="radio" name="status" value="0" <?php if($db_category['status']==0){echo "checked";} ?>>Deactive
        <br>
        <input type="file" id="image" name="image" accept="image/png, image/jpeg, image/jpg" <?php if(!$_GET['action']){echo "required";} ?>><br>
        <label for="icon">Enter Icon fa</label>
        <input type="text" id="icon" name="icon" value="<?php echo $db_category['icon']; ?>"><br>
        <input type="submit" name="category_submit" value="submit">
    </form>
    <?php 
} ?>