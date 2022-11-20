<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['admin_id'];
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
        <link rel="stylesheet" href="css/main.css"/>
        <link rel="stylesheet" href="css/bgimg.css"/>
        <link rel="stylesheet" href="css/bgimg-nosocial.css"/>
<script src="js/function.js" type="text/javascript"></script>
<style>
#left_column{
height: 470px;
}

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
                    <li class = "active">
                        <a href="admin.php"><span class="glyphicon glyphicon-home"></span> Home</a>
                    </li>
                    <li>
                        <a href="admin_pharmacist.php"><span class="glyphicon glyphicon-user"></span>Pharmacist</a>
                    </li>
                    <li>
                        <a href="admin_manager.php"><span class="glyphicon glyphicon-tasks"></span>Manager</a>
                    </li>
                    <li>
                        <a href="admin_cashier.php"><span class="glyphicon glyphicon-usd"></span>Cashier</a>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>

<!-- Featured Products -->
    <div class="container">
        <h1 class="text-center">Users</h1>
        <div class="row">
        
            <!-- Product 1 -->
            <div class="col-sm-3 col-md-3">
                <div class="thumbnail featured-product">
                    <a href="admin_pharmacist.php">
                        <img src="images/pharmacist.jpg" alt="">
                    </a>
                    <div class="caption">
                        <h3>Phamarcists</h3>
                        <p>Pharmacists, also known as chemists or druggists, are health professionals who practice in pharmacy, the field of health sciences focusing on safe and effective medication use.</p>

                        <!-- Input Group -->
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button">
                                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> 
                                    view
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="col-sm-3 col-md-6">
                <div class="thumbnail featured-product">
                    <a href="admin_manager.php">
                        <img src="images/manager.png" alt="">
                    </a>
                    <div class="caption">
                        <h3>Manager</h3>
                        <p>a person responsible for controlling or administering all or part of a company or similar organization.</p>

                        <!-- Input Group -->
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button" href="admin_manager.php">
                                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> 
                                    view
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="col-sm-3 col-md-3">
                <div class="thumbnail featured-product">
                    <a href="admin_cashier.php">
                        <img src="images/cashier.png" alt="">
                    </a>
                    <div class="caption">
                        <h3>Cashier</h3>
                        <p>a person handling payments and receipts in a store, bank, or other business.</p>

                        <!-- Input Group -->
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button">
                                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> 
                                    view
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container -->
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
