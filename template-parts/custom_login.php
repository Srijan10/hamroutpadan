<?php

/* Template Name: login-form*/

    //user is in logged out state
    do_action('user_redirect_if_logged_in');
    
    // get_header();
    $login = home_url()."/login-new/";
    $dashboard = home_url()."/dashboard/";
    
    if(isset($_REQUEST['signin'])){
       $email = $_POST['email'];
       $password = $_POST['password'];
       $creds = array();
       $creds['user_login'] = $_POST['email'];
       $creds['user_password'] = $_POST['password'];
       $creds['remember'] = false;
       $user = wp_signon( $creds, false );
       //if ( is_wp_error($user) )
       //{
       //   header("location:$login");
       //}
       //else
       //{
       //   header("location:$dashboard");
       //} 
 
         
 
       if(isset($user->errors)){
       // if(is_wp_error($user)) {
          echo $user->get_error_message();
          die;
       }else{ //successfully logged in
             session_start();  //check for wp_session storage 
             $_SESSION["new_dashboard"] = '1';  //if you want to redirect user to a new page or set any conditions on login
          
                 if ($user->is_admin == '1') {
                   $dashboard = home_url();
                 } else {
                   $dashboard = home_url();
                 }
         
         //set cookie for remember me //save user login details as cookie if remember me is set, so that if user logs out next time and comes to this log in page, username & password auto fills by checking
         $user_login_details = $email.'_pass_'.$password;
         if(!empty($_POST["remember"])) {
           setcookie ("user_login_details",$user_login_details,time()+ (10 * 365 * 24 * 60 * 60)); //set cookie time as per you need
         } else {  //remove login details from cookie
           if(isset($_COOKIE["user_login_details"])) {
             setcookie ("user_login_details","");
           }
         }
          wp_redirect($dashboard);
          exit;
       }
    }
    
    if(isset($_COOKIE["user_login_details"])) {
           $login_details = $_COOKIE["user_login_details"];
           $login_details = explode('_pass_', $login_details);
           $email_set = $login_details[0];
           $pass_set = $login_details[1];
    }
    ?>

 <!DOCTYPE html>
<?php

get_header();
$action = isset($_GET['action'])?trim($_GET['action']):"";
if(!empty($action)){
  echo "Your password is reset. Please login with new Password.";
}
 
    global $wpdb;
    $db_name = $wpdb->dbname;
 ?>
 
    <title>Sign In</title>
 
 </head>
 
 <title>New Login</title>

 <style>
   
a.small.text-muted.text-underline--dashed.border-primary {
    color: white;
    font-size: smaller;
    font-weight: 800;
}
.loginhead {
    text-align: center;
    font-weight: bold;
}

form {
    margin-top: 40px;
    margin-right: 20px;
}

.form-group {
    margin-bottom: 15px;
    text-align: center;
}

label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: 700;
}

.input-group {
    width: 100%;
    position: relative;
    display: table;
    border-collapse: separate;
}

.input-group .form-control {
    position: relative;
    z-index: 2;
    float: left;
    width: 100%;
    margin-bottom: 0;
}div#login_container {
    padding: 10% 0px;
}
.loginbtn {
    display: flex;
    justify-content: center;
}

button#signin {
    padding: 5px 45px;
}
 </style>
 <div class="loginbackground">
 <div class="container" style="    display: flex;
    justify-content: center;     align-items: center;" id="login_container">
   
    <div class="loginform">
       <div class="loginhead">

       <h3 class="h3">Login</h3>
       </div>
       <div class="loginbody">
       <form method="POST" action="">                  
                   <div class="form-group">
                      <label>Username or Email address</label>
                      <div class="input-group">
                         <input id="email" type="text" class="form-control" name="email" value="<?php if(isset($email_set)){ echo $email_set; } ?>" required />
                      </div>
                   </div>
                   <div class="form-group">
                   
                            <label class="form-control-label">Password</label>
                     
                            <a href="#" class="small text-muted text-underline--dashed border-primary">Lost password?</a>
                   
                      <div class="input-group input-group-merge">
              
                         <input id="password" type="password" value="<?php if(isset($pass_set)){ echo $pass_set; } ?>" class="form-control" name="password" required />
                         Show Password
                            <a  onClick="show_pass()" class="primary_color">as
                            <i  class="fas fa-eye"></i>
                            </a>
                      </div>
                    
                            <input type="checkbox" name="remember" class="custom-control-input" id="remember" >
                            <label class="custom-control-label" for="remember">Remember Me</label>
                       <br>
                       <div class="loginbtn">
                       <div class="inner"></div>
                       <button type="submit" id="signin" name="signin">
                         Submit
                         </button>
                       </div>
                       Not Signed Up Yet?<a href="#">Sign up </a>
                 
                   </div>
                </form>
       </div>
    </div>
 </div>
 </div>

 
<?php 
get_footer();


?>
<script>
  if(window.location.href == "http://localhost/hamroutpadan/login-form/"){
    document.getElementById('mainheader').style.display = "none";
    document.getElementById('mainfooter').style.display = "none";
    
   }
</script>