<?php
require '../koneksi.php';

$id = $_GET['id'];



$result_tiket =  mysqli_query($conn, "select * from tiket");
$result_user = mysqli_query($conn, "select * from users where id_user = '$id'");
$result_join = mysqli_query($conn, "SELECT id_transaksi,id_user,asal,tujuan,tanggal_berangkat,tanggal_tiba,tanggal_transaksi,total_harga FROM tiket INNER JOIN transaksi ON tiket.id_tiket = transaksi.id_tiket WHERE transaksi.id_user = '$id'");

$tiket = [];
$user = [];
$res = [];
while ($record = mysqli_fetch_assoc($result_user)) {
    $user[] = $record;
}
while ($record = mysqli_fetch_assoc($result_join)) {
    $res[] = $record;
}
while ($record = mysqli_fetch_assoc($result_tiket)) {
    $tiket[] = $record;
}

$user = $user[0];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/logo1.png">
    <link rel="stylesheet" href="../css/tiket.css?v=1.1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <title>Tiket List</title>

    <style>
        .container .sidebar .main .list-item:nth-child(5) {
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
                    <p><?= $user["Username"] ?>`s Cart</p>
                    <a href="users.php">Back</a>
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
                                <th>Rute</th>
                                <th>tanggal transaksi</th>
                                <th>tanggal berangkat</th>
                                <th>tanggal tiba</th>
                                <th>Total Harga</th>

                                <th>Tools</th>
                            </tr>

                            <?php foreach ($res as $tr) : ?>
                            
                                <tr>

                                    <td><?= $tr["asal"] ?> - <?= $tr["tujuan"] ?></td>
                                    <td><?= $tr["tanggal_transaksi"] ?></td>
                                    <td><?= $tr["tanggal_berangkat"] ?></td>
                                    <td><?= $tr["tanggal_tiba"] ?></td>
                                    <td><?= $tr["total_harga"] ?></td>

                                    <td width="15%">
                                        <a href="delete-cart.php?id=<?= $tr['id_transaksi'] ?>">
                                            <button style="background-color:rgb(177, 7, 7)"><i class="bi bi-trash3-fill"></i> Delete</button>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

    <script src="script.js"></script>

    <script>
        $('#update').click(function() {

            $('#mymodal-update').css('display', 'block');

        });

        $('#add').click(function() {

            $('#mymodal').css('display', 'block');

        });
        $('#close').click(function() {
            $('#mymodal').css('display', 'none');

        });
        $('#clos').click(function() {
            $('#mymodal').css('display', 'none');

        });
        let modal = $('#mymodal')
        $(window).click(function(event) {
            console.log(modal)
            if (event.target == modal) {
                alert('p');

                $('#mymodal').css('display', 'none');
            }
        });
        datemin.min = new Date().toISOString().split("T")[0];
        datemin1.min = new Date().toISOString().split("T")[0];
    </script>



</body>


</html>