<?php
    session_start();
    include_once('connect_db.php');
    if(isset($_SESSION['username']))
        {
            $id=$_SESSION['manager_id'];
            $user=$_SESSION['username'];

            if(isset($_POST['stock_id'], $_POST['drug_name'], $_POST['category'], $_POST['description'], $_POST['company'], $_POST['supplier'], $_POST['quantity'], $_POST['cost'], $_POST['controlled'], $_POST['Blocked']) and $_POST['stock_id']!='')
            {
                if (get_magic_quotes_gpc())
                {
                    # code...
                    $_POST['stock_id'] = stripslashes($_POST['stock_id']);
                    $_POST['drug_name'] = stripslashes($_POST['drug_name']);
                    $_POST['category'] = stripslashes($_POST['category']);
                    $_POST['description'] = stripslashes($_POST['description']);
                    $_POST['company'] = stripslashes($_POST['company']);
                    $_POST['quantity'] = stripslashes($_POST['quantity']);
                    $_POST['cost'] = stripslashes($_POST['cost']);
                    $_POST['controlled'] = stripslashes($_POST['controlled']);
                    $_POST['Blocked'] = stripslashes($_POST['Blocked']);
                }

                $stock_id = mysql_real_escape_string($_POST['stock_id']);
                $drug_name = mysql_real_escape_string($_POST['drug_name']);
                $category = mysql_real_escape_string($_POST['category']);
                $description = mysql_real_escape_string($_POST['description']);
                $company = mysql_real_escape_string($_POST['company']);
                $quantity = mysql_real_escape_string($_POST['quanity']);
                $cost = mysql_real_escape_string($_POST['cost']);
                $controlled = mysql_real_escape_string($_POST['controlled']);
                $Blocked = mysql_real_escape_string($_POST['Blocked']);

                $dn = mysql_num_rows(mysql_query('select stock_id, drug_name from stock where stock_id = '.$stock_id.' '));
                if($dn ==0 )
                {
                    $form = true;
                    $message1 = 'no drug with such a name or id.';
                }
                else
                {
                    if( mysql_query('update stock set category = "'.$category.'",description = "'.$description.'",company = "'.$company.'",quantity = "'.$quantity.'",cost = "'.$cost.'",controlled = "'.$controlled.'", Blocked ="'.$Blocked.'" where stock_id = '.$stock_id.''))
                    {
                        $form = false;
                        $message3 = 'updated.';
                    }
                    else
                    {
                        $form = true;
                        $message = 'An error occurred while blocking the drug.';
                    }
                }
            }
        }
        else
            {
                header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
                exit();
            }
    // if(isset($_POST['submit']))
    //     {
    //         $sid=$$_POST['stock_id'];
    //         $dname=$_POST['drug_name'];
    //         $cat=$_POST['category'];
    //         $des=$_POST['description'];
    //         $com=$_POST['company'];
    //         $sup=$_POST['supplier'];
    //         $qua=$_POST['quantity'];
    //         $cost=$_POST['cost'];
    //         $ctrl="control";
    //         $blk="block";
    //         // get value of id that sent from address bar
    //         $user=$_POST['user'];
    //         // Retrieve data from database

    //         $dn = mysql_num_rows(mysql_query('select stock_id, drug_name, category, description, company, supplier, quantity, cost, contorlled, Blocked from stock where stock_id = '.$sid.' || name = "'.$dname.'"'));
    //         if($dn== 0)
    //         {
    //             $message3="<font color=red>Update Failed, Try again</font>";
    //         }
    //         else
    //         {
    //             $sql="UPDATE stock SET category='$cat', description='$des',company='$com',supplier='$sup',quantity='$qua',cost='$cost', block='$blk' WHERE drug_name='$dname'";
    //             if($sql>0)
    //                 {
    //                     header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/manager.php");
    //                 }
    //                 else
    //                     {
    //                         $message1="<font color=red>Update Failed, Try again</font>";
    //                     }
    //         }
            
    //     }

            
?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo $user;?> - Drug Analysis & Contrl System</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
            <li ><a href="manager.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li ><a href="view.php"<span class="glyphicon glyphicon-user"></span> View Users</a></li>
            <li><a href="view_prescription.php"><span class="glyphicon glyphicon-list-alt"></span> View Prescription</a></li>
            <li class="active"><a href="stock.php"><span class="glyphicon glyphicon-erase"></span> Manage Stock</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
<div id="container">
    <h2>Manage Stock</h2>
<div class="content">       
		<?php echo $message1;echo $message3;?>
          <form name="myform" onsubmit="return validateForm(this);" action="update_stock.php" method="post" >
                <tr><td align="center"><input name="stock_id" class="form-control" type="text" style="width:170px" placeholder="Drug ID" value="<?php include_once('connect_db.php'); echo $_GET['stock_id']?>" id="stock_id" /></td></tr>	
				<tr><td align="center"><input name="drug_name" class="form-control" type="text" style="width:170px" placeholder="Drug Name" value="<?php include_once('connect_db.php'); echo $_GET['drug_name']?>" id="drug_name" /></td></tr>
				<tr><td align="center"><input name="category" class="form-control" type="text" style="width:170px" placeholder="Category" id="category" value="<?php include_once('connect_db.php'); echo $_GET['category']?>" /></td></tr>
				<tr><td align="center"><input name="description" class="form-control" type="text" style="width:170px" placeholder="Description" id="description" value="<?php include_once('connect_db.php'); echo $_GET['description']?>" /></td></tr>  
				<tr><td align="center"><input name="company" class="form-control" type="text" style="width:170px" placeholder="Company" id="company" value="<?php include_once('connect_db.php'); echo $_GET['company']?>" /></td></tr>  
				<tr><td align="center"><input name="supplier" class="form-control" type="text" style="width:170px" placeholder="Supplier" id="supplier" value="<?php include_once('connect_db.php'); echo $_GET['supplier']?>" /></td></tr>  
				<tr><td align="center"><input name="quantity" class="form-control" type="text" style="width:170px" placeholder="Quantity" id="quantity"value="<?php include_once('connect_db.php'); echo $_GET['quantity']?>" /></td></tr>   
				<tr><td align="center"><input name="cost" class="form-control" type="text" style="width:170px" placeholder="Cost" id="cost"value="<?php include_once('connect_db.php'); echo $_GET['cost']?>" /></td></tr>
				<tr>
                    <td >
                            <select class="input-small" name="controlled" id="controlled" style="width:170px">
                                <option>Controlled</option>
                                <option>Not Controlled</option>
                            </select>
                    </td>
                </tr>
                <tr>
                    <td >
                            <select class="input-small" name="Blocked" id="Blocked" style="width:170px">
                                <option>Blocked</option>
                                <option>Unblocked</option>
                            </select>
                    </td>
                </tr>
				<tr><td align="center"><input class="btn btn-primary" name="submit" type="submit" value="Update"/></td></tr>
		</form>
		</div>

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
         echo "<thead><tr><th>ID</th><th>Name</th><th>Category</th><th>Description</th><th>Status </th><th>Date </th><th>Update </th><th>Delete</th></tr><thead>";

        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                 echo '<td>' . $row['stock_id'] . '</td>';               
                echo '<td>' . $row['drug_name'] . '</td>';
                echo '<td>' . $row['category'] . '</td>';
                echo '<td>' . $row['description'] . '</td>';
                echo '<td>' . $row['status'] . '</td>';
                echo '<td>' . $row['date_supplied'] . '</td>';?>
                <td><a href="update_stock.php?stock_id=<?php echo $row['stock_id']?>"><span class="glyphicon glyphicon-new-window"></span></a></td>
                <td><a href="delete_stock.php?stock_id=<?php echo $row['stock_id']?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                <?php
         } 
        // close table>
        echo "</table>";
?> 
        </div>    
              
    </div>  
  
</section>  
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
