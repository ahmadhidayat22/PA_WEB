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

$result = mysqli_query($conn, 'SELECT id_transaksi,tanggal_transaksi,total_harga,Username FROM transaksi INNER JOIN users ON transaksi.id_user = users.id_user ');

$sales = [];

while ($row = mysqli_fetch_assoc($result)) {
    $sales[] = $row;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/tiket.css?v=1.2">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <title>Tiket List</title>

    <style>
        .container .sidebar .main .list-item:nth-child(3) {
            background-color: rgb(77, 148, 148);


        }
    </style>
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
            <div class="wrapper">
                <div class="header">
                    <p>Sales History</p>
                </div>

                <div class="isi">
                    
                    <div class="neck-content">
                        <span>

                            <label for="">Search: </label>
                            <input type="text">
                        </span>
                    </div>

                    <div class="tabel-content">
                        <table>
                            <tr>
                                <th>Transaksi ID</th>
                                <th>Tanggal Transaksi</th>
                                <th>Nama Buyer</th>
                                <th>Total Harga</th>
                            </tr>
                            <?php foreach ($sales as $sl) : ?>
                                <tr>
                                    <td width="10%"><?=$sl['id_transaksi'] ?></td>
                                    <td width="30%"><?=$sl['tanggal_transaksi'] ?></td>
                                    <td><?=$sl['Username'] ?></td>
                                    <td><?=$sl['total_harga'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                            

                        </table>
                    </div>
                   
                </div>

            </div>
        </div>

        <script src="script.js"></script>

</body>

</html>