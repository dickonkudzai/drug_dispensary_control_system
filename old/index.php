<?php
  include_once 'connect_db.php';
  if(isset($_POST['submit']))
  {
    $username=$_POST['username'];
    $password=$_POST['password'];
    $position=$_POST['position'];
    switch($position)
    {
      case 'Admin':
        // $result=mysql_query("SELECT admin_id, username FROM admin WHERE username='$username' AND password='$password'");
        // $row=mysql_fetch_array($result);
        // if($row>0){
        // session_start();
        // $_SESSION['admin_id']=$row[0];
        // $_SESSION['username']=$row[1];
        $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
        $statement = $conn->prepare($query);
        $statement->execute();
        $found = $statement->rowCount();
        if($found>0)
        {
          $result = $statement->fetchAll();
          foreach($result as $row)
          {
            $_SESSION['admin_id']=$row['admin_id'];
            $_SESSION['username']=$row['username'];
          }
          header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin.php");
        }else{
          $message="<font color=red>Invalid login Try Again</font>";
        }
      break;
      case 'Pharmacist':
        // $result=mysql_query("SELECT pharmacist_id, first_name,last_name,staff_id,username FROM pharmacist WHERE username='$username' AND password='$password'");
        // $row=mysql_fetch_array($result);
        // if($row>0){
        // session_start();
        // $_SESSION['pharmacist_id']=$row[0];
        // $_SESSION['first_name']=$row[1];
        // $_SESSION['last_name']=$row[2];
        // $_SESSION['staff_id']=$row[3];
        // $_SESSION['username']=$row[4];
        // header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/pharmacist.php");
        // }else{
        // $message="<font color=red>Invalid login Try Again</font>";
        // }
      break;
      case 'Cashier':
          // $result=mysql_query("SELECT cashier_id, first_name,last_name,staff_id,username FROM cashier WHERE username='$username' AND password='$password'");
          // $row=mysql_fetch_array($result);
          // if($row>0){
          // session_start();
          // $_SESSION['cashier_id']=$row[0];
          // $_SESSION['first_name']=$row[1];
          // $_SESSION['last_name']=$row[2];
          // $_SESSION['staff_id']=$row[3];
          // $_SESSION['username']=$row[4];
          // header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/cashier.php");
          // }else{
          // $message="<font color=red>Invalid login Try Again</font>";
          // }
      break;
      case 'Manager':
          // $result=mysql_query("SELECT manager_id, first_name,last_name,staff_id,username FROM manager WHERE username='$username' AND password='$password'");
          // $row=mysql_fetch_array($result);
          // if($row>0){
          // session_start();
          // $_SESSION['manager_id']=$row[0];
          // $_SESSION['first_name']=$row[1];
          // $_SESSION['last_name']=$row[2];
          // $_SESSION['staff_id']=$row[3];
          // $_SESSION['username']=$row[4];
          // header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/manager.php");
          // }else{
          // $message="<font color=red>Invalid login Try Again</font>";
          // }
      break;
    }
  }
echo <<<LOGIN
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Analysis & Control System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page login-page">
      <div class="container">
        <div class="form-outer text-center d-flex align-items-center">
          <div class="form-inner">
            <div class="logo text-uppercase"><span>Drug Analysis & Control System</span><strong class="text-primary">Log In</strong></div>
            <p>Being an integral member of the healthcare team responsible for the outcomes associated with the medication use process.</p>
            <form method="post" action="index.php" class="text-left form-validate">
              <div class="form-group-material">
                <input id="username" type="text" name="username" required data-msg="Please enter your username" class="input-material">
                <label for="login-username" class="label-material">Username</label>
              </div>
              <div class="form-group-material">
                <input id="password" type="password" name="password" required data-msg="Please enter your password" class="input-material">
                <label for="login-password" class="label-material">Password</label>
              </div>
              <div class="form-group-material">
                <!-- <input id="login-password" type="password" name="loginPassword" required data-msg="Please enter your password" class="input-material"> -->
                <select name="position" required data-msg="Please select your identity" class="form-control">
                  <option>--Select position--</option>
                  <option value="Admin">Admin</option>
                  <option>Pharmacist</option>
                  <option>Manager</option>
                </select>
              </div>
              <div class="form-group text-center"><input type="submit" name="submit" class="btn btn-primary" value="Login"/>

                <!-- This should be submit button but I replaced it with <a> for demo purposes-->
              </div>
            </form><!-- <a href="#" class="forgot-pass">Forgot Password?</a><small>Do not have an account? </small><a href="register.html" class="signup">Signup</a> -->
          </div>
          <!-- <div class="copyrights text-center">
            <p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a></p>
             Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)
          </div> -->
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
  </body>
</html>
LOGIN;
?>