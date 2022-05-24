<?php
require_once '../../libs/database.php';

class reportModel{
    public $report_id,$menu_price,$quantity,$total_amount,$total_revenue;
     
    function viewallReport(){
        $sql = "select orders.order_id,orders.order_quantity,menu.menu_price from orders INNER JOIN menu ON orders.order_id=menu.menu_id";
        return DB::run($sql);
    }

    function viewWeeklyReport(){
        $sql = "select orders.order_detail,orders.order_quantity,menu.menu_price from orders INNER JOIN menu ON orders.order_id=menu.menu_id";
        return DB::run($sql);
    }

    function viewMonthlyReport(){
        $sql = "select menu.cost,orders.order_quantity,menu.menu_price from orders INNER JOIN menu ON orders.order_id=menu.menu_id";
             
        return DB::run($sql);
    }

    function viewReport(){
        $sql = "select * from report where report_id=:report_id";
        $args = [':report_id'=>$this->report_id];
        return DB::run($sql,$args);
    }

    function exportReport(){
        $conn=mysqli_connect("localhost","root","","dingofood");   
	    $query ="select orders.order_id,orders.order_quantity,menu.menu_price from orders INNER JOIN menu ON orders.order_id=menu.menu_id";
        $result = mysqli_query($conn,$query) or die ("Error");
        $data = array();

        while( $row = $result->fetch_assoc() ) {
        $data[] = $row;
        }
        
        $fileName = "itemdata-".date('d-m-Y').".xls";

        //Set header information to export data in excel format
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename='.$fileName);

        //Set variable to false for heading
        $heading = false;

        if(!empty($data)) {
        foreach($data as $row) {
        if(!$heading) {
        echo implode("\t", array_keys($row)) . "\n";
        $heading = true;
        }
        echo implode("\t", array_values($row)) . "\n";
        }
        }
        exit();
        

        //return DB::run($sql,$args);
    }
    
    function deleteReport(){
        $sql = "delete from orders where order_id=:order_id";
        $args = [':order_id'=>$this->order_id];
        return DB::run($sql,$args);
    }
    

    }
?>
