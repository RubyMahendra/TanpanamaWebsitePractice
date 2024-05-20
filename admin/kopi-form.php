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
    padding: 30px 50px;
    margin-top: 150px;
    text-align: center;
    }

            .footer-section p {
            color:#ffffff;
            }
    </style>
</head>

<body>
    <div class="container p-5" style="margin-top: 30px">
        <div class="row">
            <?php
            require_once 'header.php';
            require_once '../include/koneksi.php';

            if (isset($_GET['id'])) {
                $sql = "SELECT * FROM kopi WHERE id='" . $_GET['id'] . "'";
                $query = mysqli_query($conn, $sql);
                $kopi = mysqli_fetch_assoc($query);
            }
            ?>
            <div class="container mt-5">
                <h2>Form Kopi</h2>
                <form method="post" enctype="multipart/form-data">
                    <?php
                    if (isset($_GET['id'])) {
                        echo '<input type="hidden" name="id" value="' . $_GET['id'] . '" >';
                    }
                    ?>
                    <div class="mb-3">
                        <select class="form-select" name="id_kategori" required>
                            <option value="">-- Pilih Kategori --</option>
                            <?php
                            $sql_kat = 'SELECT * FROM kategori';
                            $query_kat = mysqli_query($conn, $sql_kat);
                            while ($result_kat = mysqli_fetch_assoc($query_kat)) {
                                echo '<option value="' . $result_kat['id'] . '" ' . (isset($_GET['id']) ? (($result_kat['id'] == $kopi['id_kategori']) ? 'selected' : '') : '') . '>'
                                    . $result_kat['kategori'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="form-control" class="form-label">Nama Kopi</label>
                        <input type="text" name="nama" class="form-control" value="<?= isset($_GET['id']) ? $kopi['nama_kopi'] : ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="form-control" class="form-label">Keterangan</label>
                        <textarea class="form-control" name="keterangan" rows="3"><?= isset($_GET['id']) ? $kopi['keterangan'] : ''; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="form-control" class="form-label">Gambar</label>
                        <?= isset($_GET['id']) ? '<div class="mb-3"><img src="' . $kopi['gambar'] . '" width="150px"></div>' . $kopi['keterangan'] : ''; ?>
                        <input type="file" name="gambar" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="kopi.php" class="btn btn-success">Kembali</a>
                </form>
            </div>
            <?php
            function uploadFile() {
                $tmp_dir = $_FILES['gambar']['tmp_name'];
                $target_dir = '../img/' . $_FILES['gambar']['name'];
                move_uploaded_file($tmp_dir, $target_dir);
                return $target_dir;
            }
            if (sizeof($_POST) > 0) {
                if (isset($_POST['id'])) {
                    $dir = uploadFile();
                    $sql = "UPDATE kopi SET nama_kopi='" . $_POST['nama'] . "', keterangan='" . $_POST['keterangan'] . "', gambar='". $dir ."', id_kategori='". $_POST['id_kategori'] . "' WHERE id='" . $_POST['id'] . "'";
                } else {
                    $dir = uploadFile();
                    $sql = "INSERT INTO kopi (nama_kopi, keterangan, gambar, id_kategori) VALUES('" . $_POST['nama'] . "', '" . $_POST['keterangan'] . "', '" . $dir . "', " . $_POST['id_kategori'] . ")";
                }
                if ($query = mysqli_query($conn, $sql)) {
                    header('location: kopi.php');
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
