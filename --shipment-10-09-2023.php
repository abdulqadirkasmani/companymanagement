<?php ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
$pageName = 'Shipment'; include('inc/header.php');

 ?>
        <div class="content-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body pt-0">
								<div class="table-responsive active-projects">
									<div class="d-flex justify-content-between align-items-center">
										<div class="tbl-caption px-0">
											<h3 class="heading mb-0">Shipments</h4>
										</div>
										<a href="add-shipment" class="btn btn-primary">Add Shipment</a>
									</div>
									<table id="example" class="display table" style="min-width: 845px">
										<thead>
											<tr>
												<th>File #.</th>
												<th>Party Ref</th>
												<th>Invoice Value</th>
												<th>Pkgs</th>
												<th>Iterm Desc</th>
												<th>Consignor Name</th>
												<th>Copy Docs Rcvd On</th>
												<th>Original Docs Status</th>
												<th>F.I Status</th>
												<th>Shipment Arrival</th>
												<th>Funds Demand</th>
												<th>GD Status</th>
												<th>D/O Status</th>
												<th>Delivery Status</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												$selectshipments = mysqli_query($con, "SELECT * FROM `shipment` ORDER BY id DESC");
												if(mysqli_num_rows($selectshipments) > 0) {
													while($shipments_arr = mysqli_fetch_array($selectshipments)) {
														$totalPackage = '0 Box';
														if($shipments_arr['package_no'] != '') {
															$pkg_no = explode('||', $shipments_arr['package_no']);
															$totalPackage = count($pkg_no);
															if($totalPackage > 1) {
																$totalPackage .= ' Boxes';
															} else {
																$totalPackage .= ' Box';
															}
														}

														$consignment_mode = $shipments_arr['shipment_mode'];

														$copy_docx_rcvd_on = '';
														$original_docx_rcvd_on = '';
														$fi_status = '';
														if($consignment_mode != 'Air LCL') {
															
															if($shipments_arr['sea_bl_copy_status'] == 'Received') {
																$copy_docx_rcvd_on = '<span class="badge badge-success">'. $shipments_arr['sea_bl_copy_received_date'] .'</span>';
															} else if($shipments_arr['sea_bl_copy_status'] == 'Pending') {
																$copy_docx_rcvd_on = '<span class="badge badge-danger">'. $shipments_arr['sea_bl_copy_status'] .'</span>';
															}

															if($shipments_arr['sea_bl_original_status'] == 'Received') {
																$original_docx_rcvd_on = '<span class="badge badge-success">'. $shipments_arr['sea_bl_original_received_date'] .'</span>';
															} else if($shipments_arr['sea_bl_original_status'] == 'Pending') {
																$original_docx_rcvd_on = '<span class="badge badge-danger">'. $shipments_arr['sea_bl_original_status'] .'</span>';
															}


															if($shipments_arr['sea_fl_approved_date'] != '') {
																$fi_status = '<span class="badge badge-success">'. $shipments_arr['sea_fl_approved_date'] .'</span>';
															} else {
																$fi_status = '<span class="badge badge-danger">Pending</span>';
															}

														} else {
															if($shipments_arr['air_lc_status'] == 'Received') {
																$copy_docx_rcvd_on = '<span class="badge badge-success">'. $shipments_arr['air_lc_received_date'] .'</span>';
															} else if($shipments_arr['air_lc_status'] == 'Pending') {
																$copy_docx_rcvd_on = '<span class="badge badge-danger">'. $shipments_arr['air_lc_status'] .'</span>';
															}

															if($shipments_arr['air_invoice_status'] == 'Received') {
																$original_docx_rcvd_on = '<span class="badge badge-success">'. $shipments_arr['air_invoice_received_date'] .'</span>';
															} else if($shipments_arr['air_invoice_status'] == 'Pending') {
																$original_docx_rcvd_on = '<span class="badge badge-danger">'. $shipments_arr['air_invoice_status'] .'</span>';
															}

															if($shipments_arr['air_fl_approved_date'] != '') {
																$fi_status = '<span class="badge badge-success">'. $shipments_arr['air_fl_approved_date'] .'</span>';
															} else {
																$fi_status = '<span class="badge badge-danger">Pending</span>';
															}
														}

														if($shipments_arr['shipment_arrival'] != '') {
															$shipment_arrival = '<span class="badge badge-success">'. $shipments_arr['shipment_arrival'] .'</span>';
														} else {
															$shipment_arrival = '<span class="badge badge-danger">Pending</span>';
														}
														if($shipments_arr['funds_demand_send_on'] != '') {
															$funds_demand_send_on = '<span class="badge badge-success">'. $shipments_arr['funds_demand_send_on'] .'</span>';
														} else {
															$funds_demand_send_on = '<span class="badge badge-danger">Pending</span>';
														}
														if($shipments_arr['do_collect_on'] != '') {
															$do_collect_on = '<span class="badge badge-success">'. $shipments_arr['do_collect_on'] .'</span>';
														} else {
															$do_collect_on = '<span class="badge badge-danger">Pending</span>';
														}
														if($shipments_arr['shipment_delivered_on'] != '') {
															$shipment_delivered_on = '<span class="badge badge-success">'. $shipments_arr['shipment_delivered_on'] .'</span>';
														} else {
															$shipment_delivered_on = '<span class="badge badge-danger">Pending</span>';
														}

														$gd_status = $shipments_arr['gd_status'];
														if($gd_status != '') {
															$gdStatusArr = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM gd_status WHERE id = $gd_status"));
															$gd_status_name = $gdStatusArr['name'];
														}
												 ?>
													<tr>
														<td><?php echo $shipments_arr['file_no']; ?></td>
														<td><?php echo $shipments_arr['party_refrence']; ?></td>
														<td>USD <?php echo ($shipments_arr['invoice_value'] != '') ? $shipments_arr['invoice_value'] : '-'; ?></td>
														<td><?php echo $totalPackage;?></td>
														<td><?php echo $shipments_arr['item_description']; ?></td>
														<td><?php echo $shipments_arr['consignor_name']; ?></td>
														<td><?php echo $copy_docx_rcvd_on; ?></td>
														<td><?php echo $original_docx_rcvd_on; ?></td>
														<td><?php echo $fi_status; ?></td>
														<td><?php echo $shipment_arrival; ?></td>
														<td><?php echo $funds_demand_send_on; ?></td>
														<td><span class="badge badge-warning"><?php echo $gd_status_name; ?></span></td>
														<td><?php echo $do_collect_on; ?></td>
														<td><?php echo $shipment_delivered_on; ?></td>
														<td>
															<div class="d-flex align-items-center justify-content-end">
																<a href="view-shipment?id=<?php echo $shipments_arr['id'] ?>" class="btn btn-sm btn-primary me-2"><i class="bi bi-eye"></i></a>
																<a href="add-shipment?id=<?php echo $shipments_arr['id'] ?>" class="btn btn-sm btn-primary me-2"><i class="bi bi-pencil-square"></i></a>
																<a href="javascript::" class="btn btn-sm btn-danger delete-shipment" data-id="<?php echo $shipments_arr['id'] ?>"><i class="bi bi-trash"></i></a>
															</div>
														</td>
													</tr>
												<?php } 
												}?>
										</tbody>
									</table>
								</div>
								
							</div>
						</div>
						
					
					</div>
				</div>
			</div>
        </div>
		
        <!--**********************************
            Content body end
        ***********************************-->

<?php include('inc/footer.php'); ?>
<script>
	jQuery('.delete-shipment').click(function(){
		var curId = jQuery(this).data('id');
		var curRow = jQuery(this);
		Swal.fire({
		  icon: 'warning',
		  title: 'Warning',
		  text: 'Do you want to delete this shipment?',
		  allowOutsideClick: false,
		  showDenyButton: true,
		  confirmButtonText: 'Yes',
		}).then((result) => {
			if(result.isConfirmed) {
			  $.ajax({
			        url: 'actions/ajax.php',
			        type: 'POST',
			        data: {
			        	shipment_id : curId,
			        	reason : 'delete_shipment'
			        },
			        success: function (response) {
			        	console.log(response);
			            response = JSON.parse(response);
						if(response.error == 'yes') {
							Swal.fire({
							  icon: 'error',
							  title: 'Oops...',
							  text: response.message,
							})
						} else {
							Swal.fire({
							  icon: 'success',
							  title: response.message,
							}).then((result) => {
							  curRow.parents('tr').hide();
							})
						}
			        },
			    });	
				
			}
		})
	})

	jQuery('.shipment_status').change(function(){
		var curForm = jQuery(this).parents('form')[0];
		var formData = new FormData(curForm);
	    formData.append("reason", "shipment_status");
	    $.ajax({
	        url: 'actions/ajax.php',
	        type: 'POST',
	        data: formData,
	        success: function (response) {
	        	console.log(response);
	            response = JSON.parse(response);
				if(response.error == 'yes') {
					Swal.fire({
					  icon: 'error',
					  title: 'Oops...',
					  text: response.message,
					})
				} else {
					Swal.fire({
					  icon: 'success',
					  title: response.message,
					})
				}
	        },
	        cache: false,
	        contentType: false,
	        processData: false
	    });	
	})
</script>