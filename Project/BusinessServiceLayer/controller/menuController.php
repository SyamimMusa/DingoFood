<?php
require_once 'C:/xampp/htdocs/Project/BusinessServiceLayer/model/menuModel.php';

class menuController{

    function addMenu(){
        //To add a new menu to the dingo food system by admin into menu list.
        $menu = new menuModel();
        // $menu->menu_id = $_POST['menu_id'];
        $menu->menu_name = $_POST['menu_name'];
        $menu->menu_price = $_POST['menu_price'];
        $menu->menu_category = $_POST['menu_category'];
        $menu->menu_description = $_POST['menu_description'];
        $menu->menu_status = $_POST['menu_status'];
        $menu->menu_image = $_POST['menu_image'];
        $menu->cost = $_POST['cost'];
        if($menu->addMenu() > 0){
            $message = "Menu Successfully Added!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = 'listMenu.php';</script>";
        }
    }
    
    ///function viewAllMenu(){
        //To view all menu in menu table.
        //$menu = new menuModel();
        ////return $menu->viewAllMenu();
    //}
    
    function viewMenu($menu_id){
        //To view the details of a specific menu.
        $menu = new menuModel();
        $menu->menu_id = $menu_id;
        return $menu->viewMenu();
    }
    
    function editMenu(){
        //To update the details of a specific menu.
        $menu = new menuModel();
        $menu->menu_id = $_POST['menu_id'];
        $menu->menu_name = $_POST['menu_name'];
        $menu->menu_price = $_POST['menu_price'];
        $menu->menu_category = $_POST['menu_category'];
        $menu->menu_description = $_POST['menu_description'];
        $menu->menu_status = $_POST['menu_status'];
        $menu->menu_image = $_POST['menu_image'];
        $menu->cost = $_POST['cost'];
        if($menu->editMenu()){
            $message = "Success Update!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = 'listMenu.php';</script>";
        }
    }
    
    function deleteMenu(){
        //To delete a specific menu.
        $menu = new menuModel();
        $menu->menu_id = $_POST['menu_id'];
        if($menu->deleteMenu()){
            $message = "Success Delete!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = 'listMenu.php';</script>";
        }
    }

    function viewMenuList(){
        //To view all menu and to calculate the number of pages required for customer.
        $menu = new menuModel();
        if(isset($_GET['menu_category'])){
            $menu->menu_category = $_GET['menu_category'];
        }
        return $menu->viewMenuList();
    }

    function viewMenuListPage($offset, $number_of_records, $term){
        //To view a specific page of menu for customer.
        $menu = new menuModel();
        if(isset($_GET['menu_category'])){
            $menu->menu_category = $_GET['menu_category'];
        }
        return $menu -> viewMenuListPage($offset, $number_of_records, $term);
    }

    function viewMenuListAdmin(){
        //To view all menu and to calculate the number of pages required for admin.
        $menu = new menuModel();
        if(isset($_GET['menu_category'])){
            $menu->menu_category = $_GET['menu_category'];
        }
        return $menu->viewMenuListAdmin();
    }

    function viewMenuListPageAdmin($offset, $number_of_records, $term){
        //To view a specific page of menu for admin.
        $menu = new menuModel();
        if(isset($_GET['menu_category'])){
            $menu->menu_category = $_GET['menu_category'];
        }
        return $menu -> viewMenuListPageAdmin($offset, $number_of_records, $term);
    }

}
?>
