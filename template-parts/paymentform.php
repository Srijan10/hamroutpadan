<?php
/* Template Name: paymentform */

get_header();
$payment= payment();
$bucket =get_bucket();
if($bucket){
    ?>
    
Payment

<div class="container">
    <form action="http://localhost/hamroutpadan/payment/" method="post">
        <label for="mobile_no">Mobile No:</label>
        <input type="number" placeholder="+977 " name="phone" value="<?php echo $payment['mobile'] ?>"><br>
        <label for="district">Districts:</label>
        <input type="text" placeholder="kathmandu"name="district" value="<?php echo $payment['district'] ?>"><br>
        <label for="street_address">Street Address</label>
        <input type="text" placeholder="Koteshwor"name="street_address" value="<?php echo $payment['street_address'] ?>"><br>
        <label for="appartment_address">Appartment Address</label>
        <input type="text" placeholder="tinkuney" name="appartment_address" value="<?php echo $payment['appartment_address'] ?>"><br>
        <label for="payment_method">Payment Method</label>
        <select name="payment_method" id="payment_method">
            <option value="1">Ondelivery</option>
        </select>
        <input type="submit" name="payment_submit">

    </form>
</div>
<?php
}else{
    echo "you dont have any item in your cart";
}
?>
<?php
get_footer();