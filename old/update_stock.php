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
          <div class="sidenav-header-inner text-center"><i class="icon-user"></i><!-- <img src="img/avatar-7.jpg" alt="person" class="img-fluid rounded-circle"> -->
            <h2 class="h5"><?php echo $user;?></h2><span>Manager</span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="manager.php" class="brand-small text-center"> <strong>DA</strong><strong class="text-primary">CS</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="manager.php"> <i class="icon-home"></i>Home                             </a></li>
            <li class="active"><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-form"></i>Forms </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="add_stock.php">Add Stock</a></li>
                <li class="active"><a href="update_stock.php">Update Stock</a></li>
              </ul>
            </li>
            <li><a href="charts.php"> <i class="fa fa-bar-chart"></i>Charts                             </a></li>
            <li><a href="manager_tables.php"> <i class="icon-grid"></i>Tables                             </a></li>
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
                <!-- Notifications dropdown-->
                <!-- <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell"></i><span class="badge badge-warning">12</span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification d-flex justify-content-between">
                          <div class="notification-content"><i class="fa fa-envelope"></i>You have 6 new messages </div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification d-flex justify-content-between">
                          <div class="notification-content"><i class="fa fa-twitter"></i>You have 2 followers</div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification d-flex justify-content-between">
                          <div class="notification-content"><i class="fa fa-upload"></i>Server Rebooted</div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification d-flex justify-content-between">
                          <div class="notification-content"><i class="fa fa-twitter"></i>You have 2 followers</div>
                          <div class="notification-time"><small>10 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-bell"></i>view all notifications                                            </strong></a></li>
                  </ul>
                </li> -->
                <!-- Messages dropdown-->
                <!-- <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope"></i><span class="badge badge-info">10</span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                        <div class="msg-profile"> <img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Jason Doe</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                        <div class="msg-profile"> <img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Frank Williams</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                        <div class="msg-profile"> <img src="img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Ashley Wood</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-envelope"></i>Read all messages    </strong></a></li>
                  </ul>
                </li> -->
                <!-- Languages dropdown    -->
                <li class="nav-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><img src="img/flags/16/GB.png" alt="English"><span class="d-none d-sm-inline-block">English</span></a>
                  <ul aria-labelledby="languages" class="dropdown-menu">
                  </ul>
                </li>
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
            <div class="col-lg-3">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Update Stock</h4>
                </div>
                <div class="card-body">
                  <p>Add New Stock Information.</p>
                  <form method="post" action="add_stock.php">
                    <div class="form-group">
                      <label>Drug Name</label>
                      <input type="text" name="drug_name" id="drug_name" placeholder="Drug Name" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Category</label>
                      <input type="text" name="category" id="category" placeholder="Category (Tablet)" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <input type="text" name="description" id="description" placeholder="Description (Pain Killer)" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Company</label>
                      <input type="text" name="company" id="company" placeholder="Company" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Supplier</label>
                      <input type="text" name="supplier" id="supplier" placeholder="Supplier" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Quanity</label>
                      <input type="text" name="quantity" placeholder="Quantity" id="quantity" class="form-control">
                    </div>
                    <div class="form-group">       
                      <label>Cost</label>
                      <input type="text" name="cost" id="cost" placeholder="Cost (2)" class="form-control">
                    </div>
                    <div class="form-group">       
                      <label>Expiry</label>
                      <input type="date" name="expiry" id="expiry" placeholder="20-12-2020" class="form-control">
                    </div>
                    <div class="form-group">       
                      <label>Control</label>
                      <select class="form-control" name="control" id="control">
                                <option>Controlled</option>
                                <option>Not Controlled</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label>Block</label>
                        <select class="form-control" name="Blocked" id="Blocked" >
                            <option>Blocked</option>
                            <option>Unblocked</option>
                        </select>
                    </div>
                    <div class="form-group">       
                      <input type="submit" name="submit" value="Add Stock" class="btn btn-primary">
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-9">
              <div class="card">
                <div class="card-header">
                  <h4>Current Stock</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <?php
                    include_once('connect_db.php');
                    $mid = intval($_GET['stock_id']);
                    $result = mysql_query("SELECT * FROM stock where stock_id = $mid") or die(mysql_error());
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
                          <th>Control</th>
                          <th>Block</th>
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
                                $finaldate = floor($diff/(60*60*24));
                                echo '<td>' .$finaldate. '</td>';
                                $i++;
                            } while ($i <= 0);
                            echo '<td>' .$row['controlled']. '</td>';
                            echo '<td>' .$row['Blocked']. '</td>';
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