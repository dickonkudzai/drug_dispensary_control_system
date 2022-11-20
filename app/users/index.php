<?php
	require '../includes/header.php';
	require '../functions/functions.php';
?>

	<!-- Breadcrumb-->
    <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Users</li>
          </ul>
        </div>
    </div>
    <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Users</h1>
          </header>
          <div class="row">
          	<div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                	<div class="row">
                		<div class="col-md-6">
                			<h4>Users</h4>
                		</div>
                		<div class="col-md-6" align="right">
                			<button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="add_button" data-toggle="modal" data-target="#addUserModal"><i class="fas fa-calendar-plus fa-sm text-white-50"></i> Add User</button>
                		</div>
                	</div>
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
					<table class="table table-bordered" id="users" width="100%" cellspacing="0">
						<thead>
							<tr>
							    <th></th>
								<th>Username</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>DOB</th>
								<th>Access Level</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php echo getUsers($connect) ?>
						</tbody>
						<tfoot>
							<tr>
							  <th></th>
								<th>Username</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>DOB</th>
								<th>Access Level</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>
						</tfoot>
					</table>
				</div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="usersModal" aria-hidden="true">
	 	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
	    	<div class="modal-content">
	    		<div class="modal-header">
	    			User Management
	    		</div>
	    		<div class="modal-body">
	    			<form method="post" id="add-user">
	                    <div class="form-group">
	                      <label>First Name</label>
	                      <input type="text" name="first_name" id="first_name" placeholder="First Name" class="form-control">
	                    </div>
	                    <div class="form-group">
	                      <label>Last Name</label>
	                      <input type="text" name="last_name" id="last_name" placeholder="Last Name" class="form-control">
	                    </div>
	                    <div class="form-group">
	                      <label>username</label>
	                      <input type="text" name="username" id="username" placeholder="Username" class="form-control">
	                    </div>
	                    <div class="form-group">       
	                      <label>DOB</label>
	                      <input type="date" name="dob" id="dob" class="form-control">
	                    </div>
	                    <div class="form-group">       
	                      <label>Access Level</label>
	                      <select class="form-control" name="access_level" id="access_level">
	                      	<?php echo getAccessLevels($connect)?>
	                      </select>
	                    </div>
	                    <div class="form-group">       
	                      <input type="submit" name="submit" id="submit" value="Add User" class="btn btn-primary">
	                      <input type="hidden" name="action" id="action" value="add-user">
	                    </div>
	                  </form>
	    		</div>
	    		<div class="modal-footer">
	    			
	    		</div>
	    	</div>
	    </div>
	</div>
<?php
	require '../includes/footer.php';
?>
<script src="users.js"></script>
<script type="text/javascript">
	$(document).ready(function()
	{
		$('#users').DataTable();
	})
</script>