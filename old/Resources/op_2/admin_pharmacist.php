<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['admin_id'];
$username=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}
if(isset($_POST['submit'])){
$fname=$_POST['first_name'];
$lname=$_POST['last_name'];
$sid=$_POST['staff_id'];
$postal=$_POST['postal_address'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$user=$_POST['username'];
$pas=$_POST['password'];
$sql1=mysql_query("SELECT * FROM pharmacist WHERE username='$user'")or die(mysql_error());
 $result=mysql_fetch_array($sql1);
if($result>0){
$message="<font color=blue>sorry the username entered already exists</font>";
 }else{
$sql=mysql_query("INSERT INTO pharmacist(first_name,last_name,staff_id,postal_address,phone,email,username,password,date)
VALUES('$fname','$lname','$sid','$postal','$phone','$email','$user','$pas',NOW())");
if($sql>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin_pharmacist.php");
}else{
$message1="<font color=red>Registration Failed, Try again</font>";
}
	}}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $user;?> - Drug Analysis & Contrl System</title>
<html>
<head>
<title><?php echo $user;?> - Drug Analysis & Contrl System</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/AdminLTE.min.css">
        <link href="css/custom.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="css/main.css"/>
        <link rel="stylesheet" href="css/bgimg.css"/>
        <link rel="stylesheet" href="css/bgimg-nosocial.css"/>
<script src="js/function.js" type="text/javascript"></script>
<script>
function validateForm()
{

//for alphabet characters only
var str=document.form1.first_name.value;
	var valid="abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	//comparing user input with the characters one by one
	for(i=0;i<str.length;i++)
	{
	//charAt(i) returns the position of character at specific index(i)
	//indexOf returns the position of the first occurence of a specified value in a string. this method returns -1 if the value to search for never ocurs
	if(valid.indexOf(str.charAt(i))==-1)
	{
	alert("First Name Cannot Contain Numerical Values");
	document.form1.first_name.value="";
	document.form1.first_name.focus();
	return false;
	}}
	
if(document.form1.first_name.value=="")
{
alert("Name Field is Empty");
return false;
}

//for alphabet characters only
var str=document.form1.last_name.value;
	var valid="abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	//comparing user input with the characters one by one
	for(i=0;i<str.length;i++)
	{
	//charAt(i) returns the position of character at specific index(i)
	//indexOf returns the position of the first occurence of a specified value in a string. this method returns -1 if the value to search for never ocurs
	if(valid.indexOf(str.charAt(i))==-1)
	{
	alert("Last Name Cannot Contain Numerical Values");
	document.form1.last_name.value="";
	document.form1.last_name.focus();
	return false;
	}}
	

if(document.form1.last_name.value=="")
{
alert("Name Field is Empty");
return false;
}

}

</script>



   <style>#left-column {height: 477px;}
 #main {height: 477px;}
</style>
</head>
<body>
<div id="content">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Logo and responsive toggle -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">
                    <span class="glyphicon glyphicon-compressed"></span> 
                    Drug Analysis & Control System
                </a>
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="admin.php"><span class="glyphicon glyphicon-home"></span> Home</a>
                    </li>
                    <li class = "active">
                        <a href="admin_pharmacist.php"><span class="glyphicon glyphicon-user"></span>Pharmacist</a>
                    </li>
                    <li>
                        <a href="admin_manager.php"><span class="glyphicon glyphicon-tasks"></span>Manager</a>
                    </li>
                    <li>
                        <a href="admin_cashier.php"><span class="glyphicon glyphicon-usd"></span>Cashier</a>
                    </li>
                    <li>
                        <a href="reports.php"><span class="glyphicon glyphicon-stats"></span> Reports</a>
                    </li>
                    <li class="dropdown">
                        <a href="messages.php"><span class="glyphicon glyphicon-envelope"></span> Messages</a>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
</div>
<div class="container">
    <h2>Pharmacists</h2>
<section class="content">
      <div class="row">
        <div class="box box-info">
        <div class="box-header with-border">
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
        </div>  
          <div class="box-body">
            <div class="table-responsive">
        <?php echo $message;
              echo $message1;
        /* 
        View
        Displays all data from 'Pharmacist' table
        */
        // connect to the database
        include_once('connect_db.php');
       // get results from database
       $result = mysql_query("SELECT * FROM pharmacist")or die(mysql_error());
        // display data in table
        echo "<table class='table no-margin'>";
        echo "<thead><tr> <th>ID</th><th>Firstname </th> <th>Lastname </th> <th>Username </th><th>Update </th><th>Delete</th></tr></thead>";
        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                // echo out the contents of each row into a table
            echo "<tbody>";
                echo "<tr>";
                echo '<td>' . $row['pharmacist_id'] . '</td>';
                echo '<td>' . $row['first_name'] . '</td>';
                echo '<td>' . $row['last_name'] . '</td>';
                echo '<td>' . $row['username'] . '</td>';
                ?>
                <td><a href="update_pharmacist.php?username=<?php echo $row['username']?>"><span class="glyphicon glyphicon-new-window"></span></a></td>
                <td><a href="delete_pharmacist.php?pharmacist_id=<?php echo $row['pharmacist_id']?>"><span class="glyphicon glyphicon-trash"></span></a></td></tr></tbody>
                <?php
         } 
        // close table>
        echo "</table>";
?> 
</div>
</div>
</div>
</div>
</section>
</div>
</div>
        </div>  
        <div class="container">  
		           <!--Pharmacist-->
                   <h2>Enter New User Information</h2>
				   <?php echo $message;
			  echo $message1;
			  ?>
		<form name="form1" onsubmit="return validateForm(this);" action="admin_pharmacist.php" method="post" >
			<div class = "input-group"	>
				<tr><td align="center"><input name="first_name" class="form-control" type="text" style="width:127px" placeholder="First Name" required="required" id="first_name" /></td></tr>
				<tr><td align="center"><input name="last_name" class="form-control" type="text" style="width:127px" placeholder="Last Name" required="required" id="last_name" /></td></tr>
				<tr><td align="center"><input name="staff_id" class="form-control" type="text" style="width:127px" placeholder="Staff ID" required="required" id="staff_id"/></td></tr>  
				<tr><td align="center"><input name="postal_address" class="form-control" type="text" style="width:127px" placeholder="Address" required="required" id="postal_address" /></td></tr>  
				<tr><td align="center"><input name="phone" class="form-control" type="text" style="width:127px"placeholder="Phone"  required="required" id="phone" /></td></tr>  
				<tr><td align="center"><input name="email" class="form-control" type="email" style="width:127px" placeholder="Email" required="required" id="email" /></td></tr>   
				<tr><td align="center"><input name="username" class="form-control" type="text" style="width:127px" placeholder="Username" required="required" id="username" /></td></tr>
				<tr><td align="center"><input name="password" class="form-control" type="password" style="width:127px" placeholder="Password" required="required" id="password"/></td></tr>
				<tr><td align="right"><input class="btn btn-primary" name="submit" type="submit" value="Submit"/></td></tr>
			</div>
		</form>
        </div>  
    </div>  
</div>
</div>
 <!-- Footer -->
    <footer>
    
        <h1 class="text-center">Find Us</h1>
            
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 footer-info-item text-center">
                        <p class="lead">
                            0000  Street, Chitungwiza, Harare
                        </p>
                        <h2>Contact Us</h2>
                        <p class="lead"><span class="glyphicon glyphicon-phone-alt"></span> +263 73 348 6383<br>
                        omega@dacs.com</p>
                    </div>
                </div>
            </div>

        <!-- Footer Links -->
        <div class="footer-info">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 footer-info-item">
                        <h3>Information</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Customer Service</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Sitemap</a></li>
                            <li><a href="#">Orders &amp; Returns</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 footer-info-item">
                        <h3>My Account</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">Sign In</a></li>
                            <li><a href="#">View Drugs</a></li>
                            <li><a href="#">To Order</a></li>
                            <li><a href="#">Blocked Drugs</a></li>
                            <li><a href="#">Help</a></li>
                        </ul>   
                    </div>
                    <div class="col-sm-4 footer-info-item">
                        <h3><span class="glyphicon glyphicon-list-alt"></span> Newsletter</h3>
                        <p>Sign up for exclusive offers.</p>
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Enter your email address">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button">
                                    Subscribe!
                                </button>
                            </span>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div>
        
        <!-- Copyright etc -->
        <div class="small-print">
            <div class="container">
                <p><a href="#">Terms &amp; Conditions</a> | <a href="#">Privacy Policy</a> | <a href="#">Contact</a></p>
                <p>Copyright &copy; dacs.com 2018 </p>
            </div>
        </div>
        
    </footer>
</div>
</body>
</html>
