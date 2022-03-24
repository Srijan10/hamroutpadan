<?php 
/* Template Name: addtocart */
get_header();

$item = item();
print_r($item);
echo 'appples';
?>
<div class="display">
    apple
</div>
<style>

/* /6 */

    </style>
<script>
//session starting
// addtocart = {};
// localStorage.setItem('addtocart',JSON.stringify(addtocart));
product = {productName:'baat',price:'2211',description:'This is nice airphone',quantity:'230'};
// add_to_cart(product);
function add_to_cart(product){
var cart_item = JSON.parse(localStorage.getItem('addtocart'));
cart_item[Object.keys(cart_item).length+1]=product;
localStorage.setItem('addtocart',JSON.stringify(cart_item));
}
// remove_from_cart(0);
function remove_from_cart(i){
var cart_item = JSON.parse(localStorage.getItem('addtocart'));
console.log(cart_item);
var deleted_cart_item = cart_item[Object.keys(cart_item).length];
delete cart_item[Object.keys(cart_item).length];
cart_item[i]=deleted_cart_item;
localStorage.setItem('addtocart',JSON.stringify(cart_item));
console.log(cart_item);
}
var cart_item = JSON.parse(localStorage.getItem('addtocart'));

    cart(cart_item);
function cart(cart_item){

        //Container
        content="";
        content+="<div class='container'>"; 
            
      content+="<div class='cardhead'>";
        content+="<h1 >Cart</h1>";
        content+="</div>";
      
        
        
        //Cart body
    
        content+="<div class='cartbody'>";
            //product description
        content+="<div class='prodctdiv'>";
        content+="<h4 style='border-bottom:solid;'>Product Descrption</h4>";
            
        content+="<div class='display'>";
        
        //div1
        for( let i=0; i <=Object.keys(cart_item).length;i++){
            console.log(cart_item[i]);
            if(!cart_item[i]){
                continue;
            }
            content+="<div class='prodctdiv1'>";
           
        //div 2
        content+="<div class='prodctdiv2'>";
        content+="<div class='prodctdiv5'>";
        content+="Product Name : <p id='name'>"+cart_item[i].productName+" </p>";
        content+="</div>";
        content+="<img  id='img'src='assets/media/img/product/p6.jpg'>"; 
        content+="</div>";
           //div 3
        content+="<div class='prodctdiv3'>";
        let a = 'price'+i;
        let b = 'quantity'+i;
        let c = 'tprice'+i;
        content+="<div class='prodctdiv6'>";
        content+=" Price Rs: <p id='price"+i+"'> "+cart_item[i].price+" </p>";
        content+="</div>";
        content+="Quantity :";
        content+="<button id=minus onclick='minus("+i+")'>-</button>";
        content+="<input type='number' onchange='multi_addtocart("+i+")' style='width:35px' value='"+cart_item[i].quantity+"' id='quantity"+i+"'/>";
        content+="<button id=plus onclick='plus("+i+")'>+</button>";
        content+="</div>";
           //div 4
        content+="<div class='prodctdiv4'>";
            
        content+=" Total Rs: <p id='tprice"+i+"'> "+cart_item[i].quantity*cart_item[i].price+" </p>";
        content+="</div>";
        content+="</div>";
          }
     
        content+="</div>";


     
        content+="</div>";
              //order summary
              content+="<div class='orderdiv'>";
        content+="<h4 style='border-bottom:solid;'> Order Summary</h4>";
        content+="<p>Total Rs:</p>";
        content+="<p id='totalprice'></p>";
        content+="</div>";
        content+="</div>"; 
        document.getElementById("mainbody").innerHTML = content;
        
     
    }
    // minus function   
    function minus(i){
        if(cart_item[i].quantity>1){
            cart_item[i].quantity=Number(cart_item[i].quantity)-1;
            updatecard(i)
        }
    }
    //function plus
    function plus(i){
        cart_item[i].quantity=Number(cart_item[i].quantity)+1;
        updatecard(i)
    }
    display_total();
    function display_total(){
        console.log("hello");
        let total_price=0;
        for( let i=0; i <=Object.keys(cart_item).length;i++){
            if(!cart_item[i]){
                continue;
            }
            total_price += Number(cart_item[i].quantity)*Number(cart_item[i].price);
        }
        document.getElementById('totalprice').innerHTML=total_price;
    }
    function updatecard(i){
        document.getElementById('quantity'+i).value=cart_item[i].quantity;
        document.getElementById('tprice'+i).innerHTML=cart_item[i].quantity*cart_item[i].price;
        localStorage.setItem('addtocart',JSON.stringify(cart_item));
        display_total();
    }
    function multi_addtocart(i){
        document.getElementById('quantity'+i).value;
        if( document.getElementById('quantity'+i).value<=0){
            alert("quantity can't be less than 1");
            updatecard(i);
        }else{
            cart_item[i].quantity = document.getElementById('quantity'+i).value;
            updatecard(i);
        }
    }
</script>

<?php 
get_footer();