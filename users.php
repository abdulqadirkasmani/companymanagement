<?php $pageName = 'Users'; include('inc/header.php');
if($_SESSION['role'] != 'admin'){
	header('location:/');
}
 ?>
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
						<div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add User</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="" method="post" class="create-account-form">
                                        <div class="row">
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Fullname</label>
                                                <input type="text" class="form-control" name="fullname" autocomplete="new-password">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" name="sign_email" autocomplete="new-password">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Password</label>
                                                <input type="password" class="form-control" name="sign_password" autocomplete="new-password">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Create Account</button>
                                    </form>
                                </div>
                            </div>
                        </div>

						<div class="card">
							<div class="card-body pt-0">
								<div class="table-responsive active-projects">
									<div class="tbl-caption px-0">
										<h3 class="heading mb-0">Managers</h4>
									</div>
									<table id="example" class="display table" style="min-width: 845px">
										<thead>
											<tr>
												<th style="width: 5%;">Actions</th>
												<th>Name</th>
												<th>Email</th>
												<th>Role</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												$selectUser = mysqli_query($con, "SELECT * FROM `users` WHERE roles = 'manager' ORDER BY id DESC");
												while($user_arr = mysqli_fetch_array($selectUser)) {
											 ?>
												<tr>
													<td style="width: 5%;">
														<div class="dropdown ms-auto text-end c-pointer">
															<div class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
																<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
															</div>
															<div class="dropdown-menu dropdown-menu-end" style="">
																<a class="dropdown-item delete-user" data-id="<?php echo $user_arr['id'] ?>" href="javascript:;">Delete</a>
															</div>
														</div>
													</td>
													<td><?php echo $user_arr['name']; ?></td>
													<td><?php echo $user_arr['email']; ?></td>
													<td><?php echo ucfirst($user_arr['roles']); ?></td>
												</tr>
												<?php } ?>
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
	jQuery('.delete-user').click(function(){
		var curUserId = jQuery(this).data('id');
		var curRow = jQuery(this);
		Swal.fire({
		  icon: 'warning',
		  title: 'Warning',
		  text: 'Do you want to delete this user?',
		  allowOutsideClick: false
		}).then((result) => {
		  $.ajax({
		        url: 'actions/ajax.php',
		        type: 'POST',
		        data: {
		        	user_id : curUserId,
		        	reason : 'delete_user'
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

	jQuery('.create-account-form').submit(function(e){
		e.preventDefault(); // avoid to execute the actual submit of the form.
		var formData = new FormData(this);
	    formData.append("reason", "create-user");
	    $.ajax({
	        url: 'actions/ajax.php',
	        type: 'POST',
	        data: formData,
	        success: function (response) {
	        	console.log(response);
	            response = JSON.parse(response);
	            console.log(response);
				if(response.error == 'no') {
					Swal.fire({
					  icon: 'success',
					  title: response.message,
					}).then((result) => {
					  location.reload(true);
					})
				} else {
					Swal.fire({
					  icon: 'error',
					  title: 'Oops...',
					  text: response.message,
					})
				}
	        },
	        cache: false,
	        contentType: false,
	        processData: false
	    });	
	})
</script>
