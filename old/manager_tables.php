<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['manager_id'];
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.red.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><a href="profile.php?manager_id=<?php echo $id;?>"><i class="icon-user"></i><!-- <img src="img/avatar-7.jpg" alt="person" class="img-fluid rounded-circle"> -->
            <h2 class="h5"><?php echo $user;?></h2><span>Manager</span></a>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="manager.php" class="brand-small text-center"> <strong>DA</strong><strong class="text-primary">CS</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="manager.php"> <i class="icon-home"></i>Home                             </a></li>
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-form"></i>Forms </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="add_stock.php">Add Stock</a></li>
                <li><a href="update_stock.php">Update Stock</a></li>
                <li  class="active"><a href="manager_prescriptions.php">Add Prescriptions</a></li>
              </ul>
            </li>
            <li><a href="charts.php"> <i class="fa fa-bar-chart"></i>Charts                             </a></li>
            <li class="active"><a href="tables.php"> <i class="icon-grid"></i>Tables                             </a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="manager.php" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><span>Drug Analysis</span>&nbsp&&nbsp<strong class="text-primary">Control System</strong></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Log out-->
                <li class="nav-item"><a href="logout.php" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
            <li class="breadcrumb-item active">Tables       </li>
          </ul>
        </div>
      </div>
      <section>
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Tables            </h1>
          </header>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>Pharmacist</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <?php
                    include_once('connect_db.php');
                    $result = mysql_query("SELECT * FROM pharmacist") or die(mysql_error());
                    echo '<table class="table table-striped table-hover">';
                      echo "<thead>
                        <tr>
                          <th>ID #</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Username</th>
                        </tr>
                      </thead>";
                      while ($row = mysql_fetch_array($result)) {
                        # code...
                      
                      echo "<tbody>";
                        echo "<tr>";
                          echo '<th scope="row">' . $row['pharmacist_id'] . '</th>';
                          echo '<td>' .$row['first_name']. '</td>';
                          echo '<td>' .$row['last_name']. '</td>';
                          echo '<td>' .$row['username']. '</td>';
                          ?>
                        </tr>
                      </tbody>
                      <?php
                      }
                    echo "</table>";
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4>Current Stock</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <?php
                    include_once('connect_db.php');
                    $result = mysql_query("SELECT * FROM stock") or die(mysql_error());
                    echo '<table class="table table-striped table-hover">';
                      echo "<thead>
                        <tr>
                          <th>ID #</th>
                          <th>Name</th>
                          <th>Category</th>
                          <th>Description</th>
                          <th>Status</th>
                          <th>Date Supplied</th>
                          <th>Expiry (Days Left)</th>
                          <th>Update</th>
                          <th>Delete</th>
                        </tr>
                      </thead>";
                      while ($row = mysql_fetch_array($result)) {
                        # code...
                      
                      echo "<tbody>";
                        echo "<tr>";
                          echo '<th scope="row">' . $row['stock_id'] . '</th>';
                          echo '<td>' .$row['drug_name']. '</td>';
                          echo '<td>' .$row['category']. '</td>';
                          echo '<td>' .$row['description']. '</td>';
                          echo '<td>' .$row['status']. '</td>';
                          echo '<td>' .$row['date_supplied']. '</td>';
                          $i =0;
			                do {
			                    # code...
			                    $tempdate = $row['expiry'];
			                    $date1 = strtotime($tempdate);
			                    $date2 = strtotime("now");
			                    $diff = $date1 - $date2;
                          $expired="<font color=red>Expired</font>";
			                    $finaldate = floor($diff/(60*60*24));
                          if ($finaldate<0) {
                            # code...
                            echo '<td>' .$expired. '</td>';
                          }else{
                              echo '<td>' .$finaldate. '</td>';
                          }
			                    $i++;
			                } while ($i <= 0);
                          ?>
                          <td><a href="update_stock.php?stock_id=<?php echo $row['stock_id'];?>"><i class="fas fa-edit"></i></a></td>
                          <td><a href="delete_stock.php?stock_id=<?php echo $row['stock_id'];?>"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                      </tbody>
                      <?php
                      }
                    echo "</table>";
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4>Prescription</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <?php
                    include_once('connect_db.php');
                    $result = mysql_query("SELECT * FROM prescription") or die(mysql_error());
                    echo '<table class="table table-striped table-hover">';
                      echo "<thead>
                        <tr>
                          <th>ID #</th>
                          <th>Customer Name</th>
                          <th>Gender</th>
                          <th>Postal Address</th>
                          <th>Invoice</th>
                          <th>Phone Number</th>
                          <th>Date</th>
                        </tr>
                      </thead>";
                      while ($row = mysql_fetch_array($result)) {
                        # code...
                      
                      echo "<tbody>";
                        echo "<tr>";
                          echo '<th scope="row">' . $row['prescription_id'] . '</th>';
                          echo '<td>' .$row['customer_name']. '</td>';
                          echo '<td>' .$row['sex']. '</td>';
                          echo '<td>' .$row['postal_address']. '</td>';
                          echo '<td>' .$row['invoice_id']. '</td>';
                          echo '<td>' .$row['phone']. '</td>';
                          echo '<td>' .$row['date']. '</td>';
                          ?>
                        </tr>
                      </tbody>
                      <?php
                      }
                    echo "</table>";
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p>Drug Analysis & Control System &copy; 2018</p>
            </div>
            <!-- <div class="col-sm-6 text-right">
              <p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a></p>
               Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)
            </div> -->
          </div>
        </div>
      </footer>
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