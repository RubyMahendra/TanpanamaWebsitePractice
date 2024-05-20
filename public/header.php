<header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="../public/index.php">Tanpa Nama</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link menu-home" href="../public/index.php">Home</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="../public/kopi.php" id="kopi-dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Kopi
                            </a>
                            
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php 
                                    require_once '../include/koneksi.php';
                                    $sql = 'SELECT * FROM kategori';
                                    $query = mysqli_query($conn, $sql);
                                    while($result = mysqli_fetch_assoc($query)) {
                                        echo '
                                        <li>
                                        <a class="dropdown-item" href="../public/kopi.php?kat=' . $result['id'] .'">'.$result['kategori'].'</a>
                                        </li>'; 
                                      }
                                
                                ?>
                            </ul>
                            </li>
                        <li class="nav-item">
                            <a class="nav-link menu-about" href="about.php">About</a>
                        </li>
                    </ul>
                    <span class="d-flex">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="../admin/login.php">Login</a>
                                    </li>
                                </ul>
                    </span>
                </div>
            </div>
        </nav>
    </header>