<?php
session_start();


if (!isset($_SESSION['admin_id'])) {
    echo "<script>
    window.location.href = 'adminLogin.php';
    </script>";
    exit();
} else if (isset($_SESSION['admin_id'])) {
    require_once '../../BusinessServiceLayer/controller/adminProfileController.php';
    $adminController = new adminProfileController();
    $adminController->userModel = $adminController->model("adminProfileModel");
    $admin = $adminController->userModel->getUserById($_SESSION['admin_id']);
    
}

if (isset($_POST['logout'])) {
    session_destroy();
    $message = 'Success logout';
    echo "<script>
    alert('$message');
    window.location = 'adminLogin.php';
    </script>";
}
