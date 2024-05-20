<?php
session_start();
require_once '../include/koneksi.php';

$sql = "SELECT * FROM user WHERE BINARY username='" . $_POST['username'] . "' AND BINARY password=md5('" . $_POST['password'] . "')";

$query = mysqli_query($conn, $sql);
$login = mysqli_num_rows($query);

if ($login == 1) {
    $_SESSION['auth'] = true;
    header('location: home.php');
} else {
    header('location: login.php?auth=0');
}
?>