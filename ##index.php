<?php ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
$pageName = 'Clients'; include('inc/header.php');
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
											<h3 class="heading mb-0">Clients</h4>
										</div>
										<a href="add-client" class="btn btn-primary">Add Client</a>
									</div>
									<table id="example" class="display table" style="min-width: 845px">
										<thead>
											<tr>
												<th>S.No</th>
												<th>Name</th>
												<th>Email</th>
												<th>Phone</th>
												<th>City</th>
												<th>NTN</th>
												<th>STR</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												$selectclients = mysqli_query($con, "SELECT * FROM `client` ORDER BY id DESC");
												if(mysqli_num_rows($selectclients) > 0) {
													$sno = 1;
													while($clients_arr = mysqli_fetch_array($selectclients)) {
												 ?>
													<tr>
														<td><?php echo $sno++; ?></td>
														<td><?php echo $clients_arr['name']; ?></td>
														<td><?php echo $clients_arr['email']; ?></td>
														<td><?php echo $clients_arr['phone']; ?></td>
														<td><?php echo $clients_arr['city']; ?></td>
														<td><?php echo $clients_arr['ntn']; ?></td>
														<td><?php echo $clients_arr['str']; ?></td>
														<td>
															<div class="d-flex align-items-center justify-content-end">
																<!-- <form action="" method="post" class="program-form me-2">
																	<input type="hidden" value="<?php // echo $clients_arr['id'] ?>" name="id">
																	<select class="default-select form-control wide client_status" name="status">
																		<option value="active" <?php // if($clients_arr['status'] == 'active') { echo "selected"; } ?>>Active</option>
																		<option value="deactivate" <?php  // if($clients_arr['status'] == 'deactivate') { echo "selected"; } ?>>Deactivate</option>
					                                                </select>
																</form> -->
																<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#viewClient" class="view-client btn btn-sm btn-success me-2" data-id="<?php echo $clients_arr['id'] ?>"><i class="bi bi-eye"></i></a>
																<a href="add-client?id=<?php echo $clients_arr['id'] ?>" class="btn btn-sm btn-primary me-2"><i class="bi bi-pencil-square"></i></a>
																<a href="javascript::" class="btn btn-sm btn-danger delete-client" data-id="<?php echo $clients_arr['id'] ?>"><i class="bi bi-trash"></i></a>
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
        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="viewClient">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Client Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table display table-bordered">
                        	<tr>
                        		<th>Name</th>
                        		<td class="client-cnt client_name"></td>
                        	</tr>
                        	<tr>
                        		<th>Email</th>
                        		<td class="client-cnt client_email"></td>
                        	</tr>
                        	<tr>
                        		<th>Phone</th>
                        		<td class="client-cnt client_phone"></td>
                        	</tr>
                        	<tr>
                        		<th>Address</th>
                        		<td class="client-cnt client_address"></td>
                        	</tr>
                        	<tr>
                        		<th>City</th>
                        		<td class="client-cnt client_city"></td>
                        	</tr>
                        	<tr>
                        		<th>NTN</th>
                        		<td class="client-cnt client_ntn"></td>
                        	</tr>
                        	<tr>
                        		<th>STR</th>
                        		<td class="client-cnt client_str"></td>
                        	</tr>
                        </table>
                        <h4>Bank Details</h4>
                        <table class="table display table-bordered">
                        	<tr>
                        		<th>Bank Name</th>
                        		<td class="client-cnt client_bank_name"></td>
                        	</tr>
                        	<tr>
                        		<th>Account No.</th>
                        		<td class="client-cnt client_account_no"></td>
                        	</tr>
                        	<tr>
                        		<th>Account Title</th>
                        		<td class="client-cnt client_account_title"></td>
                        	</tr>
                        	<tr>
                        		<th>Branch Name</th>
                        		<td class="client-cnt client_branch_name"></td>
                        	</tr>
                        	<tr>
                        		<th>Branch Code</th>
                        		<td class="client-cnt client_branch_code"></td>
                        	</tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


<?php include('inc/footer.php'); ?>
<script>
	jQuery('.view-client').click(function(){
		var curId = jQuery(this).data('id');
		$.ajax({
	        url: 'actions/ajax.php',
	        type: 'POST',
	        data: {
	        	client_id : curId,
	        	reason : 'view_client'
	        },
	        success: function (response) {
	        	response = JSON.parse(response);
        		jQuery('.client_account_no').html(response.account_no);
				jQuery('.client_account_title').html(response.account_title);
				jQuery('.client_address').html(response.address);
				jQuery('.client_bank_name').html(response.bank_name);
				jQuery('.client_branch_code').html(response.branch_code);
				jQuery('.client_branch_name').html(response.branch_name);
				jQuery('.client_city').html(response.city);
				jQuery('.client_email').html(response.email);
				jQuery('.client_name').html(response.name);
				jQuery('.client_ntn').html(response.ntn);
				jQuery('.client_phone').html(response.phone);
				jQuery('.client_status').html(response.status);
				jQuery('.client_str').html(response.str);
	        },
	    });	
	
	})

	jQuery('.delete-client').click(function(){
		var curId = jQuery(this).data('id');
		var curRow = jQuery(this);
		Swal.fire({
		  icon: 'warning',
		  title: 'Warning',
		  text: 'Do you want to delete this client?',
		  allowOutsideClick: false,
		  showDenyButton: true,
		  confirmButtonText: 'Yes',
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
				        url: 'actions/ajax.php',
				        type: 'POST',
				        data: {
				        	client_id : curId,
				        	reason : 'delete_client'
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


	jQuery('.client_status').change(function(){
		var curForm = jQuery(this).parents('form')[0];
		var formData = new FormData(curForm);
	    formData.append("reason", "client_status");
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