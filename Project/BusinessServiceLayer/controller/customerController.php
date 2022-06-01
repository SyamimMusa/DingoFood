<?php
session_start();
require_once '../../BusinessServiceLayer/model/customerModel.php';

$email = "";
$name = "";
$errors = array();

//if user click continue button in forgot password form
if(isset($_POST['checkEmail'])){
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $check_email = "SELECT * FROM customer WHERE customer_email='$email'";
    $run_sql = mysqli_query($connection, $check_email);
    if(mysqli_num_rows($run_sql) > 0){
        $code = rand(999999, 111111);
        $insert_code = "UPDATE customer SET code = $code WHERE customer_email = '$email'";
        $run_query =  mysqli_query($connection, $insert_code);
        if($run_query){
            $subject = "Password Reset Code";
            $message = "Your password reset code is $code";
            $sender = "From: hafizmustaqim007@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a password reset otp to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                header('location: resetCode.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Something went wrong!";
        }
    }else{
        $errors['email'] = "This email address does not exist!";
    }
}

//if user click check reset otp button
if(isset($_POST['checkReset'])){
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($connection, $_POST['otp']);
    $check_code = "SELECT * FROM customer WHERE code = $otp_code";
    $code_res = mysqli_query($connection, $check_code);
    if(mysqli_num_rows($code_res) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res);
        $email = $fetch_data['email'];
        $_SESSION['email'] = $email;
        $info = "Please create a new password that you don't use on any other site.";
        $_SESSION['info'] = $info;
        header('location: newPassword.php');
        exit();
    }else{
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}

//if user click change password button
if(isset($_POST['changePassword'])){
    $_SESSION['info'] = "";
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $cpassword = mysqli_real_escape_string($connection, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }else{
        $code = 0;
        $email = $_SESSION['email']; //getting this email using session
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $update_pass = "UPDATE customer SET code = $code, password = '$encpass' WHERE customer_email = '$email'";
        $run_query = mysqli_query($connection, $update_pass);
        if($run_query){
            $info = "Your password changed. Now you can login with your new password.";
            $_SESSION['info'] = $info;
            header('Location: passwordChanged.php');
        }else{
            $errors['db-error'] = "Failed to change your password!";
        }
    }
}

//if login now button click
if(isset($_POST['loginNow'])){
    header('Location: /Project/ApplicationLayer/ManageCustomerInterface/login.php');
}

class customerController {

    // display current customer name from customer table on checkout page - NUREEN
    //function viewCustomer($customer_id){
           // $customer = new customerModel();
           // $customer->customer_id = $customer_id;
            //return $customer->viewCustomer();
      //  }


    //validate the email and password for the customer to login - NABILAH
        function loginCust(){
            $customer = new customerModel();
            $customer->username = $_POST['username'];
            $customer->password = $_POST['password'];

            $cust = $customer->loginCustomer();
            $value = $cust->fetch();
            
            if($customer->loginCustomer()->rowCount() == 1){  
                $message = 'Success Login';
                 
                session_start();
                $_SESSION['customer_id'] = $value[0];
                $_SESSION['customer_name'] = $value[1];
                $_SESSION['customer_email'] = $value[2];
                $_SESSION['customer_phoneNo'] = $value[3];
                $_SESSION['customer_address'] = $value[4];
                $_SESSION['username'] = $value[5];
                $_SESSION['password'] = $value[6];
               
                echo "<script type='text/javascript'>alert('$message');
                window.location = 'home.php';</script>";
                exit();
            }
            else{
                $message = "Login Failed ! Username or password incorrect";
               
                echo "<script type='text/javascript'>alert('$message');
                window.location = 'login.php';
                </script>";
            }
    
            
    }
    // Sent data to the database - NABILAH
    function regsCust(){
        $customer = new customerModel();
        $customer->customer_name = $_POST['customer_name'];
        $customer->customer_email = $_POST['customer_email'];
        $customer->customer_phoneNo = $_POST['customer_phoneNo'];
        $customer->customer_address = $_POST['customer_address'];
        
        $customer->username = $_POST['username'];
        $customer->password = $_POST['password'];
    
        
    // Validate if register succesfull - NABILAH
        if($customer->registerCust() > 0){
                $message = "Customer Successfully Registered!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '/Project/ApplicationLayer/ManageCustomerInterface/login.php';</script>";
            }
    }
        

    function viewAll(){
         // view all customer
        $customer = new customerModel();
        return $customer->viewallCust();
    }
    
    function viewCustomer(){
     // get data associate with $id
        $customer = new customerModel();
        $customer->customer_id = $_SESSION['customer_id'];
        return $customer->viewCustomer();
         //retrieve data from customerModel
    }
 

    
}


 ?>