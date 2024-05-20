<?php
require_once '../include/koneksi.php';

$sql = "DELETE FROM kopi WHERE id = '" . $_GET['id'] . "'";
$query= mysqli_query($conn,$sql);

    if($query){
        header('location: kopi.php');
    }

?>