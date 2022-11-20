<?php
	require '../includes/header.php';
	require '../functions/functions.php';
?>

	<!-- Breadcrumb-->
    <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Stock</li>
          </ul>
        </div>
    </div>
    <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Stock</h1>
          </header>
          <div class="row">
          	<div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                	<div class="row">
                		<div class="col-md-6">
                			<h4>Stock</h4>
                		</div>
                		<div class="col-md-6" align="right">
                			<button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="add_button" data-toggle="modal" data-target="#addStockModal"><i class="fas fa-calendar-plus fa-sm text-white-50"></i> Add Stock</button>
                		</div>
                	</div>
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
										<table class="table table-bordered" id="drugs" width="100%" cellspacing="0">
											<thead>
												<tr>
												  <th></th>
													<th>Name</th>
													<th>Quantity</th>
													<th>Price</th>
													<th>Prescription</th>
													<th>Status</th>
													<th>Blocked</th>
													<th>Actions</th>
												</tr>
											</thead>
											<tbody>
												<?php echo getStock($connect)?>
											</tbody>
											<tfoot>
												<tr>
												  <th></th>
													<th>Name</th>
													<th>Quantity</th>
													<th>Price</th>
													<th>Prescription</th>
													<th>Status</th>
													<th>Blocked</th>
													<th>Actions</th>
												</tr>
											</tfoot>
											<tbody></tbody>
										</table>
									</div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    <div class="modal fade" id="addStockModal" tabindex="-1" role="dialog" aria-labelledby="stockModal" aria-hidden="true">
	 	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
	    	<div class="modal-content">
	    		<div class="modal-header">
	    			Stock Management
	    		</div>
	    		<div class="modal-body">
	    			<form method="post" id="add-stock">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="drug_name" id="drug_name" placeholder="Name" class="form-control">
              </div>
              <div class="form-group">
                <label>Quantity</label>
                <input type="number" name="quantity" id="quantity" placeholder="" class="form-control">
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" id="description" name="description"></textarea>
              </div>
              <div class="form-group">
                <label>Cost $</label>
                <input type="number" step="any" name="cost" id="cost" placeholder="" class="form-control">
              </div>
              <div class="form-group">
                <label>Price $</label>
                <input type="number" step="any" name="price" id="price" placeholder="" class="form-control">
              </div>
              <div class="form-group">
                <label>Requires Prescription</label>
                <select class="form-control" id="controlled" name="controlled" >
                	<option>Select Option</option>
                	<option value="1">Yes</option>
                	<option value="2">No</option>
                </select>
              </div>
              <div class="form-group">
                <label>Category</label>
                <select class="form-control" id="category" name="category" >
                	<?php echo getDrugCategories($connect) ?>
                </select>
              </div>
              <div class="form-group">
                <label>Supplier</label>
                <select class="form-control" id="supplier" name="supplier" >
                	<?php echo getDrugSuppliers($connect) ?>
                </select>
              </div>
              <div class="form-group">
                <label>Date Supplied</label>
                <input type="date" class="form-control" name="date_supplied" id="date_supplied" value="">
              </div>
              <div class="form-group">
                <label>Expiry</label>
                <input type="date" class="form-control" name="expiry" id="expiry">
              </div>
              <div class="form-group">       
                <input type="submit" name="submit" id="submit" value="Add Stock" class="btn btn-primary">
                <input type="hidden" name="action" id="action" value="add-stock">
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
<script src="stock.js"></script>
<script type="text/javascript">
	$(document).ready(function()
	{
		$('#drugs').DataTable();
	})
</script>