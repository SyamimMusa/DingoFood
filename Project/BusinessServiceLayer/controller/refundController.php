<?php
require_once '../../BusinessServiceLayer/model/refundModel.php';

class refundController{


    function viewRefund(){
        $refund = new refundModel();
        return $refund->viewRefund();
    }

    function viewRefundRequest(){
        $refund = new refundModel();
        return $refund->viewRefundRequest();
    }

    function updateRefundRequest(){
        $refund = new refundModel();
        //$refund->refund_id = refund_id;
        return $refund->updateRefundRequest();
    }

    function viewRefundDetail(){
        $refund = new refundModel();
        return $refund->viewRefundDetail();
    }

}
?>
