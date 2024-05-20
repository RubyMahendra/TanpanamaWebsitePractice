<?php
require_once '../include/koneksi.php';

$sql = "DELETE FROM kategori WHERE id = '" . $_GET['id'] . "'";
$query= mysqli_query($conn,$sql);

    if($query){
        header('location: kategori.php');
    }

?>