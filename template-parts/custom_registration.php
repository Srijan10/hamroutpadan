<?php
/* Template Name: registration */

get_header();
if(isset($_POST)){
    $username = $wpdb->escape($_POST['mname']);
    $email = $wpdb->escape($_POST['email']);
    $password = $wpdb->escape($_POST['password']);
    $repassword = $wpdb->escape($_POST['repassword']);
    $role = $wpdb->escape($_POST['role']);
    $phone = $wpdb->escape($_POST['phone']);
    $address = $wpdb->escape($_POST['address']);
    $vkey = md5(time().$username);
    $error = array();
    if(strpos($username,' ')!==FALSE){
        $error['username_space'] = "username has Space";
    }
    if(empty($username)){
        $error['username_empty']="Needed Username Must";
    }
    if(username_exists($username)){
        $error['username_exists']= "username already exists";
    }
    if(!is_email($email)){
        $error['email_valid']="email is not valid";
    }
    if(email_exists($email)){
        $error['email_existence']="Email already exists";
    }
    if(strcmp($password,$repassword) !== 0 ){
        $error['password']="Password didn't Match";
    }
    if(count($error)>0){
        print_r($error);
    }if(count($error)==0){
        wp_create_user($username,$password,$email);
    }
}

?>

<style>
    body{
        background:white;
    }
  
/* .frominputs input {margin-top: 25px;} */
</style>
<?php
 
 if($current_user->ID>0){
    echo '<h2>You are already Registered.</h2';
}else{
 ?>
<body>
<div class="container_register">
    <div class="register_container">
        <h1>Registration</h1>
        <form method="post">
            <div class="form_container">
                <div class="frominputs">
                    <label for="mname">Username:</label>
                    <input type="text" id="mname" name="mname">
                </div>
                <div class="frominputs">
                    <label for="email">Email</Address>:</label>
                    <input type="text" id="email" name="email">
                </div>
                <div class="frominputs">
                    <label for="password">Password</Address>:</label>
                    <input type="password" id="password" name="password">
                </div>
                
                <div class="frominputs">
                    <label for="repassword">Re-enter Password</Address>:</label>
                    <input type="password" id="repassword" name="repassword">
                </div>
                <div class="frominputs">
                    <label for="phone">Phone Number</label>
                    <input type="number" id="phone" name="phone">
                </div>
                <input type="hidden" id="role" name="role" value="merchant">
                <div class="frominputs">
                    <label for="Address">Address</label>
                    <input type="text" id="address" name="address">
                </div>
                <div class="frominputs">
                    <button type="submit" name="btnsubmit">Submit</button>
                </div>
                <div class="p">Already have account?<a href="http://localhost/hamroutpadan/login-form">  login in</a></div>
                
            </div>
        </form>
    </div>
</div>
<?php
}?>
</body>
<?php
get_footer();
?>
<script>
  if(window.location.href == "http://localhost/hamroutpadan/registration/"){
    document.getElementById('mainheader').style.display = "none";
    document.getElementById('mainfooter').style.display = "none";
   }
</script>