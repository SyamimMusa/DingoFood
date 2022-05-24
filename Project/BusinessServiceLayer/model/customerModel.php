<?php
require_once '../../libs/database.php';

class customerModel {
  public $orderid,$j,$customer_id,$customer_name,$customer_email, $customer_phoneNo,$customer_address,$username,$password, $imageFileType;

  function addCust(){
        //To get all new customer information from customerController class and save in customer table.
        $sql = "insert into customer(customer_name, customer_email, customer_phoneNo, customer_address, username, password) values(:name, :email, :phone, :address, :address2, :city, :state, :zipcode, :username, :password, :usergroup)";
        $args = [':customer_name'=>$this->customer_name, ':customer_email'=>$this->customer_email, ':customer_phoneNo'=>$this->customer_phoneNo, ':customer_address'=>$this->customer_address, ':username'=>$this->username, ':password'=>$this->password];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }

  // get the current customer information to display at checkout page - NABILAH
  function viewCustomer(){
    $sql = "select * from customer where customer_id=:customer_id";
    $args = [':customer_id'=>$this->customer_id];
    return DB::run($sql,$args);
  }

  
  function viewAllCustomer(){

      $sql = "select * from customer";
        return DB::run($sql);
  }


  

  // get username and password for customer to login - NABILAH
  function loginCustomer(){
    if(isset($_POST['login'])){
      $sql = "select * from customer where username=:username AND password=:password limit 1";
      $args = [':username'=>$this->username, ':password'=>$this->password];

      // $stmt = DB::run($sql,$args);
      // $count = $stmt->rowCount();
      // return $count;
      return DB::run($sql,$args);
      
      }
    }

    // save data to database - NABILAH
    function registerCust(){
      // if(in_array($this->imageFileType, $this->extensions_arr)){
      $sql = "insert into customer(customer_name, customer_email,customer_phoneNo,customer_address,username,password)
    
      value(:customer_name, :customer_email, :customer_phoneNo, :customer_address, :username,  :password)";
    
      $args = [':customer_name'=>$this->customer_name, ':customer_email'=>$this->customer_email, ':customer_phoneNo'=>$this->customer_phoneNo, ':customer_address'=>$this->customer_address, ':username'=>$this->username, ':password'=>$this->password];
    
    
        $stmt = DB::run($sql, $args);
            $count = $stmt->rowCount();
            return $count;
        // }
    }


}



 ?>