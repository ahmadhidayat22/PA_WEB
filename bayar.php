<?php
    session_start();
    require "koneksi.php";

    if(!isset($_SESSION['valid'])){
        header("Location: login/login.php");
        exit;
    }

    $idt = $_GET["id_tiket"];

    $result = mysqli_query($conn, "select * from tiket where id = '$idt'");

    $request = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $request[] = $row;
    }

    $request = $request[0];

    if(!isset($_POST['transaksi'])){
        $idu = $_get['id'];
        $idt = $_get['id_tiket'];
        $total_harga = $harga;
        $tanggal = date('Y-m-d');

        $result = mysqli_query($conn, "INSERT INTO transaksi VALUES('','$idu', '$idt', '$total_harga', '$tanggal')");
        if(mysqli_affected_rows($conn) > 0){
            echo "
            <script>
                alert('Tiket Telah Berhasil Dibayar!');
                document.location.href = 'index.php'; 
            </script>
            ";
        }else{
            echo "
            <script>
                alert('Tiket Gagal Dibayar!');
                document.location.href = 'bayar.php'; 
            </script>
            ";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
</head>
<body>
    <form action="" method="POST">
    <h4>Asal Anda: </h4><br/>
    <h5><?= $asal ?> </h5><br>
    <h4>Tujuan Anda: </h4><br/>
    <h5><?= $tujuan ?> </h5><br>
    <h4>Tanggal Berangkat: </h4><br/>
    <h5><?= $berangkat ?> </h5><br>
    <h4>Tanggal Tiba: </h4><br/>
    <h5><?= $tiba ?> </h5><br>
    <h4>Harga Tiket: </h4><br/>
    <h5><?= $harga ?> </h5><br>
    </form>
</body>
</html>