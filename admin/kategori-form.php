<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    

    <style>
    .footer-section {
    background-color: #343a40;
    color: #ffffff;
    margin-top: 450px;
    padding: 30px 50px;
    text-align: center;
    }

            .footer-section p {
            color:#ffffff;
            }
    </style>
</head>

<body>

<div class="container" style="margin-bottom: 200px">
    <div class="row">
<?php 
    require_once 'header.php';
    require_once '../include/koneksi.php';
?>

<?php
    if(isset($_GET['id'])) {
        $sql = "SELECT * FROM kategori WHERE id='" . $_GET['id'] . "'";
        $query = mysqli_query($conn, $sql);
        $kategori = mysqli_fetch_assoc($query);
    }

?>
        <div class="container p-5" style="margin-top: 80px">
         <h2>Form Kategori</h2>
         <form method="post">
         <?php
    if(isset($_GET['id'])) {
        echo '<input type="hidden" name="id" value="' . $_GET ['id'] . '" >';
    }
?>
        
         <div class="mb-4"> 
            <input type="text" name="kategori" placeholder="Kategori" class="form-control" value="<?= isset($_GET['id']) ? $kategori['kategori'] : ''; ?>" required>
         </div>
         <button type="submit" class="btn btn-primary">Simpan</button>
         <a href="kategori.php" class="btn btn-success">Kembali</a>
         </form>
</div>

<?php
    if(sizeof($_POST) > 0) {
        if(isset($_POST['id'])) {
            $sql = "UPDATE kategori SET kategori='" . $_POST['kategori'] . "' WHERE id='" . $_POST['id'] . "'";
         } else {
            $sql = "INSERT INTO kategori VALUES('','" . $_POST['kategori'] ."')";
         } 
            if($query = mysqli_query($conn, $sql)) {
                header('location: kategori.php');
            } else {
                echo '<script>alert("data gagal ditambahkan");</script>';
            }
        }
?>
    


    </div>
</div>

<?php 
require_once '../admin/footer.php';
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
