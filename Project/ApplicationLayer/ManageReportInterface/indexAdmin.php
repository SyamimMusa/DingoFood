<?php
/* Database connection settings */
session_start();

$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'kinderpal';
//$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
$conn=mysqli_connect($host,$user,$pass,$database);
if($conn){
}else{
     echo"Connection not successful" . mysqli_error($conn);
     die($conn);
}

$admin_username = $_SESSION['admin_username'];
?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Homepage</title>

    <!-- Bootstrap core CSS -->
    <link href="/Project/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="/Project/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/Project/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">	
	<link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
    <!-- Custom styles for this template -->
    <link href="/Project/css/landing-page.min.css" rel="stylesheet">
	<link rel="stylesheet" href="/Project/css/homePage.css">

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

.topnavi {
  overflow: auto;
  background-color: black;
  margin: 0px;

}

.topnavi a {
	border-right:5px solid black;
  float: left;
  color: white;
  text-align: center;
  padding: 20px;
  text-decoration: none;
  font-size: 17px;
  padding-left:30px;
  padding-right:30px;
  
}

.topnavi a:hover {
  background-color: grey;
  color: white;
}

.active {
  background-color: ;
  color: red;
}

table,td,tr
{border:0px solid white;	
width:100%;
}

td
{padding:20px;
background-color:black;
}


<!-- Column style-->

* {
    box-sizing: border-box;
}

.column {
    float: left;
    width: 50%;
    height: 100%; 
	
}

.row:after {
    content: "";
    display: table;
    clear: both;
}

<!-- Button Group -->

.btn-group button:hover {
    background-color: gray;
}


a, a:hover { color: black; text-decoration : none; }
 
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

    <!-- Masthead -->
        <header class="masthead text-white text-center" style="background-image : url('/Project/img/adminbg.jpg');">	
<div class="row" style="color: black">


  <div class="column" style="background-color: none;">
  <h2 style="font-size:3em; font-family:Aclonica;">Sales Report</h2>
  	<br>
    <div class="btn-group" style="display:block">
    <h2><a style="width: 40%" type="submit" href="dailyReport.php">Daily</a></h2>
    </div>

  <br>
  <br>
  	
<div class="btn-group" style="display:block">
<h2><a style="width: 40%" type="submit" href="weeklyReport.php">Weekly</a></h2>

  <br>
  
</div>
  <br>

 <div class="btn-group" style="display:block">
  <h2><a style="width: 40%" type="submit" href="monthlyreport.php">Monthly</a></h2>

  <br>

</div>
  </div>

</div>

    </header>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

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
