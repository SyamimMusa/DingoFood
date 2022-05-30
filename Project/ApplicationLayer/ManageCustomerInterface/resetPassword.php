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
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Log In</title>

    <!-- Bootstrap core CSS -->
    <link href="/Project/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="/Project/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/Project/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
        type="text/css">

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
    border-right: 5px solid black;
    float: left;
    color: white;
    text-align: center;
    padding: 20px;
    text-decoration: none;
    font-size: 17px;
    padding-left: 30px;
    padding-right: 30px;

}

.topnavi a:hover {
    background-color: grey;
    color: white;
}

.active {
    background-color: ;
    color: red;
}


th {}

table {
    border-radius: 15px;
    border: 5px solid black;
    border-collapse: separate;
    width: 30%;
    background-color: rgba(255, 255, 255, 0.8);

}

td,
th {
    padding: 10px;

}

.bottom {
    bottom: 0;
    position: fixed;
    width: 100%;
    background-color: black;
    border-collapse: separate;
    border-radius: 0px;
}


#t01 td,
tr {
    border: 0px;
    width: 100%;
}

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

body {

    background-position: center;
    background-repeat: no-repeat;
    background-size: 100%;

}
</style>

<!-- RESET PASSWORD INTERFACE -->

<body background="/Project/img/bg3.jpg">

    <section class="testimonials text-center ">
        <div id="tableContainer1">
            <div id="tableContainer2">

                <form action="resetCode.php" method="POST" >
                    <table align="center">
                            <th style="text-align:center" colspan="2">RECOVER PASSWORD</th>
                        <tr>
                            <td><input type="text" name="email" placeholder="Email" required></td>
                        <tr>
                            <td style="text-align:center, width:100%" colspan="2"><input type="submit"
                                    value="Email me recovery link &raquo;" name="recoverLink" class="btn btn-lg btn-primary"></td>
                    </table>
                </form>
                <br>
            </div>
        </div>
    </section>


    <!-- Bootstrap core JavaScript -->
    <script src="/Project/vendor/jquery/jquery.min.js"></script>
    <script src="/Project/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>