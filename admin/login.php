<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php 
            if(isset($_GET['auth']) && $_GET['auth'] == 0) {
                ?>
                <div class="alert alert-danger" role="alert">
                    Invalid username or password
                </div>
                <?php
            }

            if(isset($_GET['auth']) && $_GET['auth'] == 'forbidden') {
                ?>
                <div class="alert alert-danger" role="alert">
                    login dahulu !
                </div>
                <?php
            }

            if(isset($_GET['auth']) && $_GET['auth'] == 'logout') {
                ?>
                <div class="alert alert-danger" role="alert">
                    anda berhasil log out!
                </div>
                <?php
            }
            ?>

            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <form action="proses-login.php" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                        
                    </form>
                    <br>
                    <br>
                    <p>jika anda belum memiliki akun, silahkan <a href="register.php">registrasi</a> dahulu</p>
                    <br>

                    <a href="../public/index.php" class="btn btn-secondary">kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
