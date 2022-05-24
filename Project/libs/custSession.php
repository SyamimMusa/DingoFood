<?php
session_start();

if (!isset($_SESSION['customer_id'])){
    echo "<script>
    window.location = 'login.php';
    </script>";
    exit();

    
}

if(isset($_POST['logout'])){
    session_destroy();
    $message = 'Success logout';
    echo "<script>
    alert('$message');
    </script>";
    header("Location: login.php");
}




?>