<?php
session_start();
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'dingofood';
//$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
$conn=mysqli_connect($host,$user,$pass,$database);
if($conn){
}else{
     echo"Connection not successful" . mysqli_error($conn);
     die($conn);
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';



function send_password_reset($get_name, $get_email, $token){
    $mail = new PHPMailer(true);
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
    //$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = "hafizmustaqim007@gmail.com";                     //SMTP username
    $mail->Password   = '';                                     //SMTP password
    $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom("hafizmustaqim007@gmail.com", $get_name);
    $mail->addAddress($get_email);                         //Add a recipient
   
    $mail->isHTML(true);
    $mail->Subject = "RESET PASSWORD NOTIFICATION";

    $email_template = "
        <h2>Hello</h2>
        <h3>This is password reset request email for your your account.</h3>
        <br/><br/>
        <a href='http://localhost/DingoFood/Project/ApplicationLayer/ManageCustomerInterface/passwordChange.php?token=$token&email=$get_email'> Click Me </a>
    
    ";

    $mail->Body = $email_template;
    $mail->send();

}


if(isset($_POST['recoverLink']))
{
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $token = md5(rand());

  $check_email = "SELECT customer_email FROM customer WHERE email='$email' LIMIT 1";
  $check_email_run = mysqli_query($conn, $check_email);

    if(mysqli_num_rows($check_email_run)>0){
        $row = mysqli_fetch_array($check_email_run);
        $get_name = $row['customer_name'];
        $get_email  = $row['customer_email'];

        $update_token = "UPDATE customer SET verify_token='$token' WHERE customer_email='$get_email' LIMIT 1"; 

        $update_token_run = mysqli_query($conn, $update_token);

        if($update_token_run){
            
            send_password_reset($get_name, $get_email, $token);
            $SESSION['status'] = "Password reset link have been sent to your Email";
            header("Location: resetPassword.php");
            exit(0);

        }
        else{
            $SESSION['status'] = "SOMETHING WENT WRONG!!";
            header("Location: resetPassword.php");
            exit(0);
        }
    }
    else{
        $SESSION['status'] = "NO EMAIL FOUND";
        header("Location: resetPassword.php");
        exit(0);
    }



}


?>
