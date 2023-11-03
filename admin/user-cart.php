<?php
require '../koneksi.php';

$id = $_GET['id'];

$result_user = mysqli_query($conn, "select * from users where id = '$id'");
$result_join = mysqli_query($conn, "SELECT id_user,asal,tujuan,tanggal_transaksi,total_harga FROM tiket INNER JOIN transaksi ON tiket.id = transaksi.id_tiket WHERE id_user = '$id'");

$user = [];

$res = [];

while ($record = mysqli_fetch_assoc($result_user)) {
    $user[] = $record;
}
while ($record = mysqli_fetch_assoc($result_join)) {
    $res[] = $record;
}



$user = $user[0];
// $trans = $trans[0];








?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <div class="sidebar">
            <div class="header">
                <a href="#">

                    <div class="list-item">
                        <span class="description-header">Booking Site</span>
                    </div>

                </a>

                <div class="info-user">
                    <div class="picture"></div>
                    <div class="content" id="content">
                        <h5>ADMIN</h5>

                        <div class="online">
                            <div class="info"></div>
                            <p>online</p>

                        </div>

                    </div>

                </div>

            </div>

            <div class="main">
                <div class="head-list">
                    <span>REPORTS</span>
                </div>
                <div class="list-item">

                    <a href="home.php">
                        <i class="bi bi-speedometer2"></i>
                        <span class="description">Dashboard</span>
                    </a>
                </div>
                <div class="list-item">

                    <a href="sales.php">
                        <i class="bi bi-cash"></i>
                        <span class="description">Sales</span>
                    </a>
                </div>

                <div class="head-list">
                    <span>MANAGE</span>
                </div>

                <div class="list-item">

                    <a href="users.php">
                        <i class="bi bi-people"></i>
                        <span class="description">Users</span>
                    </a>
                </div>

                <div class="list-item">

                    <a href="tiket.php">
                        <i class="bi bi-upc"></i>
                        <span class="description">Ticket</span>
                    </a>
                </div>



            </div>

        </div>

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
                </div>

                <div class="isi">
                    <div class="head-content">
                        <button type="submit" id="add"><i class="bi bi-plus-lg"></i> New</button>

                    </div>
                    <div class="neck-content">
                        <span>
                            <form action="" method="post">

                                <label for="">Show</label>
                                <select id="entries" name="entries">
                                    <option value="10">1</option>
                                    <option value="20">2</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                <label for="">entries</label>
                                <button type="submit" name="set">set</button>
                            </form>
                        </span>

                        <span>

                            <label for="">Search: </label>
                            <input type="text">
                        </span>
                    </div>

                    <div class="tabel-content">


                        <table border="1">
                            <tr>
                                <th>id user</th>
                                <th>Rute</th>
                                <th>tanggal transaksi</th>
                                <th>Total Harga</th>

                                <th>Tools</th>
                            </tr>
                            <?php foreach ($res as $tr) : ?>

                                <tr>

                                    <td><?= $tr["id_user"] ?> </td>
                                    <td><?= $tr["asal"] ?> - <?= $tr["tujuan"] ?></td>
                                    <td><?= $tr["tanggal_transaksi"] ?></td>
                                    <td><?= $tr["total_harga"] ?></td>

                                    <td width="15%">



                                        <a href="crud/delete.php?id=">
                                            <button style="background-color:rgb(177, 7, 7)"><i class="bi bi-trash3-fill"></i> Delete</button>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                    </div>
                    <div class="info">
                        <p>Showing 1 to 10</p>
                    </div>
                </div>
            </div>
        </div>




    </div>
    </div>

</body>


</html>