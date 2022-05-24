<?php
require_once '../../BusinessServiceLayer/libs/database.php';

class refundModel{
    public $refund_id,$status="";
    public $status2="Refund Unsuccessful";
    public $status3="Refund Successful ";
    public $status4="Pending....";

    function viewRefund(){
        $sql="SELECT * FROM refund WHERE refund_status='$status'";
        return DB::run($sql);
    }

    function viewRefundRequest(){
        $sql="SELECT * FROM refund  WHERE item='$refund_id'";
        return DB::run($sql);
    }

    function updateRefundRequest(){
        $sql="UPDATE refund SET refund_status='$status'  WHERE item='$refund_id'";
        return DB::run($sql);
    }

    function viewRefundDetail(){
        $sql="SELECT*FROM menu WHERE menu_name='$refund_id'";
        return DB::run($sql);
    }


    }
?>
