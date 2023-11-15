<?php
    session_start();
    require "koneksi.php";

    if(isset($_SESSION['valid']) !=  true){
        header("Location: login/login.php");
        exit;
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
        $idu = $_SESSION['id_user'];
        $idt = $_GET['id_tiket'];
        $total_harga = $request['harga'];
        date_default_timezone_set("Asia/Makassar");
        $tanggal = date('Y-m-d H-i-s');

        $result = mysqli_query($conn, "INSERT INTO transaksi VALUES ('', '$idu', '$idt', '$total_harga', '$tanggal')");

        // $result = mysqli_query($conn, "INSERT INTO transaksi VALUES('','$idu', '$idt', '$total_harga', '$tanggal')");
        if($result){
            echo "
                <script>
                    alert('Tiket Telah Berhasil Dibayar!');
                    document.location.href = 'index.php'; 
                </script>
                ";
        }else{
            echo "
            <script>
                alert('Tiket gagal Dibayar!');
            
            </script>
            "; 
        }
        // if(mysqli_affected_rows($conn) > 0){
        //     echo "
        //     <script>
        //         alert('Tiket Telah Berhasil Dibayar!');
        //         document.location.href = 'index.php'; 
        //     </script>
        //     ";
        // }else{
        //     echo "
        //     <script>
        //         alert('Tiket Gagal Dibayar!');
           
        //     </script>
        //     ";
        // }

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
</body>
</html>