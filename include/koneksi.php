<?php 
        $host = 'localhost'; 
        $user = 'root'; 
        $pass = 'Danamahendra20'; 
        $db = 'db_tanpanama'; 

        // $conn = mysqli_connect($host,$user,$pass,$db)

        $conn = new mysqli($host, $user, $pass, $db); 
        if ($conn->connect_error) { 
                die("Connection failed: " . $conn->connect_error); } 

?>