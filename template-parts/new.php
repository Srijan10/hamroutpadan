<?php


$bucket = get_bucket();

?>
<div class='container'>
        
        <div class='cardhead'>
        <h1 >Cart</h1>
        </div>
      
        
    
        <div class='cartbody'>
        <div class='prodctdiv'>
        <h4 style='border-bottom:solid;'>Product Descrption</h4>
            
            <div class='display'>
                <?php 
                if($bucket){
                    foreach($bucket as $index => $item){ 
                        ?>
                    <div class='prodctdiv1'>
                    
                        <div class='prodctdiv2'>
                            <div class='prodctdiv5'>
                                Product Name : <p id='name'><?php echo item($item['iid'])['name']; ?></p>
                            </div>
                                <img  id='additem_img'src="<?php echo get_template_directory_uri(); ?>/assets/media/img/product/<?php echo item($item['iid'])['image']; ?>">
                        </div>
                        <div class='prodctdiv3'>
                            <div class='prodctdiv6'>
                                Price Rs: <p id='price<?php echo $index; ?>' value="<?php echo item($item['iid'])['price']; ?>"><?php echo item($item['iid'])['price']; ?></p>
                            </div>
                            Quantity :
                                <button id='minus' onclick="minus(<?php echo $index; ?>,'<?php echo $item['iid'];?>',<?php echo item($item['iid'])['qty']; ?>)">-</button>
                                <input type='number' onchange="multi_addtocart(<?php echo $index; ?>,'<?php echo $item['iid'];?>',<?php echo item($item['iid'])['qty']; ?>)" style='width:35px' value="<?php echo $item['quantity'] ?>" id='quantity<?php echo $index; ?>'/>
                                <button id='plus' onclick="plus(<?php echo $index; ?>,'<?php echo $item['iid'];?>',<?php echo item($item['iid'])['qty']; ?>)">+</button>
                        </div>
                        <div class='prodctdiv4'>
                            
                        Total Rs: <p id='tprice<?php echo $index; ?>'></p>
                        <a class="remove_add_item" href="http://localhost/hamroutpadan/addtocart/?action=remove_bucket&iid=<?php echo $item['iid']; ?>" onclick="return confirm('Are you sure, You want to delete?')">Remove</a>
                        </div>
                    </div>
                    <?php }
                }else{
                    echo "Cart is Empty";
                }
                
               ?>
            </div>
        </div>
              <div class='orderdiv'>
        <h4 style='border-bottom:solid;'> Order Summary</h4>
        <p>Total Rs:</p>
        <p id='totalprice'></p>
        <div class="payment_button">
            <a href="http://localhost/hamroutpadan/paymentform/" class="paymentbutton">Make payment</a>
        </div>
        </div>
</div>

<script>
var bucket = <?php echo json_encode($bucket);?>;

    function minus(i,id,qty){
        var quantity = "quantity"+i;
        if(Number(document.getElementById(quantity).value)-2>=0){
            data = {
                iid : id
            };
            $.post("http://localhost/hamroutpadan/addtocart/?action=remove_single_bucket",data);
        document.getElementById(quantity).value = Number(document.getElementById(quantity).value) - 1;
        display_total();
        }
    }
    function plus(i,id,qty){
        console.log("plus");console.log(id);console.log(qty);
                var quantity = "quantity"+i;
        if(Number(document.getElementById(quantity).value)+1<=qty){
            console.log("insdeva");
        
        data = {
                iid : id
            };
            $.post("http://localhost/hamroutpadan/addtocart/?action=add_single_bucket",data);
        document.getElementById(quantity).value = Number(document.getElementById(quantity).value) + 1;
        display_total();   
        }
    }
    display_total();
    function display_total(){
        let total_price=0;
        for(let i= 0;i<bucket.length;i++){
            var quantity = "quantity"+i;
            var price = "price"+i;
            var tprice = "tprice"+i;
            total_price = total_price+document.getElementById(quantity).value*Number(document.getElementById(price).innerHTML);
            document.getElementById(tprice).innerHTML = document.getElementById(quantity).value*Number(document.getElementById(price).innerHTML);
        }
        document.getElementById('totalprice').innerHTML=total_price;
    }
    function updatecard(i){
        document.getElementById('quantity'+i).value=cart_item[i].quantity;
        document.getElementById('tprice'+i).innerHTML=cart_item[i].quantity*cart_item[i].price;
        // localStorage.setItem('addtocart',JSON.stringify(cart_item));
        display_total();
    }
    function multi_addtocart(i,id,qty){
        console.log(qty); var quantity = "quantity"+i;
        if(Number(document.getElementById(quantity).value)<=0){
            alert("quantity can't be less than 1");
        }else if(Number(document.getElementById('quantity'+i).value)>qty){
            var quantity = "quantity"+i;
            data = {
                    iid : id,
                    qty : qty
                };
                $.post("http://localhost/hamroutpadan/addtocart/?action=update_quantity_bucket",data);
            document.getElementById(quantity).value = qty;
            display_total();
        }
        else if(Number(document.getElementById('quantity'+i).value)>0&&Number(document.getElementById('quantity'+i).value)<=qty){
        
                var quantity = "quantity"+i;
            data = {
                    iid : id,
                    qty : document.getElementById(quantity).value
                };
                $.post("http://localhost/hamroutpadan/addtocart/?action=update_quantity_bucket",data);
            document.getElementById(quantity).value = document.getElementById(quantity).value;
            display_total();
        }
    }
</script>