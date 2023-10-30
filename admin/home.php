<?php
require '../server.php'



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css?v=1.1">
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
                    <p>Dashboard</p>
                </div>

                <div class="middle">

                    <div class="card-list">
                        <div class="containt">
                            <div class="left-containt">
                                <h3>Rp 999.999</h3>
                                <p>Total Sales</p>
                            </div>


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
                            <div class="left-containt">
                                <h3>3</h3>
                                <p>Total of Products</p>
                            </div>
                            <div class="icon">
                                <i class="bi bi-upc"></i>

                            </div>

                        </div>
                        <div class="details details3">
                            <p>More info</p>
                            <i class="bi bi-arrow-right-circle-fill"></i>
                        </div>
                    </div>

                    <div class="card-list">
                        <div class="containt">
                            <div class="left-containt">
                                <h3>3</h3>
                                <p>Sales Today</p>
                            </div>
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