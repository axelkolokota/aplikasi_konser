<?php
	session_start ();
	include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>GIS Koperasi</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title p-b-43">
						Masuk
					</span>
					
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="label-input100">Username</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="check" checked>
							<label class="label-checkbox100" for="ckb1">
								Ingat saya
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Lupa Password?
							</a>
						</div>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="log">
							Login
						</button>
					</div>
					
				</form>
				<?php
							if (isset ($_POST ['log'])) {
								$username	= $_POST['username'];
								$pass 		= $_POST['password'];
								$cek_user	= mysqli_query($conn,"SELECT * FROM admin WHERE username='$username'");
								$row 		= mysqli_num_rows ($cek_user);
								if ($row == 1 ) {
									$fetch_pass = mysqli_fetch_assoc ($cek_user);
									$cek_pass	= $fetch_pass['password'];
									if ($cek_pass <> $pass ){
										echo "<script>alert('Password Salah!'); </script>";
									} else {
										$_SESSION['log'] = true;
										header('location:dashboard/manajemen_penonton/data_penonton.php');
									}
									if  (isset ($_POST['check'])){
										setcookie('axel', $row['id_admin'], time() + 60);
										setcookie('axl', hash('sha3-512', $row['username']), time() + 60) ;
									}
								}else {
									echo "<script>alert('Username Salah!'); </script>";
								}
							}
						?>
				<div class="login100-more" style="background-image: url('images/bg-01.jpg');">
				</div>
			</div>
		</div>
	</div>
		
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>