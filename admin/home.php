<?php
require '../koneksi.php'



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css?v=1.3">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <title>Admin</title>


    <style>
        .container .sidebar .main .list-item:nth-child(2) {
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
                    <p>Dashboard</p>
                </div>

                <div class="middle">

                    <div class="card-list">
                        <div class="containt">
                            <?php $result = mysqli_query($conn, "SELECT SUM(total_harga) AS numrows FROM transaksi;");
                            $row = mysqli_fetch_array($result);
                            echo "
                                <div class='left-contain'>
                                <h3>Rp " . $row['numrows'] . "</h3>
                                <p>Total Sales</p>
                
                                </div>
                                
                                ";
                            ?>

                            <div class="icon">
                                <i class="bi bi-cart-fill"></i>
                            </div>

                        </div>
                        <div class="details details1">
                            <p>More info</p>
                            <i class="bi bi-arrow-right-circle-fill"></i>
                        </div>
                    </div>

                    <div class="card-list">
                        <div class="containt">

                            <?php $result = mysqli_query($conn, "SELECT *, COUNT(*) AS numrows FROM users ");
                            $row = mysqli_fetch_array($result);
                            echo "
                                <div class='left-contain'>
                                <h3>" . $row['numrows'] . "</h3>
                                <p>Total of User</p>
                
                                </div>
                                
                                ";
                            ?>

                            <div class="icon">
                                <i class="bi bi-people"></i>
                            </div>

                        </div>
                        <div class="details details2">
                            <p>More info</p>
                            <i class="bi bi-arrow-right-circle-fill"></i>
                        </div>
                    </div>

                    <div class="card-list">
                        <div class="containt">
                            <?php $result = mysqli_query($conn, "SELECT *, COUNT(*) AS numrows FROM tiket ");
                            $row = mysqli_fetch_array($result);
                            echo "
                                <div class='left-contain'>
                                <h3>" . $row['numrows'] . "</h3>
                                <p>Total of Ticket</p>
                
                                </div>
                                
                                ";
                            ?>

                            <div class="icon">
                                <i class="bi bi-people"></i>
                            </div>


                        </div>
                        <div class="details details3">
                            <p>More info</p>
                            <i class="bi bi-arrow-right-circle-fill"></i>
                        </div>
                    </div>

                    <div class="card-list">
                        <div class="containt">

                            <?php $result = mysqli_query($conn, "SELECT SUM(total_harga) AS numrows FROM transaksi WHERE EXTRACT(DAY FROM tanggal_transaksi)  = EXTRACT(DAY FROM NOW())");

                            $row = mysqli_fetch_array($result);
                            if ($row['numrows'] != NULL) {
                                echo "
                                <div class='left-contain'>
                                <h3>Rp " . $row['numrows'] . "</h3>
                                <p>Sales Today</p>
                
                                </div>
                                
                                ";
                            } else {
                                echo "
                                <div class='left-contain'>
                                <h3>Rp 0</h3>
                                <p>Sales Today</p>
                
                                </div>
                                
                                ";
                            }
                            ?>
                            <div class="icon">
                                <i class="bi bi-cash"></i>
                            </div>
                        </div>
                        <div class="details details4">
                            <p>More info</p>
                            <i class="bi bi-arrow-right-circle-fill"></i>
                        </div>
                    </div>



                </div>
            </div>

            <!-- <h2>p</h2> -->
        </div>


        <script src="script.js"></script>
</body>

</html>