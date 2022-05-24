<?php
require_once '../../BusinessServiceLayer/model/adminModel.php';

class adminController{

//validate the email and password for the customer to login - NABILAH
function loginAdmin(){
        $admin = new adminModel();
		$admin->admin_username = $_POST['admin_username'];
		$admin->admin_password = $_POST['admin_password'];

        $adm = $admin->loginadmin();
        $value = $adm->fetch();

		if($admin->loginadmin()->rowCount() == 1){
			$message = 'Success Login';
                 
                session_start();
                $_SESSION['admin_id'] = $value[0];
                $_SESSION['admin_username'] = $value[4];
                //$_SESSION['admin_password'] = $value[2];
            
                echo "<script type='text/javascript'>alert('$message');
                window.location = '/Project/ApplicationLayer/ManageAdminInterface/adminHome.php';
                </script>";
                exit();
		}
		else{
			$message = "Login Failed ! Username or password incorrect";
               
            echo "<script type='text/javascript'>alert('$message');
            window.location = '/Project/ApplicationLayer/ManageAdminInterface/adminLogin.php';
            </script>";
            exit();
		}
}





}

?>