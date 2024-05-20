<!-- <?php
// session_start();
// include 'koneksi.php';

// session_destroy();
// header("location:login.php");
?> -->

<?php
session_start();
session_destroy();
header("Location: login.php?auth=logout");
?>