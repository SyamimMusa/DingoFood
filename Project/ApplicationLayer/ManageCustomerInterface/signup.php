<?php
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

require_once '../../BusinessServiceLayer/controller/customerController.php';
$customer = new customerController();

if(isset($_POST['signButton']))
{
  $customer->regsCust();

}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign Up</title>

    <!-- Bootstrap core CSS -->
    <link href="/Project/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="/Project/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/Project/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="/Project/css/landing-page.min.css" rel="stylesheet">

  </head>

  <!-- STYLE -->

	<style>


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


th,td,tr
{

color:black;
}

table
{
	border-radius:15px;
	border:5px solid black;	
	width:30%;
	border-collapse:separate;
	background-color: rgba(255,255,255,0.8);
	

}

td,th
{padding:10px;
}

.bottom{
	bottom:0;
	position:fixed;
	width:100%;
	background-color: black;
	border-collapse:separate;
	border-radius:0px;
}


#t01 td,tr {
	border: 0px;
width:100%;}

 #tableContainer1 {
    height: 100%;
    width: 100%;
    display: table;
  }
  
  #tableContainer2 {
    vertical-align: middle;
    display: table-cell;
    height: 100%;
  }
 body{
	 
    background-position: center;
    background-repeat: no-repeat;
    background-size: 100%;
 }
	</style>

  <!-- SIGNUP BACKGROUND -->

  <body background="/Project/img/bg3.jpg">

  <!-- Sign Up -->

  <section class="testimonials text-center ">
  <div id="tableContainer1">
  <div id="tableContainer2">
  
  <form method="POST" action="">
  <table align="center">

  <tr>
  <th style="text-align:center" colspan="2">CUSTOMER REGISTRATION</th>
  <tr>
  <th style="text-align:left">Name :</th>
  <td><input type="text" name="customer_name" title="Please enter your name"></td>
  
   <tr>
  <th style="text-align:left">Email :</th>
  <td><input type="text" name="customer_email" title="Please enter valid email address"></td>
  
  <tr>
  <th style="text-align:left">Phone Number :</th>
  <td><input type="text" name="customer_phoneNo" title="Please enter valid phone number" placeholder="012-34567891" pattern="[0-9]{3}-[0-9]{7}" required></td>

  <tr>
  <th style="text-align:left">Address :</th>
  <td><input type="text" name="customer_address" title="Please enter your address" required></td>
   
  <tr>
  <th style="text-align:left">Username :</th>
  <td><input type="text" name="username" title="Insert username" required></td>
   
  <tr>
  <th style="text-align:left">Password :</th>
  <td><input type="password" name="password" required></td>
    
  <tr><td style="text-align:center" colspan="2"><input type="submit" value="Register &raquo;" name="signButton" class="btn btn-lg btn-primary"></td>
  
  </table>
  </form>
  </div>
  </div>
  <br>
    <a class="btn btn-lg btn-primary" href="login.php">&laquo; Cancel</a>
      </div>
    </section>		
	
 <script>
function goBack() {
	header("Location: login.php");
}
</script>


    <!-- Bootstrap core JavaScript -->
    <script src="/Project/vendor/jquery/jquery.min.js"></script>
    <script src="/Project/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
