<?php ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
$pageName = 'Client'; include('inc/header.php');
 ?>
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
                    <?php if(isset($_GET['id'])) { 
                            $client_id = $_GET['id'];
                            $client_arr = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM client WHERE id = $client_id"));
                        ?>
                		<form action="" method="post" class="create-client-form">
                            <input type="hidden" name="id" value="<?php echo $client_id; ?>">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"><img src="images/img/client.png">Update Client</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" name="name" autocomplete="new-password" value="<?php echo $client_arr['name']; ?>" required="">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email" value="<?php echo $client_arr['email']; ?>" autocomplete="new-password">
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">Address</label>
                                                <textarea class="form-textarea form-control" name="address" autocomplete="new-password"><?php echo $client_arr['address']; ?></textarea>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">City</label>
                                                <select class="form-control" name="city" autocomplete="new-password">
                                                    <option value="">Select City</option>
                                                    <?php include('inc/cities.php'); ?>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Phone Number / Landline</label>
                                                <input type="tel" class="form-control" name="phone" value="<?php echo $client_arr['phone']; ?>" autocomplete="new-password">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">NTN</label>
                                                <input type="text" class="form-control" name="ntn"  value="<?php echo $client_arr['ntn']; ?>" autocomplete="new-password">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">STR Number</label>
                                                <input type="text" class="form-control" name="str"  value="<?php echo $client_arr['str']; ?>" autocomplete="new-password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"><img class="bnkinfo" src="images/img/document.png">Bank Information</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Bank Name</label>
                                                <input type="text" class="form-control" name="bank_name"  value="<?php echo $client_arr['bank_name']; ?>" autocomplete="new-password">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Account / IBAN Number</label>
                                                <input type="text" class="form-control" name="account_no"  value="<?php echo $client_arr['account_no']; ?>" autocomplete="new-password">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Account Title</label>
                                                <input type="text" class="form-control" name="account_title"  value="<?php echo $client_arr['account_title']; ?>" autocomplete="new-password">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Branch Name</label>
                                                <input type="text" class="form-control" name="branch_name"  value="<?php echo $client_arr['branch_name']; ?>" autocomplete="new-password">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Branch Code</label>
                                                <input type="text" class="form-control" name="branch_code"  value="<?php echo $client_arr['branch_code']; ?>" autocomplete="new-password">
                                            </div>
                                            <div class="mb-3 col-md-3 offset-md-9 text-end">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php } else { ?>

                        <form action="" method="post" class="create-client-form">
							<div class="card">
	                            <div class="card-header">
		                                <h4 class="card-title"><img src="images/img/client.png">Add Client</h4>
	                            </div>
	                            <div class="card-body">
	                                <div class="basic-form">
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" name="name" autocomplete="new-password" required="">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email" autocomplete="new-password">
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">Address</label>
                                                <textarea class="form-textarea form-control" name="address" autocomplete="new-password"></textarea>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">City</label>
                                                <select class="form-control" name="city" autocomplete="new-password">
                                                	<option value="">Select City</option>
                                                	<?php include('inc/cities.php'); ?>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Phone Number / Landline</label>
                                                <input type="tel" class="form-control" name="phone" autocomplete="new-password" required="">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">NTN</label>
                                                <input type="text" class="form-control" name="ntn" autocomplete="new-password">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">STR Number</label>
                                                <input type="text" class="form-control" name="str" autocomplete="new-password">
                                            </div>
                                        </div>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="card">
	                            <div class="card-header">
	                                <h4 class="card-title"><img class="bnkinfo" src="images/img/document.png">Bank Information</h4>
	                            </div>
	                            <div class="card-body">
	                                <div class="basic-form">
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Bank Name</label>
                                                <input type="text" class="form-control" name="bank_name" autocomplete="new-password">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Account / IBAN Number</label>
                                                <input type="text" class="form-control" name="account_no" autocomplete="new-password">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Account Title</label>
                                                <input type="text" class="form-control" name="account_title" autocomplete="new-password">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Branch Name</label>
                                                <input type="text" class="form-control" name="branch_name" autocomplete="new-password">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Branch Code</label>
                                                <input type="text" class="form-control" name="branch_code" autocomplete="new-password">
                                            </div>
                                            <div class="mb-3 col-md-3 offset-md-9 text-end">
	                                            <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
	                                </div>
	                            </div>
	                        </div>
                        </form>
                    <?php } ?>
					</div>
				</div>
			</div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

<?php include('inc/footer.php'); ?>
<script>
	jQuery('.create-client-form').submit(function(e){
		e.preventDefault(); // avoid to execute the actual submit of the form.
		var formData = new FormData(this);
	    formData.append("reason", "create-client");
	    $.ajax({
	        url: 'actions/ajax.php',
	        type: 'POST',
	        data: formData,
	        success: function (response) {
	            response = JSON.parse(response);
				if(response.error == 'no') {
					Swal.fire({
					  icon: 'success',
					  title: response.message,
                      timer: 3000

					})
                    // .then((result) => {
					//   window.open('/', '_SELF');
					// })
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