<?php
include '../config.php';
include '../function.php';

if(isset($_SESSION['id'])) {
	header('Location: ../Dashboard/main-semi-light/index.php');
}


if(isset($_POST['sign-up']))
{
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$phone = mysqli_real_escape_string($con, $_POST['phone']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
	date_default_timezone_set("Asia/Kolkata");
	$today = date("F j, Y, g:i a"); 

	function random_strings($length_of_string) 
        { 
            $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz'; 
            return substr(str_shuffle($str_result), 0, $length_of_string); 
        } 
    $reference_id =  random_strings(8);



	$check = mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE email='$email' OR phone='$phone'"));


	if($password !== $cpassword) {
		$error = "Password does not match";
	}
	else if($check > 0) {
		$error = "Email or Phone already exists";
	}
	else {
		$password = md5($password);
		$query = mysqli_query($con, "INSERT INTO users (username, email, phone, password, timestamp, reference_id) VALUES ('$username', '$email', '$phone', '$password', '$today', '$reference_id')");
		if($query) {
			alert("Successfully registered");			
		}
		else {
			$error = "Something went wrong";
		}
	}
	

}


if(isset($_POST['sign-in']))
{
	$input = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, md5($_POST['password']));

	$check = mysqli_query($con, "SELECT id FROM users WHERE email='$input' OR phone='$input' AND password='$password' AND status='1'");
	
	if(mysqli_num_rows($check) > 0) {
		$_SESSION['id'] = mysqli_fetch_assoc($check)['id'];
		alert("Successfully logged in");
		header('location: ../Dashboard/main-semi-light/index.php');
	} else {
    echo "<script>alert('Login details is incorrect. Please try again.');</script>";
  }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
	<style> 
		i {
			font-size: 16px !important;
		}
		.alert-danger {
			background-color: #ff4a4ac5;
			border-radius: 6px;
			padding: 10px 15px;
			margin: 5px 10px;
			font-size: 0.8rem;
			text-align: center;
		}
		.alert-success {
			background-color: #59ff59be;
			border-radius: 6px;
			padding: 10px 15px;
			margin: 5px 10px;
			font-size: 0.8rem;
			text-align: center;
		}
	</style>
</head>
<body>
    <div id="container" class="container">
		<!-- FORM SECTION -->
		<div class="row">
			<!-- SIGN UP -->
			<div class="col align-items-center flex-col sign-up">
				<div class="form-wrapper align-items-center">
					<div class="form sign-up">
                        <h2 class="register_login">SIGN UP</h2>
                        <hr>
						<div>

						</div>
						<form action="" method="POST">

						<div class="input-group">
							<i class='fa-solid fa-user'></i>
							<input type="text" name="username" placeholder="Full Name" required>
						</div>
						<div class="input-group">
							<i class="fa-solid fa-envelope"></i>
							<input type="email" name="email" placeholder="Email" required>
						</div>

						<div class="input-group">
						<i class="fa-solid fa-phone"></i>
							<input type="tel" name="phone" placeholder="Phone Number" required>
						</div>
        
						<div class="input-group">
							<i class='fa-solid fa-lock'></i>
							<input type="password" name="password" placeholder="Password" required>
						</div>
						<div class="input-group">
							<i class='fa-solid fa-lock'></i>
							<input type="password" name="cpassword" placeholder="Confirm password" required>
						</div>
						<button type="submit" name="sign-up">
							Sign up
						</button>

						</form>
						
						<p>
							<span>
								Already have an account?
							</span>
							<b onclick="toggle()" class="pointer">
								Sign in here
							</b>
						</p>
					</div>
				</div>
			
			</div>
			<!-- END SIGN UP -->
			<!-- SIGN IN -->
			<div class="col align-items-center flex-col sign-in">
				<div class="form-wrapper align-items-center">
					<div class="form sign-in">
                        <h2 class="register_login">SIGN IN</h2>
						<h2><?php echo $_SESSION["id"];  ?></h2>
                        <hr>
						<form method="POST">
						<div class="input-group">
							<i class='fa-solid fa-user'></i>
							<input type="text" name="username" placeholder="Email or Phone no." required>
						</div>
						<div class="input-group">
							<i class='fa-solid fa-lock'></i>
							<input type="password" name="password" placeholder="Password" required>
						</div>
						<button type="submit" name="sign-in">
							Sign in
						</button>


						</form>
						
						<p>
							<b>
								Forgot password?
							</b>
						</p>
						<p>
							<span>
								Don't have an account?
							</span>
							<b onclick="toggle()" class="pointer">
								Sign up here
							</b>
						</p>
					</div>
				</div>
				<div class="form-wrapper">
		
				</div>
			</div>
			<!-- END SIGN IN -->
		</div>
		<!-- END FORM SECTION -->
		<!-- CONTENT SECTION -->
		<div class="row content-row">
			<!-- SIGN IN CONTENT -->
			<div class="col align-items-center flex-col">
				<div class="text sign-in">
					<h2>
						<div class="bitcoin">
                            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets10.lottiefiles.com/private_files/lf30_h03e9pog.json" mode="bounce" background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
                        </div>
						  
					</h2>
	
				</div>
				<div class="img sign-in">
		
				</div>
			</div>
			<!-- END SIGN IN CONTENT -->
			<!-- SIGN UP CONTENT -->
			<div class="col align-items-center flex-col">
				<div class="img sign-up">
				
				</div>
				<div class="text sign-up" id="sign_up">
					<h2>
						<div class="bitcoin">
<lottie-player src="https://assets10.lottiefiles.com/private_files/lf30_h03e9pog.json" mode="bounce" background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
                            
                          </span>
                          </div>
					</h2>
	
				</div>
			</div>
			<!-- END SIGN UP CONTENT -->
		</div>
		<!-- END CONTENT SECTION -->
	</div>
    <script src="app.js"></script>
	<script>
		    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
	</script>

</body>
</html>