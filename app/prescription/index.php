<?php
	require '../includes/header.php';
	require '../functions/functions.php';
?>

	<!-- Breadcrumb-->
    <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Prescription</li>
          </ul>
        </div>
    </div>
    <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Prescription</h1>
          </header>
          <div class="row">
          	<div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                	<div class="row">
                		<div class="col-md-6">
                			<h4>Prescription</h4>
                		</div>
                		<div class="col-md-6" align="right">
                			<button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="add_button" data-toggle="modal" data-target="#addPrescriptionModal"><i class="fas fa-calendar-plus fa-sm text-white-50"></i> Add Prescription</button>
                		</div>
                	</div>
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
					<table class="table table-bordered" id="prescriptions" width="100%" cellspacing="0">
						<thead>
							<tr>
							  <th></th>
								<th>Patient</th>
								<th>Date</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php echo getPrescrition($connect)?>
						</tbody>
						<tfoot>
							<tr>
							  <th></th>
								<th>Patient</th>
								<th>Date</th>
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
    <div class="modal fade" id="addPrescriptionModal" tabindex="-1" role="dialog" aria-labelledby="prescriptionModal" aria-hidden="true">
	 	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
	    	<div class="modal-content">
	    		<div class="modal-header">
	    			Prescription Management
	    		</div>
	    		<div class="modal-body">
	    			<form method="post" id="add-prescription">
                <div class="form-group">
                  <label>Patient</label>
                  <select class="form-control" id="patient" name="patient">
                  	<?php echo getPatient($connect) ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Postal Address</label>
                  <textarea class="form-control" id="postal_address" name="postal_address"></textarea>
                </div>
                <div class="form-group">
                  <label>Phone</label>
                  <input type="text" name="phone" id="phone" placeholder="" class="form-control">
                </div>
                <div class="form-group">
                	<div class="row">
                		<div class="col-md-12">
                			<div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="40%">Item/Description</th>
                                    <th>Strength</th>
                                    <th>Dose</th>
                                    <th>Quantity</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="prescription_lines">
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Item/Description</th>
                                    <th>Strength</th>
                                    <th>Dose</th>
                                    <th>Quantity</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800"></h1>
                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" align="right" id="add_line_button"><i class="fas fa-calendar-plus fa-sm text-white-50"></i> Add</a>
                        </div>
                    </div>
                		</div>
                	</div>
                </div>
                <div class="form-group">       
                  <input type="submit" name="submit" id="submit" value="Add Prescription" class="btn btn-primary">
                  <input type="hidden" name="action" id="action" value="add-prescription">
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
<script src="prescription.js"></script>
<script type="text/javascript">
	$(document).ready(function(){

		$('#prescriptions').DataTable();


		var counts = 0;
    var rowCount = 0;
    $(document).on('click', '#add_line_button', function(){
      rowCount = $('#prescription_lines tr').length;
      if (rowCount<1) {
        counts = counts + 1;
      }
      else{
        counts = rowCount + 1;
      }
      add_support(counts);
    });

    $(document).on('click', '#del', function()
    {
      var row_s_id = $(this).attr("value");
      $('#row_s_id'+row_s_id).remove();
      counts --;
    });

		function add_support(counts = '')
        {
            var html = '';
            counts ++;
            html += '<tr id="row_s_id'+counts+'">';
                html += '<td>';
                  html += '<select id="drug_id'+counts+'" name="drug_id[]" class="form-control description"><?php echo getDrugs($connect)?></select>';
                html += '</td>';
                html += '<td>';
                    html += '<input type="text" class="form-control quantity" id="strength'+counts+'" name="strength[]">';
                html += '</td>';
                html += '<td>';
                    html += '<input type="text" name="dose[]" id="dose'+counts+'" class="form-control " >';
                html += '</td>';
                html += '<td>';
                      html += '<input type="number" name="quantity[]" id="quantity'+counts+'" step="any" class="form-control">';
                html += '</td>';
                html += '<td>';
                      html += '<button type="button" id="del" value="'+counts+'" class="btn btn-danger" style="postion:relative">x</button>'
                html += '</td>';
            html += '</tr>';

            $('#prescription_lines').append(html);

        }
	})
</script>