<?php
    session_start();
    require "../koneksi.php";

    if(isset($_SESSION['valid']) !=  true){
        header("Location: login/login.php");
        exit;
    }

    $idu = $_SESSION['id_user'];

    $result = mysqli_query($conn, "SELECT id_transaksi,id_user,asal,tanggal_berangkat,tujuan,tanggal_transaksi,total_harga FROM tiket INNER JOIN transaksi ON tiket.id_tiket = transaksi.id_tiket WHERE id_user = '$idu'");
    $request = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $request[] = $row;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/riwayat.css">
    <link rel="icon" href="../img/logo2.png">
    <title>Riwayat Pembelian</title>
</head>
<body>
    <div class="keluar">
        <a href="home.php"><i class="fa-solid fa-arrow-left"></i></a>
    </div>
    <div class="riw">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Pelabuhan Awal</th>
                <th>Tujuan Akhir</th>
                <th>Tanggal Berangkat</th>
                <th>Tanggal Transaksi</th>
                <th>Total Harga</th>
            </tr>
            <?php $i = 1;
            foreach ($request as $req) : ?>
            <tr>
                <td> <?= $i; ?> </td>
                <td> <?php echo $req["asal"] ?> </td>
                <td> <?= $req["tujuan"] ?> </td>
                <td> <?= $req["tanggal_berangkat"] ?> </td>
                <td> <?= $req["tanggal_transaksi"] ?> </td>
                <td> <?= $req["total_harga"] ?> </td>
            </tr>
            <?php $i++;
            endforeach; ?>
        </table><br>
    </div>
</body>
</html>