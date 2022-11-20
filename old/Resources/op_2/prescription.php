<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['pharmacist_id'];
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
	<script>
function validateForm() {
    var value = document.myform.customer_name.value;
	if(value.match(/^[a-zA-Z]+(\s{1}[a-zA-Z]+)*$/)) {
        return true;
    } else {
        alert('Name Cannot contain numbers');
        return false;
    }
}
</script>
	<script SRC="js/cufon-yui.js" type="text/javascript"></script>
	<script SRC="js/Liberation_Sans_font.js" type="text/javascript"></script>
	<script SRC="js/jquery.pngFix.pack.js"></script>
	<script type="text/javascript">
		Cufon.replace('h1,h2,h3,h4,h5,h6');
		Cufon.replace('.logo', { color: '-linear-gradient(0.5=#FFF, 0.7=#DDD)' }); 
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
			<li ><a href="pharmacist.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
			<li class="active"><a href="prescription.php"><span class="glyphicon glyphicon-list-alt"></span> Prescription</a></li>
			<li><a href="stock_pharmacist.php"><span class="glyphicon glyphicon-erase"></span> Stock</a></li>
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
		</ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
<div class="container">
	<h2>Prescription</h2>
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
		<?php echo $message1;
		/* 
		View
        Displays all data from 'Pharmacist' table
		*/
        // connect to the database
        include_once('connect_db.php');
       // get results from database
       $result = mysql_query("SELECT * FROM prescription")or die(mysql_error());
		// display data in table
        echo "<table class='table no-margin'>";
        echo "<thead><tr> <th>Customer</th><th>Prescription N<sup>o</sup></th> <th>Invoice N<sup>o</sup></th><th>Date </th><th>Delete</th></tr><thead>";
        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                // echo out the contents of each row into a table
                echo "<tbody>";
                echo '<td>' . $row['customer_name'] . '</td>';
                echo '<td>' . $row['prescription_id'] . '</td>';
				echo '<td>' . $row['invoice_id'] . '</td>';
				
				echo '<td>' . $row['date'] . '</td>';
				?>
				
				<td><a href="delete_prescription.php?prescription_id=<?php echo $row['prescription_id']?>">
				<span class="glyphicon glyphicon-trash"></span></a></td>
				<?php
		 } 
        // close table>
        echo "</table>";
?> 
        </div>  
        <div id="content_2" class="content"> 
		
		<script>
			$(document).ready(function()
	{
		$("#drug_name,#strength,#dose,#quantity").change(function() 
		{	
			var drug_name=$("#drug_name").val();
			var strength=$("#strength").val();
			var dose=$("#dose").val();
			var quantity=$("#quantity").val();
			
			if(drug_name.length && strength.length && dose.length && quantity.length>0 )
				{
					$.ajax(
				{  
					type: "POST", url: "check.php", data: 'drug_name='+drug_name +'&strength='+strength+'&dose='+dose +'&quantity='+quantity, success: function(msg)
					{  
						$("#viewer2").ajaxComplete(function(event, request, settings)
							{ 
								
										
									if(msg != '')
									{ 

										
										$(this).html(msg);
										$('#strength, #dose, #quantity').val('');
										document.getElementById('drug_name').selectedIndex = 0;
									}  
								
									 
								   
							});
					}    
				}); 
				}
		});
		
		$("#customer_id,#customer_name,#age,#sex,#postal_address,#phone").change(function() 
		{	
			var customer_id=$("#customer_id").val();
			var customer_name=$("#customer_name").val();
			var age=$("#age").val();
			var sex=$("#sex").val();
			var postal_address=$("#postal_address").val();
			var phone=$("#phone").val();
			
			if(customer_id.length && customer_name.length && age.length && sex.length && postal_address.length && phone.length >0)
				{
					$.ajax(
				{  
					type: "POST", url: "check.php", data: 'customer_id='+customer_id +'&customer_name='+customer_name +'&age='+age +'&sex='+sex +'&postal_address='+postal_address +'&phone='+phone, success: function(msg)
					{  
						$("#viewer2").ajaxComplete(function(event, request, settings)
							{ 
								
										
									if(msg != '')
									{ 

										
										
										
										
									}  
								
									 
								   
							});
					}    
				}); 
				}
	});		
});		
		
		</script>
		<div id="viewer"><span id="viewer2"></span></div>
		<?php
		$invNum= mysql_query ("SELECT 1+MAX(invoice_id) FROM invoice");
		$invoice=mysql_fetch_array($invNum);
		if($invoice[0]=='')
		{$invoiceNo=10; }
		else{$invoiceNo=$invoice[0];}
		$_SESSION['invoice']=$invoiceNo;
		
		?>
			<div id="table_1">
		           <!--Pharmacist-->
		           <h2>Enter New Prescription Information</h2>
				   <?php echo $message;
			  echo $message1;
			  ?>
		<form name="myform" onsubmit="return validateForm(this);" action="invoice.php" method="post" >
			
			<div class = "input-group"	>	
				<tr><td align="left"><input name="customer_name" class="form-control" placeholder="Customer ID" id="customer_id"type="text" style="width:170px" required="required" /></td></tr>
				<tr><td align="left"><input name="customer_name" class="form-control" placeholder="Customer Name" id="customer_name"type="text" style="width:170px" required="required" /></td></tr>
				<tr><td align="left"><input name="age" class="form-control" type="text" style="width:170px" id="age" placeholder="Age"required="required" /></td></tr>
				<tr><td align="left"><input name="sex" class="form-control" type="text" style="width:170px" id="sex" required="required" placeholder="Gender"/></td></tr>  
				<tr><td align="left"><input name="postal_address" class="form-control" type="text" style="width:170px" id="postal_address"placeholder="Address"required="required" /></td></tr>  
				<tr><td align="left"><input name="phone" class="form-control" type="text"placeholder="Phone" id="phone" style="width:170px" required="required" /></td></tr>  
				<tr><td><?php
				echo"<select  class=\"input-small\" name=\"drug_name\" style=\"width:170px\" id=\"drug_name\">";
						 $getpayType=mysql_query("SELECT drug_name FROM stock");
						 echo"<option>Select Drug</option>";
		 while($pType=mysql_fetch_array($getpayType))
			{
				echo"<option>".$pType['drug_name']."</option>";
			}
		
		echo"</select>";?>  </td></tr>
<tr><td align="left"><input name="strength" class="form-control" type="text" style="width:170px"  id="strength"placeholder="Strength" /></td></tr>
				<tr><td align="left"><input name="dose" class="form-control" type="text" style="width:170px" id="dose" placeholder="Dose" /></td></tr>
				<tr><td align="left"><input name="quantity" class="form-control" type="text" style="width:170px" id="quantity"placeholder="Quantity"/></td></tr>
				
				<tr><td><input class="btn btn-primary" name="submit" type="submit" value="Submit"/></td></tr>
				</div>
		</form>
		<script>
			document.getElementById('drug_name').selectedIndex = 0;
		</script>
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