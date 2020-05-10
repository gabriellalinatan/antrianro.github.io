<?php

session_start();
include 'connectDB.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="js/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=Logi, initial-scale=1.0">
    <?php include '_headtags.php' ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BANK NASIONAL LINA</title>
</head>

<body>
    <img class="wave" src="img/wave.png">
    <div class="container">
        <div class="img">
            <img src="img/bg.svg">
        </div>
        <div class="login-content">
            <form action="" method="post">
                <img src="img/avatar.svg">
                <h2 class="title">Welcome</h2>
                <div class="login">
                    <form action="" method="post" class="input-field inline">
                        <ul>
                            <li><label for="username">Username</label></li>
                            <li><input type="text" size=40 id="username" name="username" placeholder="Username"></li>
                            <li><label for="password">Password</label></li>
                            <li><input type="password" id="password" name="password" placeholder="Password"></li>
                            <li><button class="btn-large red darken-2" type="submit" name="login">Login</button></li>
                        </ul>
                    </form>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>

<?php

if (isset($_SESSION["admin"])) {
    echo "
        <script>
            Swal.fire('Anda Sudah Login','Silahkan Logout Terlebih Dahulu','warning').then(function(){
                window.location = 'dashboard.php';
            });
        </script>
    ";
}

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // cek apakah ada karyawan
    $karyawan = mysqli_query($connect, "SELECT * from karyawan");



    // cari berdasarkan username
    $karyawan = mysqli_query($connect, "SELECT * from admin where username = '$username'");

    // cek apakah ada username
    if (mysqli_num_rows($karyawan) < 1) {
        echo "
            <script>
                Swal.fire('Gagal Login','Username Tidak Ditemukan','error');
            </script>
        ";
        exit;
    }

    $karyawan = mysqli_fetch_assoc($karyawan);

    if ($password != $karyawan['password']) {
        echo "
            <script>
                Swal.fire('Gagal Login','Kata Sandi Salah','error');
            </script>
        ";
        exit;
    }

    $_SESSION["admin"] = $username;
    echo "
        <script>
            Swal.fire('Berhasil Login','Anda Akan Dialihkan Ke Halaman Karyawan','success').then(function(){
                window.location = 'dashboard.php';
            });
        </script>
    ";
}

?>