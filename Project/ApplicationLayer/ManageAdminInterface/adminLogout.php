
<?php

//logout.php
session_start(); 
session_unset();
session_destroy(); 
header('location: /Project/ApplicationLayer/ManageAdminInterface/adminLogin.php');
exit();
?>
