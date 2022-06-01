<?php
session_start();

/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'dingofood';
//$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
$conn=mysqli_connect($host,$user,$pass,$database);
if($conn){
}else{
     echo"Connection not successful" . mysqli_error($conn);
     die($conn);
}

require_once '../../BusinessServiceLayer/controller/reportController.php';
$report = new reportController();
$data = $report->viewAll();

if(isset($_POST['buy'])){
   $report->delete();
}
          
if(isset($_POST['sell'])){
    $report->exportReport();
}
$admin_username = $_SESSION['admin_username'];
?>



<!doctype html>
<html>  
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Daily Report</title>
	
 <!-- Custom fonts for this template -->
    <link href="/Project/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
	

	
	<link rel="stylesheet" href="/Project/css/homePage.css">
    <link rel="stylesheet" href="https://datatables.net/extensions/buttons/examples/html5/simple.html">
    <link rel="stylesheet" href="/Project/css/monthlyStyle.css">
    <link rel="stylesheet" href="\Project\css\tableMonthly.css">
    <?php
	
    $rowperpage = 90;
    $row = 0;

    // Previous Button
    if(isset($_POST['but_prev'])){
        $row = $_POST['row'];
        $row -= $rowperpage;
        if( $row < 0 ){
            $row = 0;
        }
    }

    // Next Button
    if(isset($_POST['but_next'])){
        $row = $_POST['row'];
        $allcount = $_POST['allcount'];

        $val = $row + $rowperpage;
        if( $val < $allcount ){
            $row = $val;
        }
    }

    // generating orderby and sort url for table header
    function sortorder($fieldname){
        $sorturl = "?order_by=".$fieldname."&sort=";
        $sorttype = "asc";
        if(isset($_GET['order_by']) && $_GET['order_by'] == $fieldname){
            if(isset($_GET['sort']) && $_GET['sort'] == "asc"){
                $sorttype = "asc";
            }
        }
        $sorturl .= $sorttype;
        return $sorturl;
    }

        // count total number of rows
        $sql = "SELECT COUNT(*) AS cntrows FROM report";
        $result = mysqli_query($conn,$sql);
        $fetchresult = mysqli_fetch_array($result);
        $allcount = $fetchresult['cntrows'];

        // selecting rows


        $orderby = " ORDER BY id desc ";
        if(isset($_GET['order_by']) && isset($_GET['sort'])){
            $orderby = ' order by '.$_GET['order_by'].' '.$_GET['sort'];
        }


    ?>
</head>
<style>
     body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
.hero-image {
  background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url("/Project/img/dingoLogo4.jfif");
  height: 50%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

.hero-image2 {
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("/Project/img/wall4.jpg");
  height: 50%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}

.hero-text button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 10px 25px;
  color: black;
  background-color: #ddd;
  text-align: center;
  cursor: pointer;
}

.hero-text button:hover {
  background-color: #555;
  color: white;
}

ul {
    list-style-type: none;

}
#content{
    border:1px solid darkgrey;
    border-radius:3px;
    padding:5px;
    width: 75%;
    margin: 0 auto;
}

/* Table */
#emp_table {
    border:3px solid lavender;
    border-radius:3px;
}

/* Table header */

.tr_header th a{
    color: black;
    text-decoration: none;
}

.tr_header{
    background-color: #e74c3c ;
	
}

.tr_header th{
    color:white;
    padding:10px 0px;
    letter-spacing: 1px;
}

/* Table rows and columns */
#emp_table td{
    padding:10px;
}
#emp_table tr:nth-child(even){
    background-color:lavender;
    color:black;
}

/* */
#div_pagination{
    width:100%;
    margin-top:5px;
    text-align:center;
}

<!-- BUTTON STYLE -->

.button {
    background-color: #e74c3c; /* Green */
    border: none;
    color: white;
    padding: 10px 50px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}

.button1 {
    background-color: white; 
    color: black; 
    border: 4px solid #e74c3c;
}

.button1:hover {
    background-color: #e74c3c;
    color: white;
}


<!-- /BUTTON STYLE -->

</style>
<body>

  <div class="hero-image">
  <div class="hero-text">
    <h1 style="font-size:70px">D I N G O F O O D</h1>
    <p style="color: black">Everything's Fresh Here at DingoFood</p><br>
  </div>
</div>

  <div id="menu-nav">
  <div style="list-style-type: none;" id="navigation-bar">
     <ul>
      <li><a href="/Project/ApplicationLayer/ManageAdminInterface/adminHome.php"><i class="fa fa-home"></i><span>Home</span></a></li>
      <li><a href="/Project/ApplicationLayer/ManageMenuInterface/listMenu.php"><i class="fa fa-list"></i><span>List</span></a></li>
      <li><a href="/Project/ApplicationLayer/ManageMenuInterface/addMenu.php"><i class="fa fa-plus"></i><span>New Menu</span></a></li>
      <li><a href="/Project/ApplicationLayer/ManageRefundInterface/refundAdmin.php"><i class="fa fa-money"></i><span>Refund</span></a></li>
      <li><a href="/Project/ApplicationLayer/ManageReportInterface/indexAdmin.php"><i class="fa fa-bar-chart"></i><span>Report</span></a></li>
    <li><a href="/Project/ApplicationLayer/ManageAdminInterface/adminLogout.php" onclick="return confirm('Are you sure you want to sign out?')"><i class="fa fa-sign-out"></i><span>Sign Out</span></a></li>
    <a href="/Project/ApplicationLayer/ManageAdminInterface/adminProfile.php" id="topnav-right"><i class="fa fa-user"></i><span>Hello <?php echo $admin_username; ?> </span></a>
    </ul>

  </div>
  
</div>
<!-- END -->

<div id="">
    <table class="table-fill">
      <thead>
        <tr>
            <th class="text-left">No</th>
            <th class="text-left">Menu ID</th>
            <th class="text-left">Menu Price</th>
            <th class="text-left">Quantity</th>
            <th class="text-left">Total Amount</th>
            <th class="text-left">Delete</th>
            <th class="text-left">Export</th>

        </tr>
      </thead>

        <?php
        $sno = $row;
        $total_revenue=0;
        foreach($data as $row){ 
   
            $menu_id = $row['order_id'];
            $menu_price = $row['menu_price'];
            $quantity = $row['order_quantity'];
            $total_amount = $menu_price * $quantity;
            $total_revenue+=$total_amount;
			$sno ++;
            ?>
            <form action="" method="POST">
            <tr>
                <td align='center'><?php echo $sno; ?></td>
                <td align='center'><?php echo $menu_id; ?></td>
                <td align='center'><?php echo $menu_price; ?></td>
                <td align='center'><?php echo $quantity; ?></td>
                <td align='center'><?php echo $total_amount; ?></td>
                
                <?php
            echo '<td><input type="hidden" name="order_id" value=' . $row['order_id'] . '><button class="btn btn--radius-2 btn--red" type="submit" name="buy" value="BUY">Delete</button></td>';
            echo '<td><input type="hidden" name="order_id" value=' . $row['order_id'] . '><button class="btn btn--radius-2 btn--red" type="submit" name="sell" value="SELL">Export</button></td>';
        
            }

        ?>
        
            </tr>
            <table class="table-fill">
            <tr>
            <th class="text-left" style="text-align:center;">Grand Total</th>
            </tr>
            <tr>
            <td style="text-align:center;"><?php echo $total_revenue; ?></td>
            </tr>
            </form>
            
            

    </table>
    
	<br />
	
    <form method="post">
        <div id="div_pagination">
            <a style="text-decoration:none; color: black; padding: 10px 50px;"  class="button button1" href="indexAdmin.php" ><span>Back</span></a>
        </div>

        <button onclick="window.print()" class="printbutton" >Print</button>
        
    </form>
</div>
<!-- Footer -->
    <footer class="p-4 mb-0 bg-secondary">
     <div class="container">
       <p class="m-0 text-center text-white">&copy; 2021 DINGO FOOD. All Rights Reserved</p>
     </div>
    </footer>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  
     <!-- Bootstrap core JavaScript -->
    <script src="/Project/vendor/jquery/jquery.min.js"></script>
    <script src="/Project/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="/Project/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="/Project/js/jqBootstrapValidation.js"></script>
    <script src="/Project/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="/Project/js/agency.min.js"></script>

    <script src="../js/main.js"></script>
</body>
</html>
