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

if(isset($_POST['submit']))
    {
      $fname=$_POST['first_name'];
      $lname=$_POST['last_name'];
      $postal=$_POST['postal_address'];
      $phone=$_POST['phone'];
      $email=$_POST['email'];
      $username=$_POST['username'];
      $pas=$_POST['password'];
// get value of id that sent from address bar
      $user=$_POST['user'];
// Retrieve data from database 
      $sql="UPDATE pharmacist SET postal_address='$postal',phone='$phone',email='$email', password='$pas' WHERE id='$user'";
      if($sql>0)
        {
          header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin.php");
        }
        else
          {
            $message1="<font color=red>Update Failed, Try again</font>";
          }
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
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
          <div class="sidenav-header-inner text-center"><i class="icon-user"></i><!-- <img src="img/avatar-7.jpg" alt="person" class="img-fluid rounded-circle"> -->
            <h2 class="h5"><?php echo $user;?></h2><span>Pharmacist</span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="admin.html" class="brand-small text-center"> <strong>DA</strong><strong class="text-primary">CS</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="pharmacist.php"> <i class="icon-home"></i>Home</a></li>
            <li  class="active"><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-form"></i>Forms </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li  class="active"><a href="add_prescriptions.php">Add Prescriptions</a></li>
                <li><a href="add_stockp.php">Add Stock</a></li>
              </ul>
            </li>
            <li><a href="charts.php"> <i class="fa fa-bar-chart"></i>Charts</a></li>
            <li><a href="pharmacy_tables.php"> <i class="icon-grid"></i>Tables</a></li>
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
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="admin.html" class="navbar-brand">
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
            <li class="breadcrumb-item"><a href="pharmacist.php">Home</a></li>
            <li class="breadcrumb-item active">Profile       </li>
          </ul>
        </div>
      </div>


      <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Forms            </h1>
          </header>
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Update Your Profile</h4>
                </div>
                <div class="card-body">
                  <p>Manages the pharmacy.</p>
                  <?php 
                    echo $message;
                    echo $message1;
                  ?>
                  <form method="post" action="profile.php">
                    
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" id="email" placeholder="Email Address" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Postal Address</label>
                      <input type="text" name="postal_address" id="postal_address" placeholder="Postal Address" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Phone</label>
                      <input type="text" name="phone" id="phone" placeholder="Phone" class="form-control">
                    </div>
                    <div class="form-group">       
                      <label>Password</label>
                      <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                    </div>
                    <div class="form-group">       
                      <input type="submit" name="submit" id="mySubmit" value="Add Manager" class="btn btn-primary">
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4>Current Manager Information</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <?php
                    include_once('connect_db.php');
                    $mid = intval($_GET['pharmacist_id']);
                    $result = mysql_query("SELECT * FROM pharmacist where pharmacist_id = $mid") or die(mysql_error());
                    echo '<table class="table table-striped table-hover">';
                      echo "<thead>
                        <tr>
                          <th>ID #</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Staff ID</th>
                        </tr>
                      </thead>";
                      while ($row = mysql_fetch_array($result)) {
                        # code...
                      
                      echo "<tbody>";
                        echo "<tr>";
                          echo '<th scope="row">' . $row['manager_id'] . '</th>';
                          echo '<td>' .$row['first_name']. '</td>';
                          echo '<td>' .$row['last_name']. '</td>';
                          echo '<td>' .$row['username']. '</td>';
                          echo '<td>' .$row['email']. '</td>';
                          echo '<td>' .$row['staff_id']. '</td>';
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