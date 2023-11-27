<?php ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
$pageName = 'GD Status'; include('inc/header.php');
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
											<h3 class="heading mb-0">GD Status</h4>
										</div>
									</div>
									<table id="example" class="display table" style="min-width: 845px">
										<thead>
											<tr>
												<th>S.No</th>
												<th>Name</th>
												<?php if($_SESSION['role'] == 'admin') { ?>
												<th>Actions</th>
											<?php } ?>
											</tr>
										</thead>
										<tbody>
											<?php 
												$selectgd_status = mysqli_query($con, "SELECT * FROM `gd_status` ORDER BY id DESC");
												if(mysqli_num_rows($selectgd_status) > 0) {
													$sno = 1;
													while($gd_status_arr = mysqli_fetch_array($selectgd_status)) {
												 ?>
													<tr>
														<td><?php echo $sno++; ?></td>
														<td><?php echo $gd_status_arr['name']; ?></td>
														<?php if($_SESSION['role'] == 'admin') { ?>
														<td>
															<div class="d-flex align-items-center justify-content-end">
																<a href="javascript::" class="btn btn-sm btn-danger delete" data-id="<?php echo $gd_status_arr['id'] ?>"><i class="bi bi-trash"></i></a>
															</div>
														</td>
													<?php } ?>
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
	jQuery('.delete').click(function(){
		var curId = jQuery(this).data('id');
		var curRow = jQuery(this);
		Swal.fire({
		  icon: 'warning',
		  title: 'Warning',
		  text: 'Do you want to delete it?',
		  allowOutsideClick: false,
		  showDenyButton: true,
		  confirmButtonText: 'Yes',
		}).then((result) => {
			if(result.isConfirmed) {
			  $.ajax({
			        url: 'actions/ajax.php',
			        type: 'POST',
			        data: {
			        	id : curId,
			        	reason : 'delete_shipment_fields',
			        	tablename: 'gd_status'
			        },
			        success: function (response) {
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
</script>