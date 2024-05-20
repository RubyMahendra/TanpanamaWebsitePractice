<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Jenis Kopi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    

    <style>

        .footer-section {
    background-color: #343a40;
    color: #ffffff;
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
require_once 'header.php'

?>
<div class="container p-5" style="margin-top: 80px">
         <h2>Kopi</h2>
         <?php
         require_once'../include/koneksi.php';
         $sql = "SELECT a.*, b.kategori FROM kopi a JOIN kategori b ON a.id_kategori=b.id";
         $query = mysqli_query($conn, $sql);
         ?>
        
        <a style="margin-top: 30px" class="btn btn-primary mb-3" href="kopi-form.php" ">Tambahkan</a>

        <table class="table table-bordered" style=" margin-top: 10px">
            <thead>
            <tr>
                <th>ID</th>
                <th>Kategori</th>
                <th>Nama Kopi</th>
                <th>Keterangan</th>
                <th>Gambar</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
    <?php 
    while ($result = mysqli_fetch_assoc($query)) {
        echo '<tr>';
            echo '<td>' . $result['id'] . '</td>';
            echo '<td>' . $result['kategori'] . '</td>';
            echo '<td>' . $result['nama_kopi'] . '</td>';
            echo '<td>' . $result['keterangan'] . '</td>';
            echo '<td><img src="' . $result['gambar'] . '" width="150 px"</td>';
            echo '<td>
            <a href="kopi-form.php?id=' . $result['id'] . '" class="btn btn-warning btn-sm">Edit</a>
            <a href="kopi-delete.php?id=' . $result['id'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah anda yakin ingin menghapus data ini ? \'); ">Delete</a>
            </td>';
        echo '</tr>';
    }
    ?>
</tbody>
        </table>
</div>

    </div>
</div>

<?php 
require_once '../admin/footer.php';
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
