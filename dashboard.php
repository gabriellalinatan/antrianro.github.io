<?php

session_start();
include 'connectDB.php';

$jam = date("H:i:s");

if (isset($_POST["panggilAntrianA"])) {
    $query = mysqli_query($connect, "SELECT * from antrian where status = 'dilayani' AND loket = 'A' ORDER BY nomor DESC");
    if (mysqli_num_rows($query) > 0) {
        $query = mysqli_fetch_assoc($query);
        $nomorSekarang = $query["nomor"];
        mysqli_query($connect, "UPDATE antrian SET status = 'selesai' where nomor = $nomorSekarang");
    }

    $query = mysqli_query($connect, "SELECT * from antrian where status = 'mengantri'");
    $query = mysqli_fetch_assoc($query);

    $nomorSekarang = $query["nomor"];

    mysqli_query($connect, "UPDATE antrian SET status = 'dilayani', loket = 'A', dilayani = '$jam' where nomor = $nomorSekarang");
}

if (isset($_POST["panggilAntrianB"])) {
    $query = mysqli_query($connect, "SELECT * from antrian where status = 'dilayani' AND loket = 'B' ORDER BY nomor DESC");
    if (mysqli_num_rows($query) > 0) {
        $query = mysqli_fetch_assoc($query);
        $nomorSekarang = $query["nomor"];
        mysqli_query($connect, "UPDATE antrian SET status = 'selesai' where nomor = $nomorSekarang");
    }

    $query = mysqli_query($connect, "SELECT * from antrian where status = 'mengantri'");
    $query = mysqli_fetch_assoc($query);

    $nomorSekarang = $query["nomor"];

    mysqli_query($connect, "UPDATE antrian SET status = 'dilayani', loket = 'B', dilayani = '$jam' where nomor = $nomorSekarang");
}

if (isset($_POST["panggilAntrianC"])) {
    $query = mysqli_query($connect, "SELECT * from antrian where status = 'dilayani' AND loket = 'C' ORDER BY nomor DESC");
    if (mysqli_num_rows($query) > 0) {
        $query = mysqli_fetch_assoc($query);
        $nomorSekarang = $query["nomor"];
        mysqli_query($connect, "UPDATE antrian SET status = 'selesai' where nomor = $nomorSekarang");
    }


    $query = mysqli_query($connect, "SELECT * from antrian where status = 'mengantri'");
    $query = mysqli_fetch_assoc($query);
    $nomorSekarang = $query["nomor"];

    mysqli_query($connect, "UPDATE antrian SET status = 'dilayani', loket = 'C', dilayani = '$jam' where nomor = $nomorSekarang");
}

if (isset($_POST["selesaiA"])) {
    $query = mysqli_query($connect, "SELECT * from antrian where status = 'dilayani' AND loket = 'A' ORDER BY nomor DESC");
    if (mysqli_num_rows($query) > 0) {
        $query = mysqli_fetch_assoc($query);
        $nomorSekarang = $query["nomor"];
        mysqli_query($connect, "UPDATE antrian SET status = 'selesai' where nomor = $nomorSekarang");
    }
}

if (isset($_POST["selesaiB"])) {
    $query = mysqli_query($connect, "SELECT * from antrian where status = 'dilayani' AND loket = 'B' ORDER BY nomor DESC");
    if (mysqli_num_rows($query) > 0) {
        $query = mysqli_fetch_assoc($query);
        $nomorSekarang = $query["nomor"];
        mysqli_query($connect, "UPDATE antrian SET status = 'selesai' where nomor = $nomorSekarang");
    }
}

if (isset($_POST["selesaiC"])) {
    $query = mysqli_query($connect, "SELECT * from antrian where status = 'dilayani' AND loket = 'C' ORDER BY nomor DESC");
    if (mysqli_num_rows($query) > 0) {
        $query = mysqli_fetch_assoc($query);
        $nomorSekarang = $query["nomor"];
        mysqli_query($connect, "UPDATE antrian SET status = 'selesai' where nomor = $nomorSekarang");
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '_headtags.php' ?>
    <script src="js/jquery.js"></script>
    <script>
        var refreshId = setInterval(function() {
            $('#tampilAntrian').load('tampilAntrian.php');
        }, 1000);
    </script>
    <title>Program Antrian</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style="background-color:lavenderblush;">

    <!-- header -->
    <nav class="#00796b teal darken-2">
        <div class="container">
            <div class="nav-wrapper">
                <a href="index.php" title="Halaman Awal" class="brand-logo"><i class="material-icons">local_atm</i>BANK NASIONAL LINA</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="login.php" title="Admin"><i class="material-icons">account_circle</i></a></li>
                    <li><a href="profil.php" title="Setting account"><i class="material-icons">build</i></a></li>
                    <li><a href="logout.php" title="Logout"><i class="material-icons">remove_circle</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end header -->
    <!-- body -->
    <div class="row">

        <div class="col s5 offset-s1 card">
            <div class="card-content">
                <!-- tampilan antrian -->
                <div id="tampilAntrian"></div>
                <!-- end tampilan antrian -->
            </div>
            <br><br>
        </div>

        <div class="col s4 offset-s1 card">
            <h3 class="header center">Teller 1</h3>
            <div class="card-content">
                <form action="" method="post">
                    <div class="center"><button class="btn-large #00b0ff light-blue accent-3" type="submit" name="panggilAntrianA">Panggil</button> <button class="btn-large #4caf50 green" type="submit" name="selesaiA">Selesai</button></div>
                </form>
            </div>

            <h3 class="header center">Teller 2</h3>
            <div class="card-content">
                <form action="" method="post">
                    <div class="center"><button class="btn-large #00b0ff light-blue accent-3" type="submit" name="panggilAntrianB">Panggil</button> <button class="btn-large #4caf50 green" type="submit" name="selesaiB">Selesai</button></div>
                </form>
            </div>

            <h3 class="header center">Teller 3</h3>
            <div class="card-content">
                <form action="" method="post">
                    <div class="center"><button class="btn-large #00b0ff light-blue accent-3" type="submit" name="panggilAntrianC">Panggil</button> <button class="btn-large #4caf50 green" type="submit" name="selesaiC">Selesai</button></div>
                </form>
            </div>

        </div>



    </div>
    <!-- end body -->
    <script type="text/javascript" src="js/main.js"></script>

</body>

</html>

<?php

if (!isset($_SESSION["admin"])) {
    echo "
        <script>
            Swal.fire('Akses Ditolak','Anda Belum Login Sebagai Karyawan','warning').then(function(){
                document.location.href = 'index.php';
            });
        </script>
    ";
}
?>