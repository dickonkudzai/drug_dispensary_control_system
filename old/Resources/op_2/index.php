<?php
include_once 'connect_db.php';
if(isset($_POST['submit'])){
$username=$_POST['username'];
$password=$_POST['password'];
$position=$_POST['position'];
switch($position){
case 'Admin':
$result=mysql_query("SELECT admin_id, username FROM admin WHERE username='$username' AND password='$password'");
$row=mysql_fetch_array($result);
if($row>0){
session_start();
$_SESSION['admin_id']=$row[0];
$_SESSION['username']=$row[1];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
case 'Pharmacist':
$result=mysql_query("SELECT pharmacist_id, first_name,last_name,staff_id,username FROM pharmacist WHERE username='$username' AND password='$password'");
$row=mysql_fetch_array($result);
if($row>0){
session_start();
$_SESSION['pharmacist_id']=$row[0];
$_SESSION['first_name']=$row[1];
$_SESSION['last_name']=$row[2];
$_SESSION['staff_id']=$row[3];
$_SESSION['username']=$row[4];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/pharmacist.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
case 'Cashier':
$result=mysql_query("SELECT cashier_id, first_name,last_name,staff_id,username FROM cashier WHERE username='$username' AND password='$password'");
$row=mysql_fetch_array($result);
if($row>0){
session_start();
$_SESSION['cashier_id']=$row[0];
$_SESSION['first_name']=$row[1];
$_SESSION['last_name']=$row[2];
$_SESSION['staff_id']=$row[3];
$_SESSION['username']=$row[4];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/cashier.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
case 'Manager':
$result=mysql_query("SELECT manager_id, first_name,last_name,staff_id,username FROM manager WHERE username='$username' AND password='$password'");
$row=mysql_fetch_array($result);
if($row>0){
session_start();
$_SESSION['manager_id']=$row[0];
$_SESSION['first_name']=$row[1];
$_SESSION['last_name']=$row[2];
$_SESSION['staff_id']=$row[3];
$_SESSION['username']=$row[4];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/manager.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
}}
echo <<<LOGIN
<!DOCTYPE html>
<html>
	<head>
		<title>Drug Analysis & Control System</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/custom.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" href="css/main.css"/>
		<link rel="stylesheet" href="css/bgimg.css"/>
		<link rel="stylesheet" href="css/bgimg-nosocial.css"/>
	</head>
<body>
	<div class="background"></div>
		<div class="backdrop"></div>
		<div class="login-form-container" id="login-form">
			<div class="login-form-content">
				<div class="login-form-header">
					<h2>Login to Your Account</h2>
				</div>
	  			$message
      			<form method="post" action="index.php" id = "login-form" class="login-form">
      				<div class="input-container">
      					<span class="glyphicon glyphicon-user"></span>
      					<input type="text" class="input" name="username" value="" placeholder="Username"/>
      				</div>
      				<div class="input-container">
      					<span class="glyphicon glyphicon-lock"></span>
      					<input type="password" class="input" name="password" value="" placeholder="Password"/>
      				</div>
      				<div class="input-container">
      					<select name="position">
      						<option>--Select position--</option>
							<option>Admin</option>
							<option>Pharmacist</option>
							<option>Cashier</option>
							<option>Manager</option>
						</select>
					</div>
					<input type="submit" name="submit" value="Login" class="button"/>
				</form>
			</div>
			<div class="attibution">
				Drug Analysis & Control System<br/>&copy; 2018 dacs.com
			</div>
		</div>

<!-- jQuery -->
    <script src="js/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<!-- IE10 viewport bug workaround -->
	<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
LOGIN;
?>
