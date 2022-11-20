<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['cashier_id'];
$fname=$_SESSION['first_name'];
$lname=$_SESSION['last_name'];
$sid=$_SESSION['staff_id'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
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
<script type="text/javascript" SRC="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" SRC="js/superfish/hoverIntent.js"></script>
	<script type="text/javascript" SRC="js/superfish/superfish.js"></script>
	<script type="text/javascript" SRC="js/superfish/supersubs.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){ 
			$("ul.sf-menu").supersubs({ 
				minWidth:    12, 
				maxWidth:    27, 
				extraWidth:  1    
								  
			}).superfish();
							
		}); 
	</script>
	<script SRC="js/cufon-yui.js" type="text/javascript"></script>
	<script SRC="js/Liberation_Sans_font.js" type="text/javascript"></script>
	<script SRC="js/jquery.pngFix.pack.js"></script>
	<script type="text/javascript">
		Cufon.replace('h1,h2,h3,h4,h5,h6');
		Cufon.replace('.logo', { color: '-linear-gradient(0.5=#FFF, 0.7=#DDD)' }); 
	</script>
   <style>#left-column {height: 477px;}
 #main {height: 500px;}
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
            <li ><a href="pharmacist.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
			<li class="active"><a href="payment.php"target="_top"><span class="glyphicon glyphicon-credit-card"></span> Process payment</a></li>
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
		</ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
<div class="container">
-- <div id="tabbed_box" class="tabbed_box">  
    <h4> Manage Payments</h4> 
<hr/>	
    <div class="tabbed_area">    
          
       
 <script>
			$(document).ready(function()
	{
	$("#invoice_no").change(function() 
		{	
			var invoice_no=$("#invoice_no").val();
			
			
			
			if(invoice_no.length >0)		
			
				{
					$.ajax(
				{
type: "POST", url: "check.php", data: 'invoice_no='+invoice_no , success: function(msg)
									
					{  
						$("#viewer2").ajaxComplete(function(event, request, settings)
							{ 
								
										
									if(msg)
									{ 

										$(this).html(msg);
									
														
										
									} 
									else
									{
										$(this).html('<font color="red"><strong>Invoice does not exist</strong></font>');
									}
								
									 
								   
							});
					}    
				}); 
				}
	});		
	});		
		
		</script>
		
		<?php
		$_SESSION['invoice_no']=$invoice_no;
		$_SESSION['amount']=$amount;
		$_SESSION['payType']=$payType;
		$_SESSION['serial_no']=$serial_no;
		
		?>
		
		
        <div id="content_1" class="content"> 
		<div id="viewer1"><span id="viewer2"></span></div>
		  <form name="myform" onsubmit="return validateForm(this);" action="receipt.php" method="post" >
			<table width="220" height="106" border="0" >	
                <div class = "input-group"  >
				<tr><td ><input name="invoice_no" class="form-control" type="text" style="width:170px" placeholder="Invoice No" required="required" id="invoice_no" /></td></tr>
				<tr><td ><input name="amount" class="form-control" type="text" style="width:170px" placeholder="Amount" required="required" id="amount"/></td></tr> 
				<tr><td ><?php
				echo"<select  class=\"input-small\" class=\"form-control\" name=\"payType\" style=\"width:170px\" id=\"payment_type\">";
						 $getpayType=mysql_query("SELECT Name FROM paymentTypes");
						 echo"<option>Select Payment</option>";
		 while($pType=mysql_fetch_array($getpayType))
			{
				echo"<option>".$pType['Name']."</option>";
			}
		
		echo"</select>";?>  </td></tr>
				
				<tr><td ><input name="serial_no" class="form-control" type="text" style="width:170px" placeholder="Serial No"  id="serial_no" /></td></tr>  
				<tr><td><input class="btn btn-primary" name="tuma" id="tuma" type="submit" value="Submit"/></td></tr>
            </div>
            </table>
		</form>         
        </div>  
    </div>  
</div>
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
