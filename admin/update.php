<?php
session_start();
if(!isset($_SESSION['admin_log'])){
    echo "
    <script>
    alert('Anda Perlu Login Terlebih Dahulu!');
    document.location.href = '../login/login.php'; 
    </script>
    ";
}
require '../koneksi.php';

$id = $_GET["id"];

$result = mysqli_query($conn, "select * from tiket where id_tiket = '$id'");

$prd = [];

while ($row = mysqli_fetch_assoc($result)) {
    $prd[] = $row;
}
$prd = $prd[0];


if (isset($_POST['back'])) {
    header('Location:tiket.php');
    exit();
} else if (isset($_POST['change'])) {
    $asal = $_POST['asal'];
    $tujuan = $_POST['tujuan'];
    $tgl_berangkat = $_POST['tgl_berangkat'];
    $tgl_tiba = $_POST['tgl_tiba'];
    $harga = $_POST['harga'];



    if ($asal != $tujuan) {
        $result = mysqli_query($conn, "update tiket set asal = '$asal' , tujuan = '$tujuan' , tanggal_berangkat = '$tgl_berangkat', tanggal_tiba = '$tgl_tiba', harga = '$harga' where id_tiket = '$id'");
        var_dump($result);

        if ($result) {
            echo "
            <script>
            // alert('Data Berhasil Diubah!');
            document.location.href = 'tiket.php';
            </script>
        ";
        } else {
            echo "
                <script>
                alert('Data Gagal Ditambahkan!');

                </script>
            ";
        }
    } else {
        echo "
        <script>
        alert('asal dan tujuan tidak boleh sama!');

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
    <link rel="icon" href="../img/logo1.png">
    <link rel="stylesheet" href="../css/tiket.css?v=1.3">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <title>Update</title>
</head>

<body>
    <div class="container">

        <?php @include "../includes/sidebar.php" ?>


        <div class="main-content">
            <div id="menu-button">
                <input type="checkbox" name="" id="menu-checkbox">
                <label for="menu-checkbox" id="menu-label">
                    <div id="hamburger"></div>
                </label>
            </div>
            <div class="wrapp">
                <div class="header-content">
                    <h3>Update Tiket</h3>
                </div>

                <form action="" method="post">
                    <table>
                        <tr>
                            <td><label for="">Asal</label></td>
                            <td><input type="text" name="asal" autocomplete="off" value="<?= $prd["asal"] ?>"></td>
                            <td><label for="">Tanggal Berangkat</label></td>
                            <td><input type="date" name="tgl_berangkat" id="datemin" value="<?= $prd["tanggal_berangkat"] ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="">Tujuan</label> </td>
                            <td><input type="text" name="tujuan" autocomplete="off" value="<?= $prd["tujuan"] ?>"></td>
                            <td><label for="">Tanggal Tiba</label></td>
                            <td><input type="date" name="tgl_tiba" id="datemin1" value="<?= $prd["tanggal_tiba"] ?>"></td>
                        </tr>

                        <tr>
                            <td><label for="">Harga</label></td>
                            <td><input type="number" name="harga" autocomplete="off" value="<?= $prd["harga"] ?>" min='1' max='9999999'></td>
                        </tr>


                    </table>
                    <div class="footer-content">
                        <button type="submit" name="back"><i class="bi bi-arrow-left"></i>Back</button>

                        <button type="submit" name="change"><i class="bi bi-floppy2-fill"></i> Save</button>
                    </div>

                </form>
            </div>
            <br>
            <br>




        </div>
    </div>




    <script src="script.js"></script>

    <script>
        datemin.min = new Date().toISOString().split("T")[0];
        datemin1.min = new Date().toISOString().split("T")[0];
    </script>


</body>

</html>