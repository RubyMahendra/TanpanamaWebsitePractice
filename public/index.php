<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cafe Landing Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/user_style.css">
    <!-- Custom styles -->
    
</head>

<body>
   
<?php 
require_once '../public/header.php';
?>

    <section id="home" class="hero-section">
        <div class="container">
            <h1 class="display-4">Welcome </h1>
            <p>Et nisi pariatur non nisi mollit ex aute ipsum reprehenderit. 
                Eu elit Lorem incididunt magna nulla. Exercitation culpa id pariatur eiusmod Lorem voluptate irure laborum aliqua. 
                Nulla aliqua exercitation mollit sit laborum aliqua anim commodo deserunt cillum laboris nostrud sit. Deserunt duis sint magna enim.</p>
            
                <a class="btn btn-primary btn-lg" href="#menu">View Menu</a>
        </div>
    </section>


    <section id="menu" class="menu-section"  >
        <div class="container" >
            <h2 class="text-center mb-4">Our Menu</h2>
            
            <br>
            <br>
  
            <div class="row">
            <?php
                require_once'../include/koneksi.php';
                $sql = "SELECT a.*, b.kategori FROM kopi a JOIN kategori b ON a.id_kategori=b.id";
                $query = mysqli_query($conn, $sql);
                while ($result = mysqli_fetch_assoc($query)) {
                    ?>
                    <div class="col-lg-3 mb-5">
                    <div class="card">
                        <img src="<?= $result['gambar']; ?>" class="card-img-top" alt="Menu Item 1">
                        <div class="card-body">
                            <h5 class="card-title"><?= $result['nama_kopi']; ?></h5>
                               <p class="card-text">
                               <?= $result['keterangan'] ?>

                            </p>
                            <button class="btn btn-primary btn-lg detail" 
                            data-kategori="<?= $result['kategori'] ?>"
                            data-nama_kopi="<?= $result['nama_kopi'] ?>" 
                            data-keterangan="<?= $result['keterangan'] ?>"
                            data-img="<?= $result['gambar'] ?>"
                            >Detail</button>
                        </div>
                    </div>
                </div>
                <?php
                    # code...
                }
             ?>
            
               
            </div>
            
        </div>
       


    </section>
<!-- Modal -->
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Kopi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3 class="text-left" id="modal-kategori"></h3>
        <img id="modal-img" class="img-fluid">
        <h5 class="text-left" id="modal-nama"></h5>
        <p class="text-left" id="modal-keterangan"></p>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php 
require_once '../public/footer.php'
?>
   

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('.detail').click(function() {
                $('#modal-kategori').html($(this).data('kategori'));
                $('#modal-nama').html($(this).data('nama_kopi'));
                $('#modal-keterangan').html($(this).data('keterangan'));
                $('#modal-img').attr('src',  $(this).data('img'));
                
                $('#modalDetail').modal('show');
            });
        });
    </script>
</body>

</html>
