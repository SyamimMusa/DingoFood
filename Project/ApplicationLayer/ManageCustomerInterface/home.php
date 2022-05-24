<!DOCTYPE html>
<html lang="en">
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

require_once '../../libs/database.php';
require_once '../../libs/custSession.php';

$name = $_SESSION['username'];

?>

<head>

    <script language="javascript" type="text/javascript">
    window.history.forward();
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300'>

    <meta name="author" content="">

    <title>DINGO FOOD - Food Ordering System (FOS)</title>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"
        type='text/css'>
    </link>
    <link href="/Project/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Project/css/home.css">

    <!-- STYLE -->

    <style>
    body,
    html {
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


    /* Create two equal columns that floats next to each other */
    .column {
        float: left;
        width: 50%;
        padding: 0 10%;
        height: 300px;
        /* Should be removed. Only for demonstration */
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }
    </style>

</head>

<body>
<!-- HEADER DINGO -->
    <div class="hero-image">
        <div class="hero-text">
            <h1 style="font-size:70px">D I N G O F O O D</h1>
            <p style="color: black">Everything's Fresh Here at DingoFood</p><br>
        </div>
    </div>

    <!-- NAVBAR -->

    <div id="menu-nav">
        <div style="list-style-type: none;" id="navigation-bar">
            <ul>
                <li><a href="/Project/ApplicationLayer/ManageCustomerInterface/home.php"><i class="fa fa-home"></i><span>Home</span></a></li>
                <li><a href="/Project/ApplicationLayer/ManageMenuInterface/viewMenu.php"><i class="fa fa-book"></i><span>Menu</span></a></li>
                
                <li><a href="/Project/ApplicationLayer/ManageOrderInterface/cart.php"><i class="fa fa-shopping-cart"></i><span>Cart</span></a></li>
                <li><a href="/Project/ApplicationLayer/ManageRefundInterface/refundList.php"><i class="fa fa-money"></i><span>Refund</span></a></li>
                <li><a href="/Project/ApplicationLayer/ManageCustomerInterface/logout.php" onclick="return confirm('Are you sure you want to sign out?')"><i class="fa fa-sign-out"></i><span>Sign Out</span></a></li>
                
                <a href="/Project/ApplicationLayer/ManageCustomerInterface/customerProfile.php" id="topnav-right"><i class="fa fa-user"></i><span>Hello <?php echo $name; ?></span></a>
            </ul>

        </div>

    </div>

    <!-- CUSTOMER HOME PAGE -->
    <header>
        <div>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <!-- Slide One - Set the background image for this slide in the line below -->
                    <div class="carousel-item active" style="background-image: url('/Project/img/coffee4.jpg')">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>

                    <!-- Slide Two - Set the background image for this slide in the line below -->
                    <div class="carousel-item" style="background-image: url('/Project/img/desserts2.jpg')">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>

                    <!-- Slide Three - Set the background image for this slide in the line below -->
                    <div class="carousel-item" style="background-image: url('/Project/img/macaroons2.png')">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </header>

    <section class="py-5">
        <div class="container">
            <h1 class="why">Why love us?</h1>
        </div>
    </section>

    <div class="row">
        <div class="column1" style="background-color:none;">
            <h2 style="display:inline">Certificate</h2>&nbsp &nbsp <i class="fa fa-check fa-2x"></i>
            <p>Get the certification from <br> Pastry Excellence</p>
        </div>
        <div class="column2" style="background-color:none;">
            <h2 style="display:inline">Dessert</h2>&nbsp &nbsp <i class="fa fa-cutlery fa-2x"></i>
            <p>The sweet course eaten at <br> the end of a meal.</p>
        </div>
        <div class="column3" style="background-color:none;">
            <h2 style="display:inline">Coffee</h2>&nbsp &nbsp <i class="fa fa-coffee fa-2x"></i>
            <p>Coffee is a brewed drink <br> prepared from roasted <br> coffee beans, the seeds <br> of berries from
                certain <br> Coffea species.</p>
        </div>
    </div>


    <div class="hero-image2">
        <div class="hero-text">
            <h1 style="font-size:70px">D I N G O F O O D</h1>
            <p>Everything's Fresh Here at DingoFood</p><br>
            <button>Contact Us</button>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            <h1 class="why"><b>About us?</b></h1>
        </div>
    </section>


    <div class="row">

        <div class="column" style="background-color:none; color: black">

            <h2 align="center"><b>About</b></h2>
            <p align="justify">DingoFood was founded in Kuantan by Mr. Afif. We are not only a place to drop in and get
                your morning cup of coffee (although you are more than welcome to do that), we are a place where you can
                sit down and enjoy that tailor-made cup of coffee. If you need to work, we have a seating area created
                specifically for you. If you need to rest, we have a soft-seating area in front of a stone fire place
                that is perfect for your weary mind and body. We offer a delicious variety of coffee made by our
                professionally trained baristas.</p>

            <br>

            <h2 align="center"><b>Opening Hours</b></h2>
            <p>Tue CLOSED</p>
            <p>Wednesday 10.00 - 24:00</p>
            <p>Thursday 10:00 - 24:00</p>
            <p>Friday 10:00 - 12:00 , 14:00 - 24:00</p>
            <p>Saturday 10:00 - 24:00</p>
            <p>Sunday 10:00 - 24:00</p>

        </div>

        <div class="column" style="background-color:none;">
            <h2 align="center"><b>Get in touch</b></h2>
            <p>Phone : 011-xxxx xxxx</p>
            <p>Email : dingofood@gmail.com</p>
            <p>Address : UMP Gambang, Pahang</p>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d254812.97244045194!2d103.1193792502791!3d3.710959412406065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31c8cbd16d448141%3A0x7719e36507094525!2sUniversiti+Malaysia+Pahang%2C+Gambang+Campus!5e0!3m2!1sen!2smy!4v1528899572531"
                width="500" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <!-- Footer -->
    <footer class="p-4 mb-0 bg-secondary">
        <div class="container">
            <p class="m-0 text-center text-white">&copy; 2021 DINGO FOOD. All Rights Reserved</p>
        </div>
        <!-- /.container -->
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



</body>

</html>