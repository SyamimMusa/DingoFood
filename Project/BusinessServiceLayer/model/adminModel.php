<?php
require_once '../../libs/database.php';

class adminModel{

    public $admin_username,$admin_password;

    // get username and password for admin to login - NABILAH
    function loginadmin(){
        if(isset($_POST['login'])){
            $sql = "select * from admin where admin_username=:admin_username AND admin_password=:admin_password limit 1";
            $args = [':admin_username'=>$this->admin_username, ':admin_password'=>$this->admin_password];
            // $stmt = DB::run($sql,$args);
            // $count = $stmt->rowCount();
            // return $count;
            return DB::run($sql,$args);
            
            }
    }

}

?>