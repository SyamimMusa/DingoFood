
<?php
// Author: NABILAH
// model that holds admin details
require_once '../../libs/profileDB.php';
class adminProfileModel
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  // // Get User by ID
  public function getUserById($admin_id)
  {
    $this->db->query('SELECT * FROM admin WHERE admin_id = :admin_id');
    // Bind value
    $this->db->bind(':admin_id', $admin_id);

    $row = $this->db->single();
    // returns a single row
    return $row;
  }

  // Find user by username
  public function findUserByUsername($admin_username)
  {
    $this->db->query('SELECT * FROM admin WHERE admin_username = :admin_username');
    // Bind value
    $this->db->bind(':admin_username', $admin_username);

    $row = $this->db->single();

    // Check row
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  // Find user by email
  public function findUserByEmail($admin_email)
  {
    $this->db->query('SELECT * FROM admin WHERE admin_email = :admin_email');
    // Bind value
    $this->db->bind(':admin_email', $admin_email);

    $row = $this->db->single();

    // Check row
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }


  

  // Edit User by ID
  public function editUserById($admin_id, $data)
  {
    $this->db->query('UPDATE admin SET admin_name = :admin_name, admin_email = :admin_email, admin_phoneNo= :admin_phoneNo, admin_username = :admin_username, admin_password = :admin_password WHERE admin_id = :admin_id');

    // Bind value
    $this->db->bind(':admin_id', $admin_id);
    $this->db->bind(':admin_name', $data['admin_name']);
    $this->db->bind(':admin_email', $data['admin_email']);
    $this->db->bind(':admin_phoneNo', $data['admin_phoneNo']);
    $this->db->bind(':admin_username', $data['admin_username']);
    $this->db->bind(':admin_password', $data['admin_password']);
    
    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }


}
