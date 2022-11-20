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
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $user;?> - Drug Analysis & Contrl System</title>
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
    <link rel="stylesheet" href="css/style.blue.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="style/table.css" type="text/css" media="screen" /> 
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

	<nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><i class="icon-user"></i><!-- <img src="img/avatar-7.jpg" alt="person" class="img-fluid rounded-circle"> -->
            <h2 class="h5"><?php echo $user;?></h2><span>Pharmacist</span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="pharmacist.php" class="brand-small text-center"> <strong>DA</strong><strong class="text-primary">CS</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="pharmacist.php"> <i class="icon-home"></i>Home                             </a></li>
            <li  class="active"><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-form"></i>Forms </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li  class="active"><a href="add_prescriptions.php">Add Prescriptions</a></li>
                <li><a href="add_stockp.php">Add Stock</a></li>
              </ul>
            </li>
            <li><a href="charts.php"> <i class="fa fa-bar-chart"></i>Charts                             </a></li>
            <li><a href="pharmacy_tables.php"> <i class="icon-grid"></i>Tables                             </a></li>
          </ul>
        </div>
      </div>
    </nav>

    
<div id="content">
<div id="header">
<h1><a href="#"><img src="images/hd_logo.jpg"></a> Pharmacy Sys</h1></div>
<div id="left_column">
<div id="button">
		<ul>
			<li><a href="pharmacist.php">Dashboard</a></li>
			<li><a href="prescription.php">Prescription</a></li>
			<li><a href="stock_pharmacist.php">Stock</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>	
</div>
</div>
<div id="main">
<div id="tabbed_box" class="tabbed_box">  
    <h4>Prescription</h4> 
<hr/>	
    <div class="tabbed_area">  
      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">View </a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Create New</a></li>  
              
        </ul>  
          
        <div id="content_1" class="content">  
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
        echo "<table border='1' cellpadding='5'align='center'>";
        echo "<tr> <th>Customer</th><th>Prescription N<sup>o</sup></th> <th>Invoice N<sup>o</sup></th><th>Date </th><th>Delete</th></tr>";
        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td>' . $row['customer_name'] . '</td>';
                echo '<td>' . $row['prescription_id'] . '</td>';
				echo '<td>' . $row['invoice_id'] . '</td>';
				
				echo '<td>' . $row['date'] . '</td>';
				?>
				
				<td><a href="delete_prescription.php?prescription_id=<?php echo $row['prescription_id']?>">
				<img src="images/delete-icon.jpg" width="35" height="35" border="0" /></a></td>
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
				   <?php echo $message;
			  echo $message1;
			  ?>
		<form name="myform" onsubmit="return validateForm(this);" action="invoice.php" method="post" >
			<table width="200" height="106" border="0" >	
				<tr><td align="left"><input name="customer_name" placeholder="Customer ID" id="customer_id"type="text" style="width:170px" required="required" /></td></tr>
				<tr><td align="left"><input name="customer_name" placeholder="Customer Name" id="customer_name"type="text" style="width:170px" required="required" /></td></tr>
				<tr><td align="left"><input name="age" type="text" style="width:170px" id="age" placeholder="Age"required="required" /></td></tr>
				<tr><td align="left"><input name="sex" type="text" style="width:170px" id="sex" required="required" placeholder="Gender"/></td></tr>  
				<tr><td align="left"><input name="postal_address" type="text" style="width:170px" id="postal_address"placeholder="Address"required="required" /></td></tr>  
				<tr><td align="left"><input name="phone" type="text"placeholder="Phone" id="phone" style="width:170px" required="required" /></td></tr>  
				<tr><td><?php
				echo"<select  class=\"input-small\" name=\"drug_name\" style=\"width:170px\" id=\"drug_name\">";
						 $getpayType=mysql_query("SELECT drug_name FROM stock");
						 echo"<option>Select Drug</option>";
		 while($pType=mysql_fetch_array($getpayType))
			{
				echo"<option>".$pType['drug_name']."</option>";
			}
		
		echo"</select>";?>  </td></tr>
<tr><td align="left"><input name="strength" type="text" style="width:170px"  id="strength"placeholder="Strength" /></td></tr>
				<tr><td align="left"><input name="dose" type="text" style="width:170px" id="dose" placeholder="Dose" /></td></tr>
				<tr><td align="left"><input name="quantity" type="text" style="width:170px" id="quantity"placeholder="Quantity"/></td></tr>
				
				<tr><td><input name="submit" type="submit" value="Submit"/></td></tr>
            </table>
		</form>
		<script>
			document.getElementById('drug_name').selectedIndex = 0;
		</script>
		</div>
		</div>  
    </div>  
</div>
</div>
<div id="footer" align="Center"> Pharmacy Sys 2013. Copyright All Rights Reserved</div>
</div>
</body>
</html>
