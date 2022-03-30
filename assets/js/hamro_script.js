// for merchant showcase and scrolling

function displayShowcaseContainer(){
    document.getElementById('merchantbody_container').style.display="block";
    document.getElementById('show_hidden_merchantContainer').style.display="none";
    document.getElementById('merchant_showcase').style.display="none";
}
function displayShowcase(id){
    document.getElementById('merchant_showcase').style.display="block";
    document.getElementById('merchantbody_container').style.display="none";
    document.getElementById('show_hidden_merchantContainer').style.display="block";
    let xhr = new XMLHttpRequest();
        url ="http://localhost/hamroutpadan/"+id.toLowerCase();
        xhr.open("GET",url,true);
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                let data = xhr.response;
                document.getElementById("merchant_showcase").innerHTML = data;
                }
            }
        }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send();
    $(window).scrollTop($('#merchant_showcase').position().top);
}

     
// for owl carousel
$(document).ready(function(){
    $('.brands1').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
        });
   
$('.custom1').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
});
$('.slidersimage').owlCarousel({
    loop:true,
    animateOut: 'slideOutDown',
    animateIn: 'flipInX',
    animateOut: 'fadeOut',
    items:1,
    smartSpeed:450,
    autoplay:true,
    autoplayTimeout:5000
});


});


// for nav contentn in single product page

function showcontentNav(id){
    var nav_content = id+"_link";
    document.getElementById('nav_content1_link').style.background="none";
    document.getElementById('nav_content2_link').style.background="none";
    document.getElementById('nav_content3_link').style.background="none";
    console.log(nav_content);
    document.getElementsByClassName('nav_content').nav_content1.style.display = "none";
    document.getElementsByClassName('nav_content').nav_content2.style.display = "none";
    document.getElementsByClassName('nav_content').nav_content3.style.display = "none";
    var conssdt = document.getElementById(id);
    conssdt.style.display = "block";
    document.getElementById(nav_content).style.background="#fff1f1";
}


// minus and plus



//login

 function show_pass() {
   var x = document.getElementById("password");
   if (x.type === "password") {
     x.type = "text";
   } else {
     x.type = "password";
   }
 }
