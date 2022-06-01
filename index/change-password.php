
<?php 
  ob_start();
  include '../config.php';
  include '../function.php';
//   if(isset($_SESSION['ID']) || isset($_SESSION['EMAIL']))
//   {
//      header("location: user/index.php"); 
//   }

$msg = "";

if (isset($_GET['reset'])) {
    if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE code='{$_GET['reset']}'")) > 0) {
        if (isset($_POST['submit'])) {
            $password = mysqli_real_escape_string($con, md5($_POST['password']));
            $confirm_password = mysqli_real_escape_string($con, md5($_POST['confirm-password']));

            if ($password === $confirm_password) {
                $query = mysqli_query($con, "UPDATE users SET password='{$password}', code='' WHERE code='{$_GET['reset']}'");

                if ($query) {
                    
                    
                    ?>
                    <script>
                        alert("Password Successfully changed.");
                    window.location.href="login.php";
                </script>
                <?php
                }
            } else {
                ?>
                <script>
                alert("Password and Confirm Password do not match.");
                </script>
                <?php
            }
        }
    } else {
        ?>
        <script>
        alert("Reset Link do not match.");
        </script>
        <?php
    }
} else {
    header("Location: forgot-password.php");
}

ob_end_flush();
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
        .link{
            text-decoration :none;
            font-size:1.1rem;
            color:white;
        }
        @media only screen and (max-width: 425px){
            .link{
                color:black;
            }
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
					
				</div>
			
			</div>
			<!-- END SIGN UP -->
			<!-- SIGN IN -->
			<div class="col align-items-center flex-col sign-in">
				<div class="form-wrapper align-items-center">
					<div class="form sign-in">
                        <h2 class="register_login">Reset Password</h2>
                        <hr>
						<form method="POST">
						<div class="input-group">
							<i class='fa-solid fa-user'></i>
							<input type="email" name="email" placeholder="Email Your Email" required>
						</div>
                        <div class="input-group ">
                            <i class='fa-solid fa-lock'></i>
                            <input type="password" name="password" placeholder="Change-Password" required autocomplete="off">
                        </div>
                        <div class="input-group ">
                            <i class='fa-solid fa-lock'></i>
                            <input type="password" placeholder="confirm-password" name="confirm-password" required autocomplete="off">
                        </div>
						<button type="submit" name="submit">
							Reset Password
						</button>


						</form>
						
						<p>
                        <span>
								Back to !
							<a href="login.php" class="link"><b>
								Login?
							</b></a>
                        	</span>
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