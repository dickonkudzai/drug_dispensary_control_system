<?php
	require '../includes/header.php';
	require '../functions/functions.php';
?>

	<!-- Breadcrumb-->
    <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Cashier</li>
          </ul>
        </div>
    </div>
    <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Cashier</h1>
          </header>
          <div class="row">
          	<div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                	<h4>Cashier</h4>
                  <div align="right">
                    <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="add_button" data-toggle="modal" data-target="#addPrescriptionModal"><i class="fas fa-calendar-plus fa-sm text-white-50"></i> Add Sale</button>
                  </div>
                </div>
                <div class="card-body">
                  <form method="post" id="add-sale">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6">
                          <label>Patient</label>
                          <select class="form-control" id="patient" name="patient">
                            <?php echo getPatient($connect) ?>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label>Payment Type</label>
                          <select class="form-control" id="payment_type" name="payment_type">
                            <?php echo getPaymentTypes($connect) ?>
                          </select>
                        </div>
                      </div>
                      
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="40%">Item/Description</th>
                                        <th>Quantity</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="prescription_lines">
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Item/Description</th>
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
                      <input type="submit" name="submit" id="submit" value="Add Sale" class="btn btn-primary">
                      <input type="hidden" id="served_by" name="served_by" value="<?php echo $_SESSION['id']?>">
                      <input type="hidden" name="action" id="action" value="add-sale">
                    </div>
                  </form>
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
              Select Prescription
            </div>
            <div class="modal-body">
              <ul>
                <?php echo selectPrescriptions($connect)?>
              </ul>
            </div>
            <div class="modal-footer">
              
            </div>
          </div>
        </div>
    </div>
<?php
	require '../includes/footer.php';
?>
<script src="cashier.js"></script>
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
            html += '<select id="drug'+counts+'" name="drug[]" class="form-control drug"><?php echo getUncontrolledDrugs($connect)?>></select> <input type="hidden" name="cost[]" id="cost'+counts+'" value=""/>';
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

    $(document).on('change', '.drug', function(){
      var row = $(this).attr("id").substring(4);
      var drug_id = $(this).val();
      var action = "getDrugPrice";
      $.ajax({
        url:"cashier_action.php",
        method:"post",
        data:{drug_id:drug_id, action:action},
        dataType:"JSON"
      }).done(function(data){
        console.log(data);
        $('#cost'+row).val(data)
      }).fail(function(data){

      })
    })

    $(document).on('click', '.selectedPrescription', function(){
      var prescription_id = $(this).attr('id');
      var action = 'get-prescription';
      $.ajax({
        url:"cashier_action.php",
        method:"post",
        data:{prescription_id:prescription_id, action:action},
        dataType:"JSON"
      }).done(function(data){
        $('#patient').val(data[1]);
        action = 'get-prescription-items';
        $.ajax({
          url:"cashier_action.php",
          method:"post",
          data:{prescription_id:prescription_id, action:action},
          dataType:"JSON"
        }).done(function(data){
          console.log(data)
          var j = 0
          // var html = '';
          $.each(data,function(i,o){
            j=j+1;
            var html = '<tr id="row_s_id'+j+'">';
                html += '<td>';
                  html += '<select id="drug'+j+'" name="drug[]" class="form-control drug" value="'+o.drug_id+'"><?php echo getDrugs($connect)?>></select> <input type="hidden" name="cost[]" id="cost'+j+'" value="'+o.price+'"/>';
                html += '</td>';
                html += '<td>';
                      html += '<input type="number" name="quantity[]" id="quantity'+j+'" step="any" class="form-control" value="'+o.quantity+'">';
                html += '</td>';
                html += '<td>';
                      html += '<button type="button" id="del" value="'+j+'" class="btn btn-danger" style="postion:relative">x</button>'
                html += '</td>';
            html += '</tr>';
            $('#prescription_lines').append(html);
            $('#drug'+j).val(o.drug_id);
          });
          // $('#prescription_lines').append(html);
          $('#addPrescriptionModal').modal('hide');
        }).fail(function(data){
          console.log(data);
        })
      }).fail(function(data){
        console.log(data)
      })
    })
	})
</script>