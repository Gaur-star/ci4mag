<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add New Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href=<?php echo base_url()."assets/css/util.css" ?>>
	<link rel="stylesheet" type="text/css" href=<?php echo base_url()."assets/css/main.css" ?>>
	<link rel="stylesheet" type="text/css" href=<?php echo base_url()."assets/admin/bootstrap/css/bootstrap.min.css" ?>>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<?php echo $this->session->flashdata("msg") ?>
				<form class="login100-form validate-form flex-sb flex-w" action="<?php echo base_url() ?>login/check_admin" method="post" enctype='multipart/form-data'>
					<span class="login100-form-title p-b-32">
						Account Login
					</span>

					<span class="txt1 p-b-11">
						Username
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<input class="input100" type="text" name="username" >
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="pass" >
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Add New Admin
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	<script src="assets/js/main.js"></script>

</body>
</html>