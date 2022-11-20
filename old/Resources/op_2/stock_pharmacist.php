<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['pharmacist_id'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."index.php");
exit();
}
if(isset($_POST['submit'])){
$sname=$_POST['drug_name'];
$cat=$_POST['category'];
$des=$_POST['description'];
$com=$_POST['company'];
$sup=$_POST['supplier'];
$qua=$_POST['quantity'];
$cost=$_POST['cost'];
$sta="Available";
$ctrl =$_POST['control'];
$expiry=$_POST['expiry'];

$sql=mysql_query("INSERT INTO stock(drug_name,category,description,company,supplier,quantity,cost,status,controlled,date_supplied,expiry)
VALUES('$sname','$cat','$des','$com','$sup','$qua','$cost','$sta','$ctrl',NOW(), '$expiry')");
if($sql>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/stock_pharmacist.php");
}else{
$message1="<font color=red>Registration Failed, Try again</font>";
}
	}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $user;?> - Drug Analysis & Contrl System</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="stylesheet" href="css/AdminLTE.min.css">
        <link rel="stylesheet" href="css/main.css"/>
        <link rel="stylesheet" href="css/bgimg.css"/>
        <link rel="stylesheet" href="css/bgimg-nosocial.css"/>
<script src="js/function.js" type="text/javascript"></script>
<style>#left-column {height: 477px;}
 #main {height: 477px;}</style>
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
			<li ><a href="pharmacist.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
			<li><a href="prescription.php"><span class="glyphicon glyphicon-list-alt"></span> Prescription</a></li>
			<li class="active"><a href="stock_pharmacist.php"><span class="glyphicon glyphicon-erase"></span> Stock</a></li>
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
		</ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>

    <?php
        $_SESSION['controlType']=$controlType;
        $_SESSION['blockType']=$blockType;
        ?>

<div class="container">
    <h2>Manage Stock</h2>
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
			  ?>
      
		<?php
		/* 
		View
        Displays all data from 'Stock' table
		*/

        // connect to the database
        include_once('connect_db.php');

        // get results from database
		
        $result = mysql_query("SELECT * FROM stock") 
                or die(mysql_error());
		// display data in table
        echo "<table class='table no-margin'>";
         echo "<thead><tr><th>ID</th><th>Name</th><th>Category</th><th>Description</th><th>Status </th><th>Control</th><th>Block</th><th>Date Supplied</th><th>Expiry (Days) </th></tr><thead>";

        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                 echo '<td>' . $row['stock_id'] . '</td>';               
                echo '<td>' . $row['drug_name'] . '</td>';
				echo '<td>' . $row['category'] . '</td>';
				echo '<td>' . $row['description'] . '</td>';
				echo '<td>' . $row['status'] . '</td>';
                echo '<td>' . $row['controlled'] . '</td>';
                echo '<td>' . $row['Blocked'] . '</td>';
				echo '<td>' . $row['date_supplied'] . '</td>';
                $i =0;
                do {
                    # code...
                    $tempdate = $row['expiry'];
                    $date1 = strtotime($tempdate);
                    $date2 = strtotime("now");
                    $diff = $date1 - $date2;
                    $finaldate = floor($diff/(60*60*24));
                    echo '<td>' .$finaldate. '</td>';
                    $i++;
                } while ($i <= 0);?>
				<?php
		 } 
        // close table>
        echo "</table>";
?> 
        </div>  
        <div id="content_2" class="content"> 
        <h2>Enter New Stock Information</h2> 
         <!--Add Drug-->
		 <?php echo $message;
			  echo $message1;
			  ?>
			<form name="myform" onsubmit="return validateForm(this);" action="stock_pharmacist.php" method="post" >	
                <div class = "input-group"  >
				<tr><td align="center"><input name="drug_name" class="form-control" type="text" style="width:170px" placeholder="Drug Name" required="required" id="drug_name" /></td></tr>
				<tr><td align="center"><input name="category" class="form-control" type="text" style="width:170px" placeholder="Category" required="required" id="category"/></td></tr>
				<tr><td align="center"><input name="description" class="form-control" type="text" style="width:170px" placeholder="Description" required="required" id="description" /></td></tr>
				<tr><td align="center"><input name="company" class="form-control" type="text" style="width:170px" placeholder="Manufacturing Company"  required="required" id="company" /></td></tr>  
				<tr><td align="center"><input name="supplier" class="form-control" type="text" style="width:170px" placeholder="Supplier" required="required" id="supplier" /></td></tr>  
				<tr><td align="center"><input name="quantity" class="form-control" type="text" style="width:170px" placeholder="Quantity" required="required" id="quantity" /></td></tr>  
				<tr><td align="center"><input name="cost" class="form-control" type="text" style="width:170px" placeholder="Unit Cost" required="required" id="cost" /></td></tr>  
				<tr><td align="center"><input class="btn btn-primary" name="submit" type="submit" value="Submit" id="submit"/></td></tr>
                <tr>
                    <td >
                            <select class="form-control" name="control" id="control" style="width:170px">
                                <option>Controlled</option>
                                <option>Not Controlled</option>
                            </select>
                    </td>
                </tr>
                <tr><td align="center"><input name="expiry" class="form-control" type="date" style="width:145px" placeholder="Unit Cost" required="required" id="expiry" /></td></tr>
                </div>
		</form>
        </div>  
              
    </div>  
  
</section>
 
</div>
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
