<?php
    session_start();
    require "../koneksi.php";

    if(!isset($_SESSION['valid'])){
        echo "
        <script>
        alert('Anda Perlu Login Terlebih Dahulu!');
        document.location.href = '../login/login.php'; 
        </script>
        ";
    }

    $idt = $_GET["id_tiket"];


    $result = mysqli_query($conn, "select * from tiket where id_tiket = '$idt'");

    $request = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $request[] = $row;
    }

    $request = $request[0];

    ;
    
    if(isset($_POST['bayar'])){
        $idu = $_SESSION['id'];
        $idt = $_GET['id_tiket'];
        $total_harga = $request['harga'];
        date_default_timezone_set("Asia/Makassar");
        $tanggal = date('Y-m-d H-i-s');

        $result = mysqli_query($conn, "INSERT INTO transaksi VALUES ('', '$idu', '$idt', '$total_harga', '$tanggal')");
        if($result){
            echo "
                <script>
                    alert('Tiket Telah Berhasil Dibayar!');
                    document.location.href = 'home.php'; 
                </script>
                ";
        }else{
            echo "
            <script>
                alert('Tiket gagal Dibayar!');
            
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/bayar.css">
    <link rel="icon" href="../img/logo2.png">
    <title>Transaksi</title>
</head>
<body>
    <div class="keluar">
        <a href="home.php"><i class="fa-solid fa-arrow-left"></i></a>
    </div>
    <div class="transaksi">
        <div class="box"> 
            <h1>Transaksi</h1>          
            <form action="" method="POST">
                <h4>Asal Anda: </h4><br/>
                <h5><?= $request['asal'] ?> </h5><br>
                <h4>Tujuan Anda: </h4><br/>
                <h5><?= $request['tujuan']  ?> </h5><br>
                <h4>Tanggal Berangkat: </h4><br/>
                <h5><?= $request['tanggal_berangkat']  ?> </h5><br>
                <h4>Tanggal Tiba: </h4><br/>
                <h5><?= $request['tanggal_tiba']  ?> </h5><br>
                <h4>Harga Tiket: </h4><br/>
                <h5><?= $request['harga']  ?> </h5><br>
                <button type="submit" name="bayar" id="bayar">Bayar</button>
            </form>
        </div>
    </div>
</body>
</html>