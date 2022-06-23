<?php
include '../config.php';
include '../function.php';
error_reporting(0);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


// if(isset($_SESSION['id']) && isset($_SESSION['Email'])) {
// 	header('Location: ../Dashboard/main-semi-light/index.php');
// }


if(isset($_GET['refer']) && $_GET['refer']!=''){
if(isset($_POST['sign-up']))
{

    require '../vendor/autoload.php';
    $reference_code = $_GET['refer'];    

   
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$phone = mysqli_real_escape_string($con, $_POST['phone']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $code = mysqli_real_escape_string($con, md5(rand()));
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
        ?>
        <script>
		alert("Password and confirm passwords are not matched !! ");
        </script>
        <?php
	}
	else if($check > 0) {
        ?>
        <script>
		alert("Email or Phone already exists");
        </script>
        <?php
	}
    
	else {

        $sql = mysqli_query($con,"SELECT * from users WHERE reference_id = '$reference_code'");
        if(mysqli_num_rows($sql)>0){
        $result =mysqli_fetch_assoc($sql);
        $referred_from  = $result['username'];
        
        $current = mysqli_query($con,"SELECT * FROM `users` WHERE `email` = '$email'");
        $current_user = mysqli_fetch_assoc($current);
        $refered_to_id= $current_user['id'];
        $refered_name = $current_user['username'];
        
        $add = mysqli_query($con,"INSERT INTO `reference`(`user_id`,`username`,`refered_to`,`reference_id`,`timestamp`) VALUES ('$refered_to_id','$referred_from','$refered_name','$reference_code','$today')");
        }else{
            echo "<script>Invalid Reference code !</script>";
            header("Location: login.php");
        }

		$password = md5($password);
		$query = mysqli_query($con, "INSERT INTO users (username, email, phone, password, timestamp, reference_id,code) VALUES ('$username', '$email', '$phone', '$password', '$today', '$reference_id','$code')");
		if($query) {
           
			echo "<div style='display: none;'>";
                                    //Create an instance; passing `true` enables exceptions
                                    $mail = new PHPMailer(true);
                
                                    try {
                                        //Server settings
                                        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                                        $mail->isSMTP();                                            //Send using SMTP
                                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                                        $mail->Username   = $my_email;                     //SMTP username
                                        $mail->Password   = 'puyxnbtxkghdrzju';                               //SMTP password
                                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
                                        //Recipients
                                        $mail->setFrom($my_email);
                                        $mail->addAddress($email);
                
                                        //Content
                                        $mail->isHTML(true);                                  //Set email format to HTML
                                        $mail->Subject = 'Registration Successful';
                                        $mail->Body    = "<!DOCTYPE html>
                                        <html>
                                        
                                        <head>
                                            <title></title>
                                            <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
                                            <meta name='viewport' content='width=device-width, initial-scale=1'>
                                            <meta http-equiv='X-UA-Compatible' content='IE=edge' />
                                            <style type='text/css'>
                                                @media screen {
                                                    @font-face {
                                                        font-family: 'Lato';
                                                        font-style: normal;
                                                        font-weight: 400;
                                                        src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
                                                    }
                                        
                                                    @font-face {
                                                        font-family: 'Lato';
                                                        font-style: normal;
                                                        font-weight: 700;
                                                        src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
                                                    }
                                        
                                                    @font-face {
                                                        font-family: 'Lato';
                                                        font-style: italic;
                                                        font-weight: 400;
                                                        src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
                                                    }
                                        
                                                    @font-face {
                                                        font-family: 'Lato';
                                                        font-style: italic;
                                                        font-weight: 700;
                                                        src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
                                                    }
                                                }
                                        
                                                /* CLIENT-SPECIFIC STYLES */
                                                body,
                                                table,
                                                td,
                                                a {
                                                    -webkit-text-size-adjust: 100%;
                                                    -ms-text-size-adjust: 100%;
                                                }
                                        
                                                table,
                                                td {
                                                    mso-table-lspace: 0pt;
                                                    mso-table-rspace: 0pt;
                                                }
                                        
                                                img {
                                                    -ms-interpolation-mode: bicubic;
                                                }
                                        
                                                /* RESET STYLES */
                                                img {
                                                    border: 0;
                                                    height: auto;
                                                    line-height: 100%;
                                                    outline: none;
                                                    text-decoration: none;
                                                }
                                        
                                                table {
                                                    border-collapse: collapse !important;
                                                }
                                        
                                                body {
                                                    height: 100% !important;
                                                    margin: 0 !important;
                                                    padding: 0 !important;
                                                    width: 100% !important;
                                                }
                                        
                                                /* iOS BLUE LINKS */
                                                a[x-apple-data-detectors] {
                                                    color: inherit !important;
                                                    text-decoration: none !important;
                                                    font-size: inherit !important;
                                                    font-family: inherit !important;
                                                    font-weight: inherit !important;
                                                    line-height: inherit !important;
                                                }
                                        
                                                /* MOBILE STYLES */
                                                @media screen and (max-width:600px) {
                                                    h1 {
                                                        font-size: 32px !important;
                                                        line-height: 32px !important;
                                                    }
                                                }
                                        
                                                /* ANDROID CENTER FIX */
                                                div[style*='margin: 16px 0;'] {
                                                    margin: 0 !important;
                                                }
                                            </style>
                                        </head>
                                        
                                        <body style='background-color: #c0c0c0; margin: 0 !important; padding: 0 !important;'>
                                            <!-- HIDDEN PREHEADER TEXT -->
                                            
                                            <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                                                <!-- LOGO -->
                                                <tr>
                                                    <td bgcolor='#7132ed' align='center'>
                                                        <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                                                            <tr>
                                                                <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'> </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td bgcolor='#7132ed' align='center' style='padding: 0px 10px 0px 10px;'>
                                                        <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                                                            <tr>
                                                                <td bgcolor='#ffffff' align='center' valign='top' style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;'>
                                                                    <h1 style='font-size: 48px; font-weight: 400; margin: 2;'>Welcome!</h1> <img src='https://raw.githubusercontent.com/jaisonjohn78/Peradot/main/assets/img/logo.png' width='150' style='display: block; border: 0px; user-drag: none; -webkit-user-drag: none; user-select: none; -moz-user-select: none; -webkit-user-select: none; -ms-user-select: none;' draggable='false' />
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td bgcolor='#f4f4f4' align='center' style='padding: 0px 10px 0px 10px;'>
                                                        <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                                                            <tr>
                                                                <td bgcolor='#ffffff' align='left' style='padding: 20px 30px 40px 30px; color: #434343; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                                                                    <p style='margin: 0; text-align: center;'>We're really very excited to have you get started. First, you need to confirm your account. Just press the button below.</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td bgcolor='#ffffff' align='left'>
                                                                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                                        <tr>
                                                                            <td bgcolor='#ffffff' align='center' style='padding: 20px 30px 60px 30px;'>
                                                                                <table border='0' cellspacing='0' cellpadding='0'>
                                                                                    <tr>
                                                                                        <td align='center' style='border-radius: 3px;' bgcolor='#7132ed'><a href='".$base_url."index/login.php?verification=".$code."'  style='font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #068f06; display: inline-block;'>Confirm Account</a></td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr> <!-- COPY -->
                                                            <tr>
                                                                <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 0px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                                                                    <p style='margin: 0;'>If that doesn't work, copy and paste the following link in your browser:</p>
                                                                </td>
                                                            </tr> <!-- COPY -->
                                                            <tr>
                                                                <td bgcolor='#ffffff' align='left' style='padding: 20px 30px 20px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                                                                    <p style='margin: 0;'><a href='".$base_url."index/login.php?verification=".$code."' style='color: #068f06;'>".$base_url."index/login.php?verification=".$code."</a></p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 20px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                                                                    <p style='margin: 0;'>If you have any questions, just reply to this email&mdash;we're always happy to help out.</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                                                                    <p style='margin: 0;'>Cheers,<br>Peradot Foundation</p>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td bgcolor='#f4f4f4' align='center' style='padding: 30px 10px 0px 10px;'>
                                                        <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                                                            <tr>
                                                                <td bgcolor='#FFECD1' align='center' style='padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                                                                    <h2 style='font-size: 20px; font-weight: 400; color: #111111; margin: 0;'>Need more help?</h2>
                                                                    <p style='margin: 0;'><a href='http://peradot.in/' target='_blank' style='color: #068f06;'>We&rsquo;re here to help you out</a></p>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td bgcolor='#f4f4f4' align='center' style='padding: 0px 10px 0px 10px;'>
                                                        <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                                                            <tr>
                                                                <td bgcolor='#f4f4f4' align='left' style='padding: 0px 30px 30px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;'> <br>
                                                                    <p style='margin: 0;'>If these emails get annoying, please feel free to <a href='../' target='_blank' style='color: #111111; font-weight: 700;'>unsubscribe</a>.</p>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </body>
                                        
                                        </html>";
                                        $mail->send();
                                        ?>
                                        <script>
                                        	alert("Successfully Registered ");
                                            </script>
                                        <?php
                                    } catch (Exception $e) {
                                        ?>
                                        <script>
                                        	alert("Message could not be sent. Mailer Error: { $mail->ErrorInfo }");
                                            </script>
                                            <?php
                                    }
									echo "</div>";
                                    ?>
                                    <script>
                                        	alert("We've send a verification link on your email address \n(Check your spam if not found ).");
                                            </script>
                                        <?php
                                    
                                    // set_message($error);	
		}
		else {
			alert("Something went wrong");
		}
        
	}
}
}else{

if(isset($_POST['sign-up']))
{

    require '../vendor/autoload.php';


	$username = mysqli_real_escape_string($con, $_POST['username']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$phone = mysqli_real_escape_string($con, $_POST['phone']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $code = mysqli_real_escape_string($con, md5(rand()));
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
        ?>
        <script>
		alert("Password and confirm passwords are not matched !! ");
        </script>
        <?php
	}
	else if($check > 0) {
        ?>
        <script>
		alert("Email or Phone already exists");
        </script>
        <?php
	}
    
	else {


        
if($_POST['refer_input']!='')
{
    $reference_code =  mysqli_real_escape_string($con, $_POST['refer_input']);
    $sql = mysqli_query($con,"SELECT * from users WHERE reference_id == '$reference_code'");
    alert(mysqli_num_rows($sql));
    if(mysqli_num_rows($sql)>0){
$result =mysqli_fetch_assoc($sql);
$referred_from  = $result['username'];

$current = mysqli_query($con,"SELECT * FROM `users` WHERE `email` = '$email'");
$current_user = mysqli_fetch_assoc($current);
$refered_to_id= $current_user['id'];
$refered_name = $current_user['username'];

$add = mysqli_query($con,"INSERT INTO `reference`(`user_id`,`username`,`refered_to`,`reference_id`,`timestamp`) VALUES ('$refered_to_id','$referred_from','$refered_name','$reference_code','$today')");
    }else{
        // alert("Invalid Reference code!");
        echo "<script>alert('Invalid reference code !');</script>";
        header("Location: login.php");
    }
}else{
    alert("Invalid Reference code!");
}

		$password = md5($password);
		$query = mysqli_query($con, "INSERT INTO users (username, email, phone, password, timestamp, reference_id,code) VALUES ('$username', '$email', '$phone', '$password', '$today', '$reference_id','$code')");
		if($query) {

			echo "<div style='display: none;'>";
                                    //Create an instance; passing `true` enables exceptions
                                    $mail = new PHPMailer(true);
                
                                    try {
                                        //Server settings
                                        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                                        $mail->isSMTP();                                            //Send using SMTP
                                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                                        $mail->Username   = $my_email;                     //SMTP username
                                        $mail->Password   = 'puyxnbtxkghdrzju';                               //SMTP password
                                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
                                        //Recipients
                                        $mail->setFrom($my_email);
                                        $mail->addAddress($email);
                
                                        //Content
                                        $mail->isHTML(true);                                  //Set email format to HTML
                                        $mail->Subject = 'Registration Successful';
                                        $mail->Body    = "<!DOCTYPE html>
                                        <html>
                                        
                                        <head>
                                            <title></title>
                                            <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
                                            <meta name='viewport' content='width=device-width, initial-scale=1'>
                                            <meta http-equiv='X-UA-Compatible' content='IE=edge' />
                                            <style type='text/css'>
                                                @media screen {
                                                    @font-face {
                                                        font-family: 'Lato';
                                                        font-style: normal;
                                                        font-weight: 400;
                                                        src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
                                                    }
                                        
                                                    @font-face {
                                                        font-family: 'Lato';
                                                        font-style: normal;
                                                        font-weight: 700;
                                                        src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
                                                    }
                                        
                                                    @font-face {
                                                        font-family: 'Lato';
                                                        font-style: italic;
                                                        font-weight: 400;
                                                        src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
                                                    }
                                        
                                                    @font-face {
                                                        font-family: 'Lato';
                                                        font-style: italic;
                                                        font-weight: 700;
                                                        src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
                                                    }
                                                }
                                        
                                                /* CLIENT-SPECIFIC STYLES */
                                                body,
                                                table,
                                                td,
                                                a {
                                                    -webkit-text-size-adjust: 100%;
                                                    -ms-text-size-adjust: 100%;
                                                }
                                        
                                                table,
                                                td {
                                                    mso-table-lspace: 0pt;
                                                    mso-table-rspace: 0pt;
                                                }
                                        
                                                img {
                                                    -ms-interpolation-mode: bicubic;
                                                }
                                        
                                                /* RESET STYLES */
                                                img {
                                                    border: 0;
                                                    height: auto;
                                                    line-height: 100%;
                                                    outline: none;
                                                    text-decoration: none;
                                                }
                                        
                                                table {
                                                    border-collapse: collapse !important;
                                                }
                                        
                                                body {
                                                    height: 100% !important;
                                                    margin: 0 !important;
                                                    padding: 0 !important;
                                                    width: 100% !important;
                                                }
                                        
                                                /* iOS BLUE LINKS */
                                                a[x-apple-data-detectors] {
                                                    color: inherit !important;
                                                    text-decoration: none !important;
                                                    font-size: inherit !important;
                                                    font-family: inherit !important;
                                                    font-weight: inherit !important;
                                                    line-height: inherit !important;
                                                }
                                        
                                                /* MOBILE STYLES */
                                                @media screen and (max-width:600px) {
                                                    h1 {
                                                        font-size: 32px !important;
                                                        line-height: 32px !important;
                                                    }
                                                }
                                        
                                                /* ANDROID CENTER FIX */
                                                div[style*='margin: 16px 0;'] {
                                                    margin: 0 !important;
                                                }
                                            </style>
                                        </head>
                                        
                                        <body style='background-color: #c0c0c0; margin: 0 !important; padding: 0 !important;'>
                                            <!-- HIDDEN PREHEADER TEXT -->
                                            
                                            <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                                                <!-- LOGO -->
                                                <tr>
                                                    <td bgcolor='#7132ed' align='center'>
                                                        <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                                                            <tr>
                                                                <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'> </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td bgcolor='#7132ed' align='center' style='padding: 0px 10px 0px 10px;'>
                                                        <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                                                            <tr>
                                                                <td bgcolor='#ffffff' align='center' valign='top' style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;'>
                                                                    <h1 style='font-size: 48px; font-weight: 400; margin: 2;'>Welcome!</h1> <img src='https://raw.githubusercontent.com/jaisonjohn78/Peradot/main/assets/img/logo.png' width='150' style='display: block; border: 0px; user-drag: none; -webkit-user-drag: none; user-select: none; -moz-user-select: none; -webkit-user-select: none; -ms-user-select: none;' draggable='false' />
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td bgcolor='#f4f4f4' align='center' style='padding: 0px 10px 0px 10px;'>
                                                        <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                                                            <tr>
                                                                <td bgcolor='#ffffff' align='left' style='padding: 20px 30px 40px 30px; color: #434343; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                                                                    <p style='margin: 0; text-align: center;'>We're really very excited to have you get started. First, you need to confirm your account. Just press the button below.</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td bgcolor='#ffffff' align='left'>
                                                                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                                        <tr>
                                                                            <td bgcolor='#ffffff' align='center' style='padding: 20px 30px 60px 30px;'>
                                                                                <table border='0' cellspacing='0' cellpadding='0'>
                                                                                    <tr>
                                                                                        <td align='center' style='border-radius: 3px;' bgcolor='#7132ed'><a href='".$base_url."index/login.php?verification=".$code."'  style='font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #068f06; display: inline-block;'>Confirm Account</a></td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr> <!-- COPY -->
                                                            <tr>
                                                                <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 0px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                                                                    <p style='margin: 0;'>If that doesn't work, copy and paste the following link in your browser:</p>
                                                                </td>
                                                            </tr> <!-- COPY -->
                                                            <tr>
                                                                <td bgcolor='#ffffff' align='left' style='padding: 20px 30px 20px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                                                                    <p style='margin: 0;'><a href='".$base_url."index/login.php?verification=".$code."' style='color: #068f06;'>".$base_url."index/login.php?verification=".$code."</a></p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 20px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                                                                    <p style='margin: 0;'>If you have any questions, just reply to this email&mdash;we're always happy to help out.</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                                                                    <p style='margin: 0;'>Cheers,<br>Peradot Foundation</p>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td bgcolor='#f4f4f4' align='center' style='padding: 30px 10px 0px 10px;'>
                                                        <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                                                            <tr>
                                                                <td bgcolor='#FFECD1' align='center' style='padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                                                                    <h2 style='font-size: 20px; font-weight: 400; color: #111111; margin: 0;'>Need more help?</h2>
                                                                    <p style='margin: 0;'><a href='http://peradot.in/' target='_blank' style='color: #068f06;'>We&rsquo;re here to help you out</a></p>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td bgcolor='#f4f4f4' align='center' style='padding: 0px 10px 0px 10px;'>
                                                        <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                                                            <tr>
                                                                <td bgcolor='#f4f4f4' align='left' style='padding: 0px 30px 30px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;'> <br>
                                                                    <p style='margin: 0;'>If these emails get annoying, please feel free to <a href='../' target='_blank' style='color: #111111; font-weight: 700;'>unsubscribe</a>.</p>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </body>
                                        
                                        </html>";
                                        $mail->send();
                                        ?>
                                        <script>
                                        	alert("Successfully Registered ");
                                            </script>
                                        <?php
                                    } catch (Exception $e) {
                                        ?>
                                        <script>
                                        	alert("Message could not be sent. Mailer Error: { $mail->ErrorInfo }");
                                            </script>
                                            <?php
                                    }
									echo "</div>";
                                    ?>
                                    <script>
                                        	alert("We've send a verification link on your email address \n(Check your spam if not found ).");
                                            </script>
                                        <?php
                                    
                                    // set_message($error);	
		}
		else {
			alert("Something went wrong");
		}
	}
}
}

if (isset($_GET['verification'])) {
    if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE code='{$_GET['verification']}'")) > 0) {
        $query_1 = mysqli_query($con, "UPDATE users SET code='' WHERE code='{$_GET['verification']}'");
        
        if ($query_1) {
            ?>
            <script>
            alert("Account verification has been successfully completed.");
            </script>
            <?php
            // set_message($error);
        }
    } else {
        header("Location: login.php");
    }
}

if (isset($_POST['sign-in'])) {
    $username_new = mysqli_real_escape_string($con, $_POST['username']);
    $password_new = mysqli_real_escape_string($con, $_POST['password']);


    if (empty($username_new) || empty($password_new)) {
        ?>
        <script>

        alert("Please fill your Credentials.");
        </script>
        <?php
    } else {
        $query_2 = "select * from users where phone='$username_new' or email='$username_new' ";
        $result_2 = mysqli_query($con, $query_2);

        if ($row_2 = mysqli_fetch_assoc($result_2)) {
            $_SESSION['id'] = $row_2['id'];
            $db_pass = $row_2['password'];
            if((md5($password_new) != $db_pass)) {
                ?>
                <script>
                alert("Please Enter Valid Password");
                </script>
                <?php
            }
            elseif((md5($password_new) == $db_pass) && empty($row_2['code'])) {

                
                ?>
                    <script>
                        window.location.href = '../Dashboard/main/index.php';
                    </script>
                <?php
                    $_SESSION['ID'] = $row_2['id'];
                    $_SESSION['EMAIL'] = $row_2['EMAIL'];
                } else {
                    ?>
                    <script>
                    alert("First verify your account and try again");
                    </script>
                    <?php
                }
        } 
        else{
            ?>
            <script>
            alert("Please enter valid phone no and Email");
            </script>
            <?php
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peradot Login - Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
   />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
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
        .hide{
         display: none;
        }
        .iti input, .iti input[type=text], .iti input[type=tel] {
            width:157% !important;
        }
        #valid-msg, #error-msg {
            position: relative;
            left: 80%;
            top: -40px;
        }
        #valid-msg {
            color: green;
        }
        #error-msg {
            color: red;
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

						<div class="input-group" style="width:64%;">
						    <!-- <i class="fa-solid fa-phone"></i> -->
							<input type="tel" name="phone" class="phone" required>
                            <span id="valid-msg" class="hide">✓ Valid</span>
                            <span id="error-msg" class="hide"></span>
						</div>
        
						<div class="input-group">
							<i class='fa-solid fa-lock'></i>
							<input type="password" name="password" placeholder="Password" required>
						</div>
						<div class="input-group">
							<i class='fa-solid fa-lock'></i>
							<input type="password" name="cpassword" placeholder="Confirm password" required>
						</div>
                        <div class="input-group">
							<i class='fa-solid fa-user'></i>
							<input type="text" name="refer_input" placeholder="Reference code(Optional)" id="refer_field">
						</div>
                        
                        
						<button type="submit" name="sign-up">
							Sign up
						</button>

						</form>
						
						<p class="mb-5">
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
			<div class="col align-items-center flex-col sign-in pb-5">
				<div class="form-wrapper align-items-center">
					<div class="form sign-in">
                        <h2 class="register_login">SIGN IN</h2>
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
						<div class="mb-5">
						<p>
							<a href="forgot-password.php" class="link"><b>
								Forgot password?
							</b></a>
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
			<div class="col align-items-center flex-col pb-5">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script>

var input = document.querySelector(".phone"),
    errorMsg = document.querySelector("#error-msg"),
    validMsg = document.querySelector("#valid-msg");

var errorMap = [ "Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

var intl = window.intlTelInput(input, {
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
});

var reset = function() {
    input.classList.remove("error");
    errorMsg.innerHTML = "";
    errorMsg.classList.add("hide");
    validMsg.classList.add("hide");
};

input.addEventListener('blur', function() {
    reset();
    if(input.value.trim()){
        if(intl.isValidNumber()){
            validMsg.classList.remove("hide");
        }else{
            input.classList.add("error");
            var errorCode = intl.getValidationError();
            errorMsg.innerHTML = errorMap[errorCode];
            errorMsg.classList.remove("hide");
        }
    }
});

input.addEventListener('change', reset);
input.addEventListener('keyup', reset);
  </script>
	<script>
		    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
	</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script>

var input = document.querySelector(".phone"),
    errorMsg = document.querySelector("#error-msg"),
    validMsg = document.querySelector("#valid-msg");

var errorMap = [ "Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

var intl = window.intlTelInput(input, {
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
});

var reset = function() {
    input.classList.remove("error");
    errorMsg.innerHTML = "";
    errorMsg.classList.add("hide");
    validMsg.classList.add("hide");
};

input.addEventListener('blur', function() {
    reset();
    if(input.value.trim()){
        if(intl.isValidNumber()){
            validMsg.classList.remove("hide");
        }else{
            input.classList.add("error");
            var errorCode = intl.getValidationError();
            errorMsg.innerHTML = errorMap[errorCode];
            errorMsg.classList.remove("hide");
        }
    }
});

input.addEventListener('change', reset);
input.addEventListener('keyup', reset);
  </script>
  <?php
  
  if(isset($_GET['refer']) && $_GET['refer']!=''){
    if(!($_SESSION['id']) && $_SESSION['id']==true)
    {
        $url = $_GET['refer'];
        $query = mysqli_query($con,"SELECT * FROM `users` WHERE  `reference_id`=$url");
        $result = mysqli_fetch_assoc($query);
        if(mysqli_num_rows($result)==1){
            echo "<script>
          
            window.location.href = login.php;
            </script>";
        }else{
            echo "<script>
            alert('invalid referral code!');
            </script>";
        }

    }
  }
  ?>


<?php
                         if(isset($_GET['refer']) && $_GET['refer']!=''){
                            $reference_code = $_GET['refer'];
                            ?>
                            
                            <script>
                                document.getElementById("refer_field").value="<?php echo $reference_code; ?>";
                                
                            </script>
                            <?php
                         }
                         ?>
</body>
</html>