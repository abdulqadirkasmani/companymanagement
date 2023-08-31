<?php ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
$pageName = 'Shipment'; include('inc/header.php');
 ?>
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
                        <form action="" method="post" class="create-shipment-form">
							<div class="card">
	                            <div class="card-header">
		                                <h4 class="card-title">Add Shipment</h4>
	                            </div>
	                            <div class="card-body">
	                                <div class="basic-form">
                                        <div class="row">
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">File #</label>
                                                <input type="text" class="form-control" name="file_no" autocomplete="new-password" readonly="">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Date</label>
                                                <input type="date" class="form-control" name="date" autocomplete="new-password">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Category</label>
                                                <select class="form-control" name="category" autocomplete="new-password">
                                                    <option>Import</option>
                                                    <option>Export</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">GD Type</label>
                                                <select class="form-control" name="gd_type" autocomplete="new-password">
                                                    <option>HC</option>
                                                    <option>HC</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Shipment Type</label>
                                                <select class="form-control" name="shipment_type" autocomplete="new-password">
                                                    <option>FCL</option>
                                                    <option>FCL</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Mode Of Shipment</label>
                                                <select class="form-control" name="shipment_mode" autocomplete="new-password">
                                                    <option>By Sea</option>
                                                    <option>By Air</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Port Of Discharge</label>
                                                <select class="form-control" name="discharge_port" autocomplete="new-password">
                                                    <option>KICT</option>
                                                    <option>KICT 2</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Collectorate</label>
                                                <select class="form-control" name="collectorate" autocomplete="new-password">
                                                    <option>KICT</option>
                                                    <option>KICT 2</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">B/L</label>
                                                <input type="text" class="form-control" name="b_l" autocomplete="new-password">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Party Refrence</label>
                                                <input type="text" class="form-control" name="party_refrence" autocomplete="new-password">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Other Refrence</label>
                                                <input type="text" class="form-control" name="other_refrence" autocomplete="new-password">
                                            </div>
                                        </div>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="card">
	                            <div class="card-header">
	                                <h4 class="card-title">Customer Information</h4>
	                            </div>
	                            <div class="card-body">
	                                <div class="basic-form">
                                        <div class="row">
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Client Name</label>
                                                <select class="form-control" name="client" autocomplete="new-password">
                                                    <option>James</option>
                                                    <option>Bob</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Importer</label>
                                                <input type="text" class="form-control" name="importer" autocomplete="new-password">
                                            </div>
                                        </div>
	                                </div>
	                            </div>
	                        </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Shipment Information</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <div class="row">
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Shipping Line</label>
                                                <select class="form-control" name="shipping_line" autocomplete="new-password">
                                                    <option>Maersk Pakistan Pvt. Ltd</option>
                                                    <option>Maersk Pakistan Pvt. Ltd 2</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">No. Of Packages</label>
                                                <input type="number" class="form-control" name="package_no" autocomplete="new-password">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Package Type</label>
                                                <select class="form-control" name="shipping_line" autocomplete="new-password">
                                                    <option>Box</option>
                                                    <option>Carton</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">General Information</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <div class="row">
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Port Of Shipment</label>
                                                <input type="text" class="form-control" name="shipment_port" autocomplete="new-password">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Quantity</label>
                                                <input type="text" class="form-control" name="quantity" autocomplete="new-password">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Mode Of Quantity</label>
                                                <select class="form-control" name="quantity_mode" autocomplete="new-password">
                                                    <option>KG</option>
                                                    <option>Liters</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Net Weight KGs</label>
                                                <input type="text" class="form-control" name="net_weight" autocomplete="new-password">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Gross Weight KGs</label>
                                                <input type="text" class="form-control" name="gross_weight" autocomplete="new-password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-3 offset-md-9 text-end">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
					</div>
				</div>
			</div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

<?php include('inc/footer.php'); ?>
<script>
	jQuery('.create-shipment-form').submit(function(e){
		e.preventDefault(); // avoid to execute the actual submit of the form.
		var formData = new FormData(this);
	    formData.append("reason", "create-shipment");
	    $.ajax({
	        url: 'actions/ajax.php',
	        type: 'POST',
	        data: formData,
	        success: function (response) {
                console.log(response);
	   //          response = JSON.parse(response);
				// if(response.error == 'no') {
				// 	Swal.fire({
				// 	  icon: 'success',
				// 	  title: response.message,
				// 	}).then((result) => {
				// 	  window.open('/shipment', '_SELF');
				// 	})
				// } else {
				// 	Swal.fire({
				// 	  icon: 'error',
				// 	  title: 'Oops...',
				// 	  text: response.message,
				// 	})
				// }
	        },
	        cache: false,
	        contentType: false,
	        processData: false
	    });	
	})

  </script>