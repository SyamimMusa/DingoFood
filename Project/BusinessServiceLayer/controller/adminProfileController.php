
<?php
// Author: NABILAH
// controller for admin to display a admin details
require_once '../../libs/Controller.php';
require_once '../../BusinessServiceLayer/model/adminProfileModel.php';

class adminProfileController extends Controller
{
  // Get admin Profile 
  public function admin()
  {
    $this->userModel = $this->model("adminProfileModel");
    $admin = $this->userModel->getUserById($_SESSION['admin_id']);
    $data = [
      'admin_name' => $admin->admin_name,
      'admin_email' => $admin->admin_email,
      'admin_phoneNo' => $admin->admin_phoneNo,
      'admin_username' => $admin->admin_username,
      'admin_password' => $admin->admin_password,
      'admin_name_err' => "",
      'admin_email_err' => "",
      'admin_phone_number_err' => "",
      'admin_username_err' => '',
      'admin_password_err' => "",

    ];
    return $data;
  }
public function edit()
  {
    $this->userModel = $this->model("adminProfileModel");
    $admin = $this->userModel->getUserById($_SESSION['admin_id']);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'admin_name' => trim($_POST['admin_name']),
        'admin_email' => trim($_POST['admin_email']),
        'admin_phoneNo' => trim($_POST['admin_phoneNo']),
        
        'admin_username' => trim($_POST['admin_username']),
        'admin_password' => trim($_POST['admin_password']),
        
        'admin_name_err' => '',
        'admin_email_err' => '',
        'admin_phone_number_err' => '',
        'admin_username_err' => '',
        'admin_password_err' => ''
      ];

      // Validate Username
      if (empty($data['admin_username'])) {
        $data['admin_username_err'] = 'Please enter username';
      } else {
        // Check Username

        if ($this->userModel->findUserByUsername($data['admin_username'])) {
          $admin = $this->userModel->getUserById($_SESSION['admin_id']);
          if ($data['admin_username'] != $admin->admin_username) {
            $data['admin_username_err'] = 'Username is already taken';
          }
        }
      }

      // Validate Name
      if (empty($data['admin_name'])) {

        $data['admin_name_err'] = 'Please enter your name';
      }

      // Validate Password
      if (empty($data['admin_password'])) {
        $data['admin_password_err'] = 'Pleae enter password';
      } elseif (strlen($data['admin_password']) < 6) {
        $data['admin_password_err'] = 'Password must be at least 6 characters';
      }

      // Validate Phone Number Password
      if (empty($data['admin_phoneNo'])) {
        $data['admin_phone_number_err'] = 'Please enter your phone number';
      }
       // Validate Email
      if (empty($data['admin_email'])) {
        $data['admin_email_err'] = 'Please enter email';
      } else {
        // Check email

        if ($this->userModel->findUserByEmail($data['admin_email'])) {
          $admin = $this->userModel->getUserById($_SESSION['admin_id']);
          if ($data['admin_email'] != $admin->admin_email) {
            $data['admin_email_err'] = 'Email is already taken';
          }
        }
      }

      // Make sure errors are empty
      if (empty($data['admin_username_err']) && empty($data['admin_name_err']) && empty($data['admin_password_err'])  && empty($data['admin_email_err']) && empty($data['admin_phone_number_err'])) {

        // Validated
        if ($this->userModel->editUserById($_SESSION['admin_id'], $data)) {
          // set session
          $_SESSION['admin_name'] = $data['admin_name'];
          $_SESSION['admin_email'] = $data['admin_email'];
          $_SESSION['admin_phoneNo'] = $data['admin_phoneNo'];
          
          $_SESSION['admin_username'] = $data['admin_username'];
          $_SESSION['admin_password'] = $data['admin_password'];
          header("location:/Project/ApplicationLayer/ManageAdminInterface/adminProfile.php");
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with errors
        return $data;
      }
    } else {
      $data = [
        'admin_name' => $admin->admin_name,
        'admin_email' => $admin->admin_email,
        'admin_phoneNo' => $admin->admin_phoneNo,
        
        'admin_username' => $admin->admin_username,
        'admin_password' => $admin->admin_password,
        
        'admin_name_err' => "",
        'admin_email_err' => "",
        'admin_phone_number_err' => "",
        'admin_username_err' => "",
        'admin_password_err' => "",

      ];
      return $data;
    }
  }
}

  

