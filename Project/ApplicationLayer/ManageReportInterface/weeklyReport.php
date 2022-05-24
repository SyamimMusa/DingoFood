<?php
session_start();

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

$admin_username = $_SESSION['admin_username'];
$report = new reportController();
$data = $report->viewWeeklyReport();
       

?>

<html>
  <head>
  <title>Weekly Report</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="/Project/css/monthlyStyle.css">
		
     
      
    </script>
	<link rel="stylesheet" href="\Project\css\homePage.css">
    <link rel="stylesheet" href="\Project\css\tableMonthly.css">
	<style>
  <!-- NAVIGATION STYLE -->
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

#centered{
	display: ; 
	justify-content: center;
	text-align: center;
}


<!-- /BUTTON STYLE -->
	
	</style>
  </head>
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

<?php //DROPDOWN MENU... ?>
<div id="centered" class="dropdown"> 
	
    

   <table class="table-fill">
      <thead>
        <tr>
            <th class="text-left">No</th>
            <th class="text-left">Order Detail</th>
            <th class="text-left">Sales</th>
            <th class="text-left">Tax (5%)</th>
            <th class="text-left">Total</th>
        </tr>
      </thead>

      <?php
      
      $sno=0;
      foreach($data as $row){ 
            $order_detail=$row['order_detail'];
            $sales=$row['order_quantity']*$row['menu_price'];
            $tax = $sales*0.05;
            $total = $sales - $tax;
			$sno ++;
      ?>
      <form action="" method="POST">
      <tbody class="table-hover">
        <tr>
            <td class="text-left"><?php echo $sno; ?></td>
            <td class="text-left"><?php echo $order_detail; ?></td>
            <td class="text-left"><?php echo $sales; ?></td>
            <td class="text-left"><?php echo $tax; ?></td>
            <td class="text-left"><?php echo $total; ?></td>
        </tr>
        </form>
             
      </tbody>
      <?php
      }
      ?>
   </table>
  
   <br />
   <br />  
</div>



<!-- partial -->
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.3.0/snap.svg-min.js'></script><script  src="/Project/js/monthlyScript.js"></script>

  </div>	

	<div id="centered">
	<a class="button button1" href="indexAdmin.php" style="text-decoration:none; color: black;padding: 10px 50px;"><span>Back</span></a>
	</div>


  </body>
</html>