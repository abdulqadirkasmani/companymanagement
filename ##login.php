<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<link rel="stylesheet" href="css/lib.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
	<section id="login">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="login-rt">
						<div class="login-box">
							<div class="titlearea text-center mb-2">
								<a href="javascript:;"><img src="images/logo.png" style="height: 120px" alt=""></a>
							</div>
							<div class="log-reg-tabs">
								<h3><strong>Login</strong> to your account</h3>
								<form action="" method="post" class="login-form" id="login-form">
							    	<div class="form-field">
							    		<input type="email" name="femail" id="femail" required="" placeholder="Enter Email">
							    	</div>
							    	<div class="form-field">
							    		<div class="pass-field">
							    			<input type="password" name="password" id="password" placeholder="Enter Password" required="">
							    			<img src="images/eyehide.svg" class="eyehide">
							    			<img src="images/eyefull.svg" class="d-none eyefull">
							    		</div>
							    	</div>
							    	<button type="submit">Login</button>
							    </form>
							</div><!-- login-tabs -->
							<div class="btm"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
	<script>
		jQuery('.eyehide').click(function(){
	      jQuery(this).addClass('d-none');
	      jQuery(this).parents('.pass-field').find('input').attr('type', 'text');
	      jQuery(this).parents('.pass-field').find('.eyefull').removeClass('d-none');
	    })
	    jQuery('.eyefull').click(function(){
	      jQuery(this).addClass('d-none');
	      jQuery(this).parents('.pass-field').find('input').attr('type', 'password');
	      jQuery(this).parents('.pass-field').find('.eyehide').removeClass('d-none');
	    })

		jQuery('.login-form').submit(function(e){
			e.preventDefault(); // avoid to execute the actual submit of the form.
			var formData = new FormData(this);
		    formData.append("reason", "login");
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
						window.open('/', '_SELF');
					}
		        },
		        cache: false,
		        contentType: false,
		        processData: false
		    });	
		})
	</script>
</body>
</html>