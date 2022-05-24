<?php
// Author: NABILAH
// model that holds customer details and methods to edit and find customer details
require_once '../../libs/profileDB.php';
class CustomerProfileModel
{
  private $db;
  public function __construct()
  {
    $this->db = new Database;
  }

  // // Get User by ID
  public function getUserById($customer_id)
  {
    $this->db->query('SELECT * FROM customer WHERE customer_id = :customer_id');
    // Bind value
    $this->db->bind(':customer_id', $customer_id);

    $row = $this->db->single();
    // returns a single row
    return $row;
  }

  // Find user by username
  public function findUserByUsername($username)
  {
    $this->db->query('SELECT * FROM customer WHERE username = :username');
    // Bind value
    $this->db->bind(':username', $username);

    $row = $this->db->single();

    // Check row
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }
// Find user by email
  public function findUserByEmail($customer_email)
  {
    $this->db->query('SELECT * FROM customer WHERE customer_email = :customer_email');
    // Bind value
    $this->db->bind(':customer_email', $customer_email);

    $row = $this->db->single();

    // Check row
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }
  // Edit User by ID
  public function editUserById($customer_id, $data)
  {
    $this->db->query('UPDATE customer SET customer_name = :customer_name, customer_email = :customer_email, customer_phoneNo= :customer_phoneNo, customer_address= :customer_address, username= :username, password= :password WHERE customer_id = :customer_id');
    // Bind value
    $this->db->bind(':customer_id', $customer_id);
    $this->db->bind(':customer_name', $data['customer_name']);
    $this->db->bind(':customer_email', $data['customer_email']);
    $this->db->bind(':customer_phoneNo', $data['customer_phoneNo']);
    $this->db->bind(':customer_address', $data['customer_address']);
    $this->db->bind(':username', $data['username']);
    $this->db->bind(':password', $data['password']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
