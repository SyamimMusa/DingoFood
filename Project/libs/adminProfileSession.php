<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
  echo "<script>
    window.location = 'adminLogin.php';
    </script>";
  exit();
}

if (isset($_POST['logout'])) {
  session_destroy();
  $message = 'Success logout';
  echo "<script>
    alert('$message');
    </script>";
  header("Location:     <!-- Footer -->
    <footer class="p-4 mb-0 bg-secondary">
     <div class="container">
       <p class="m-0 text-center text-white">&copy; 2021 DINGO FOOD. All Rights Reserved</p>
     </div>
  </footer>
.php");
  exit();
}