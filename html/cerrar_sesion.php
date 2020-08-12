
<?php
 $now = time(); // Checking the time now when home page starts.

 if ($now > $_SESSION['expire']) {
     session_destroy();
     header("Location: login.php");
 }
?>