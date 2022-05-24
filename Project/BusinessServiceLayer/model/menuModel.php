<?php
require_once 'C:/xampp/htdocs/Project/libs/database.php';

class menuModel{
    
    // To store and retrieve all the information of menu data.
    public $menu_id,$menu_name,$menu_price,$menu_category,$menu_description,$menu_status, $menu_image, $cost;
    
    function addMenu(){
        //To insert menu details into menu table.
        $sql = "INSERT INTO menu (menu_name, menu_price, menu_category, menu_description, menu_status, menu_image, cost) VALUES (:menu_name, :menu_price, :menu_category, :menu_description, :menu_status, :menu_image, :cost)";

        $args = [':menu_name'=>$this->menu_name, ':menu_price'=>$this->menu_price, ':menu_category'=>$this->menu_category, ':menu_description'=>$this->menu_description, ':menu_status'=>$this->menu_status, ':menu_image'=>$this->menu_image, ':cost'=>$this->cost];

        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }
    
    //function viewAllMenu(){
        //To retrieve all menu information from menu table.
        //$sql = "SELECT * FROM menu";
        //return DB::run($sql);
    //}
    
    function viewMenu(){
        //To retrieve specific menu information from menu table where menu_id=menu_id.
        $sql = "SELECT * FROM menu WHERE menu_id=:menu_id";
        $args = [':menu_id'=>$this->menu_id];
        return DB::run($sql,$args);
    }

    function editMenu(){
        //To update the details of a specific menu in the menu table.
        $sql = "UPDATE menu SET menu_name=:menu_name,menu_price=:menu_price,menu_category=:menu_category,menu_description=:menu_description,menu_status=:menu_status,menu_image=:menu_image, cost=:cost WHERE menu_id=:menu_id";

        $args = [':menu_id'=>$this->menu_id, ':menu_name'=>$this->menu_name, ':menu_price'=>$this->menu_price,':menu_category'=>$this->menu_category, ':menu_description'=>$this->menu_description, ':menu_status'=>$this->menu_status, ':menu_image'=>$this->menu_image, ':cost'=>$this->cost];
        return DB::run($sql,$args);
    }

    function deleteMenu(){
        //To get menu_id from menuController and delete in menu table.
        $sql = "DELETE FROM menu WHERE menu_id=:menu_id";
        $args = [':menu_id'=>$this->menu_id];
        return DB::run($sql,$args);
    }

    function viewMenuList(){
        //To retrieve all menu from the menu table where menu_status='Available' and according to menu_category for customer
        if(isset($this->menu_category)){
            $sql = "SELECT * FROM menu WHERE menu_status='Available' AND  menu_category='$this->menu_category'";
        }else{
            $sql = "SELECT * FROM menu WHERE menu_status='Available'";
        }
        return DB::run($sql);
    }

    function viewMenuListPage($offset, $number_of_records, $term){
        //To retrieve a specific number of customer menu from the menu table according to the page number where menu_status='Available' and according to menu_category for customer
        if(isset($this->menu_category)){
            $sql =  "SELECT * FROM menu WHERE menu_status='Available' AND  menu_category='$this->menu_category' AND menu_name LIKE '%$term%' LIMIT ". $offset. ", ". $number_of_records;
        }else{
            $sql =  "SELECT * FROM menu WHERE menu_status='Available' AND  menu_name LIKE '%$term%' LIMIT ". $offset. ", ". $number_of_records;
        }
        return DB::run($sql);
    }

    function viewMenuListAdmin(){
        //To retrieve all menu from the menu table according to menu_category for admin
        if(isset($this->menu_category)){
            $sql = "SELECT * FROM menu WHERE menu_category='$this->menu_category'";
        }else{
            $sql = "SELECT * FROM menu";
        }
        return DB::run($sql);
    }

    function viewMenuListPageAdmin($offset, $number_of_records, $term){
        //To retrieve a specific number of customer menu from the menu table according to the page number according to menu_category for admin
        if(isset($this->menu_category)){
            $sql =  "SELECT * FROM menu WHERE menu_category='$this->menu_category' AND menu_name LIKE '%$term%' LIMIT ". $offset. ", ". $number_of_records;
        }else{
            $sql = "SELECT * FROM menu";
        }
        return DB::run($sql);
    }
   
}
?>
