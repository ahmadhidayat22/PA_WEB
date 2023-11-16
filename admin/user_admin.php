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

$user = [];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/tiket.css?v=1.4">
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
            <div class="modal" id="mymodal">
                <div class="modal-content">
                    <div class="header-content">
                        <h3>Add New Tiket</h3>
                    </div>
                    <div id="close"><i class="bi bi-x"></i></div>

                    <div class="isi-kontent">

                        <form action="" method="post">
                            <table>
                                <tr>
                                    <td><label for="">Asal</label></td>
                                    <td><input type="text" name="asal" autocomplete="off" required></td>
                                    <td><label for="">Tanggal Berangkat</label></td>
                                    <td><input type="date" name="tgl_berangkat" id="datemin" required></td>
                                </tr>
                                <tr>
                                    <td><label for="">Tujuan</label> </td>
                                    <td><input type="text" name="tujuan" autocomplete="off" required></td>
                                    <td><label for="">Tanggal Tiba</label></td>
                                    <td><input type="date" name="tgl_tiba" id="datemin1" required></td>
                                </tr>

                                <tr>
                                    <td><label for="">Harga</label></td>
                                    <td><input type="number" name="harga" autocomplete="off" required></td>
                                </tr>


                            </table>
                            <div class="footer-content">

                                <button id="clos"><i class="bi bi-x"></i> Close</button>
                                <button type="submit" name="tambah"><i class="bi bi-floppy2-fill"></i> Save</button>
                            </div>

                        </form>
                    </div>


                </div>
            </div>
            <div class="wrapper">
                <div class="header">
                    <a href="users.php" style="color:black;"><i class="bi bi-arrow-left"></i>User </a>
                    <a href="" style="color:black">Admin</a>

                </div>

                <div class="isi">
                   
                    <div class="neck-content">


                        <span>
                            <form action="" method="post">

                                <label for="">Search: </label>
                                <input type="search" name="cari" id="search">
                            </form>
                        </span>
                    </div>

                    <div class="tabel-content">
                        <table>
                            <tr>
                                <th>Picture</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Age</th>
                                <th>Role</th>
                            </tr>
                            <?php
                            $keyword= '';
                            if (isset($_POST['cari'])) {
                                $keyword = $_POST['cari'];
                                $result = mysqli_query($conn, "select * from users where Username like '%$keyword%' or Email like '%$keyword%' and role = 'admin
                                ");
                            }else{
                                $result = mysqli_query($conn, "select * from users where role ='admin'");
                            }
                            while ($record = mysqli_fetch_assoc($result)) {
                                $user[] = $record;
                            }
                            foreach ($user as $sr) :
                                echo "
                            <tr>
                                <td width='10%'><img src='../img/" . $sr["gambar"] . "' alt='' width='40px'></td>
                                    <td>" . $sr["Username"] . "</td>
                                    <td>" . $sr["Email"] . "</td>
                                    <td>" . $sr["Age"] . "</td>
                                    <td>" . $sr["role"] . "</td>         
                                    ";

                            endforeach;

                            ?>


                        </table>
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
        
            datemin.min = new Date().toISOString().split("T")[0];
            datemin1.min = new Date().toISOString().split("T")[0];
        </script>

</body>

</html>