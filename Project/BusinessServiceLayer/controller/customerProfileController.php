
<?php
// Author : NABILAH
// controller for customer to edit and display customer details
require_once '../../libs/Controller.php'; 
require_once '../../BusinessServiceLayer/model/customerProfileModel.php';

class customerProfileController extends Controller
{
  // Display Customer Profile Details
  public function my()
  {
    $this->userModel = $this->model("customerProfileModel");
    $customer = $this->userModel->getUserById($_SESSION['customer_id']);
    $data = [
      'customer_name' => $customer->customer_name,
      'customer_email' => $customer->customer_email,
      'customer_phoneNo' => $customer->customer_phoneNo,
      'customer_address' => $customer->customer_address,
      'username' => $customer->username,
      'password' => $customer->password
    ];
    return $data;
  }

  // Edit Customer Profile Details
  public function edit()
  {
    $this->userModel = $this->model("customerProfileModel");
    $customer = $this->userModel->getUserById($_SESSION['customer_id']);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'customer_name' => trim($_POST['customer_name']),
        'customer_email' => trim($_POST['customer_email']),
        'customer_phoneNo' => trim($_POST['customer_phoneNo']),
        'customer_address' => trim($_POST['customer_address']),
        'username' => trim($_POST['username']),
        'password' => trim($_POST['password']),
        
        'name_err' => '',
        'email_err' => '',
        'phone_number_err' => '',
        'username_err' => '',
        'password_err' => ''
      ];

      // Validate Username
      if (empty($data['username'])) {
        $data['username_err'] = 'Please enter username';
      } else {
        // Check Username

        if ($this->userModel->findUserByUsername($data['username'])) {
          $customer = $this->userModel->getUserById($_SESSION['customer_id']);
          if ($data['username'] != $customer->username) {
            $data['username_err'] = 'Username is already taken';
          }
        }
      }

      // Validate Name
      if (empty($data['customer_name'])) {

        $data['name_err'] = 'Please enter name';
      }

      // Validate Password
      if (empty($data['password'])) {
        $data['password_err'] = 'Pleae enter password';
      } elseif (strlen($data['password']) < 6) {
        $data['password_err'] = 'Password must be at least 6 characters';
      }

      // Validate Phone Number 
      if (empty($data['customer_phoneNo'])) {
        $data['phone_number_err'] = 'Please enter your phone number';
      }
       // Validate Email
      if (empty($data['customer_email'])) {
        $data['email_err'] = 'Please enter email';
      } else {
        // Check email

        if ($this->userModel->findUserByEmail($data['customer_email'])) {
          $customer = $this->userModel->getUserById($_SESSION['customer_id']);
          if ($data['customer_email'] != $customer->customer_email) {
            $data['email_err'] = 'Email is already taken';
          }
        }
      }

      // Make sure errors are empty
      if (empty($data['username_err']) && empty($data['name_err']) && empty($data['password_err'])  && empty($data['email_err']) && empty($data['phone_number_err'])) {

        // Validated
        if ($this->userModel->editUserById($_SESSION['customer_id'], $data)) {
          // set session
          $_SESSION['customer_name'] = $data['customer_name'];
          $_SESSION['customer_email'] = $data['customer_email'];
          $_SESSION['customer_phoneNo'] = $data['customer_phoneNo'];
          $_SESSION['customer_address'] = $data['customer_address'];
          $_SESSION['username'] = $data['username'];
          $_SESSION['password'] = $data['password'];
          header("location:customerProfile.php");
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with errors
        return $data;
      }
    } else {
      $data = [
        'customer_name' => $customer->customer_name,
        'customer_email' => $customer->customer_email,
        'customer_phoneNo' => $customer->customer_phoneNo,
        'customer_address' => $customer->customer_address,
        'username' => $customer->username,
        'password' => $customer->password,
        
        'name_err' => "",
        'email_err' => "",
        'phone_number_err' => "",
        'username_err' => "",
        'password_err' => "",

      ];
      return $data;
    }
  }
}
