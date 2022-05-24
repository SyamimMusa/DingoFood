<?php
require_once '../../BusinessServiceLayer/model/reportModel.php';

class reportController{
     

    function viewAll(){
        $report = new reportModel();
        return $report->viewallReport();
    }

    function viewWeeklyReport(){
        $report = new reportModel();
        return $report->viewWeeklyReport();
    }

    function viewMonthlyReport(){
        $report = new reportModel();
        return $report->viewMonthlyReport();
    }

    function viewReport(){
        $report = new reportModel();
        //$report->report_id = report_id;
        return $report->viewReport();
    }
    
    function exportReport(){
        $report = new reportModel();
        return $report->exportReport();
    }
    function delete(){
        $report = new reportModel();
        $report->order_id = $_POST['order_id'];
        if($report->deleteReport()){
            $message = "Success Delete!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../../ApplicationLayer/ManageReportInterface/dailyReport.php';</script>";
        }
    }
}
?>
