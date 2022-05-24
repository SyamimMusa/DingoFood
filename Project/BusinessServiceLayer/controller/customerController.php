<?php
require_once '../../BusinessServiceLayer/model/customerModel.php';

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