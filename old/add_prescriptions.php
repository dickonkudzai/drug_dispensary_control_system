<?php
  session_start();
  include_once('connect_db.php');
  if(isset($_SESSION['username']))
    {
      $id=$_SESSION['pharmacist_id'];
      $fname=$_SESSION['first_name'];
      $lname=$_SESSION['last_name'];
      $sid=$_SESSION['staff_id'];
      $user=$_SESSION['username'];
    }
    else
      {
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
          <div class="sidenav-header-inner text-center"><a href="profile.php?pharmacist_id=<?php echo $id;?>"><i class="icon-user"></i><!-- <img src="img/avatar-7.jpg" alt="person" class="img-fluid rounded-circle"> -->
            <h2 class="h5"><?php echo $user;?></h2><span>Pharmacist</span></a>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo">
            <a href="pharmacist.php" class="brand-small text-center"> 
              <strong>DA</strong>
              <strong class="text-primary">CS</strong>
            </a>
          </div>
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
              <div class="navbar-header">
                <a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="pharmacist.php" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block">
                    <span>Drug Analysis</span>
                    &nbsp&&nbsp
                    <strong class="text-primary">Control System</strong>
                  </div>
                </a>
              </div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Languages dropdown    -->
                <li class="nav-item dropdown">
                  <a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle">
                    <img src="img/flags/16/GB.png" alt="English">
                    <span class="d-none d-sm-inline-block">English</span>
                  </a>
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
            <li class="breadcrumb-item active">Forms       </li>
          </ul>
        </div>
      </div>
      <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Forms</h1>
          </header>
          <div class="row"></div>
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Manager</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Pharmacist</a>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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
                            while ($row = mysql_fetch_array($result))
                              {
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
                                  echo"</tr>";
                                echo"</tbody>";
                              }
                          echo "</table>";
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <h4>Add Prescription</h4>
                    </div>
                    <div class="card-body">
                      <p>Add New Prescription.</p>
                      <form method="post" action="invoice.php">
                        <div class="form-group">
                          <label>Customer ID</label>
                          <input type="text" name="customer_id" id="customer_id" placeholder="Customer ID" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Customer Name</label>
                          <input type="text" name="customer_name" id="customer_name" placeholder="Customer Name" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Age</label>
                          <input type="text" name="age" id="age" placeholder="Age" class="form-control">
                        </div>
                        <div class="form-group">       
                          <label>Gender</label>
                          <select class="form-control" name="sex" id="sex">
                                    <option>Female</option>
                                    <option>Male</option>
                                    <option>Other</option>
                                </select>
                        </div>
                        <div class="form-group">
                          <label>Postal Address</label>
                          <input type="text" name="postal_address" id="postal_address" placeholder="Postal Address" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Phone</label>
                          <input type="text" name="phone" placeholder="Phone" id="phone" class="form-control">
                        </div>
                        <div class="form-group">       
                          <label>Strength</label>
                          <input type="text" name="strength" id="strength" placeholder="Strength" class="form-control">
                        </div>
                        <div class="form-group">       
                          <label>Dose</label>
                          <input type="text" name="dose" id="dose" placeholder="Dose" class="form-control">
                        </div>
                        <div class="form-group">       
                          <label>Quantity</label>
                          <input type="text" name="quantity" id="quantity" placeholder="Quantity" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Select Drug</label>
                          <?php
                            echo"<select class=\"form-control\" name=\"drug_name\"  id=\"drug_name\">";
                            $getpayType=mysql_query("SELECT drug_name FROM stock WHERE Blocked != 'Blocked'");
                            echo"<option>Select Drug</option>";
                            while($pType=mysql_fetch_array($getpayType))
                              {
                                echo"<option>".$pType['drug_name']."</option>";
                               }
                            echo"</select>";
                          ?>
                        </div>
                        <div class="form-group">       
                          <input type="submit" name="submit" value="Add Stock" class="btn btn-primary">
                        </div>
                      </form>
                      <script>
                        document.getElementById('drug_name').selectedIndex = 0;
                      </script>
                    </div>
                  </div>
                <!--</div>-->
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
                <div id="viewer">
                  <span id="viewer2"></span>
                </div>
                <?php
                  $invNum= mysql_query ("SELECT 1+MAX(invoice_id) FROM invoice");
                  $invoice=mysql_fetch_array($invNum);
                  if($invoice[0]=='')
                    {
                      $invoiceNo=10;
                    }
                    else
                      {
                        $invoiceNo=$invoice[0];
                      }
                  $_SESSION['invoice']=$invoiceNo;
                ?>
              </div>
            </div>
        </div>
          <!-- </div> -->
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
    <script type="text/javascript" SRC="js/superfish/hoverIntent.js"></script>
    <script type="text/javascript" SRC="js/superfish/superfish.js"></script>
    <script type="text/javascript" SRC="js/superfish/supersubs.js"></script>
    <script type="text/javascript">
  		$(document).ready(function()
        { 
          $("ul.sf-menu").supersubs(
            { 
              minWidth:    12, 
  				    maxWidth:    27, 
  				    extraWidth:  1    				  
            }).superfish();				
  		  }); 
    </script>
  	<script>
      function validateForm()
        {
          var value = document.myform.customer_name.value;
          if(value.match(/^[a-zA-Z]+(\s{1}[a-zA-Z]+)*$/))
            {
              return true;
            } 
            else
              {
                alert('Name Cannot contain numbers');
                return false;
              }
        }
    </script>
    <script SRC="js/cufon-yui.js" type="text/javascript"></script>
    <script SRC="js/jquery.pngFix.pack.js"></script>
  </body>
</html>