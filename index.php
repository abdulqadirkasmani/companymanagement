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
												<th>Address</th>
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
														<td><?php echo $clients_arr['address']; ?></td>
														<td><?php echo $clients_arr['city']; ?></td>
														<td><?php echo $clients_arr['ntn']; ?></td>
														<td><?php echo $clients_arr['str']; ?></td>
														<td>
															<div class="d-flex align-items-center justify-content-end">
																<form action="" method="post" class="program-form me-2">
																	<input type="hidden" value="<?php echo $clients_arr['id'] ?>" name="id">
																	<select class="default-select form-control wide client_status" name="status">
																		<option value="active" <?php if($clients_arr['status'] == 'active') { echo "selected"; } ?>>Active</option>
																		<option value="deactivate" <?php if($clients_arr['status'] == 'deactivate') { echo "selected"; } ?>>Deactivate</option>
					                                                </select>
																</form>
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

<?php include('inc/footer.php'); ?>
<script>
	jQuery('.delete-client').click(function(){
		var curId = jQuery(this).data('id');
		var curRow = jQuery(this);
		Swal.fire({
		  icon: 'warning',
		  title: 'Warning',
		  text: 'Do you want to delete this client?',
		  allowOutsideClick: false,
		}).then((result) => {
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