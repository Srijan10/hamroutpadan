<?php
$category = category();
?>
<div class="category">
    <li><ul class="categoryHeader">Category</ul></li>
    <li>
        <?php 
        foreach($category as $index=>$cat){
            ?>
                <ul><a href="#"><i class="<?php echo $cat['icon']; ?>"></i><?php echo $cat['categories']; ?></a></ul>
            <?php
        }
        ?>
    </li>
</div>