<?php
require '../koneksi.php';


$result = mysqli_query($conn, "select * from users");

$user = [];

while ($record = mysqli_fetch_assoc($result)) {
    $user[] = $record;
}








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
                        <span class="description">Products</span>
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
                    <p>Users</p>
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
                                <option value="10" >10</option>
                                <option value="20" >20</option>
                                <option value="50" >50</option>
                                <option value="100" >100</option>
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
                        <table>
                            <tr>
                                <th>Picture</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Age</th>
                                <!-- <th>Tanggal tiba</th>
                                <th>Harga</th> -->
                                <th>Tools</th>
                            </tr>
                            <?php foreach ($user as $sr) : ?>

                                <tr>
                                    <td><img src="../img/<?= $sr["gambar"]?>" alt="" width="40px"></td>
                                    <td><?= $sr["Username"] ?></td>
                                    <td><?= $sr["Email"] ?></td>
                                    <td><?= $sr["Age"] ?></td>
                

                                    <td width="15%">

                                        <a href="user-cart.php?id=<?= $sr['Id'] ?>">

    
                                            <button type="submit" id="cart" data-id="<?= $sr['Id']?>" style="background-color:rgb(22, 143, 173)"><i class="bi bi-search"></i> Cart</button>
                                        </a>
                                        
                                        <a href="crud/update.php?id=<?= $sr['Id'] ?>">

                                            <button type="submit" id="update" data-id="<?= $sr['Id']?>"><i class="bi bi-pencil-fill"></i> Edit</button>
                                        </a>
                                        

                                        <a href="crud/delete.php?id=<?= $sr['Id'] ?>">
                                            <button style="background-color:rgb(177, 7, 7)"><i class="bi bi-trash3-fill"></i> Delete</button>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>


                        </table>
                    </div>
                    <div class="info">
                        <p>Showing 1 to 10</p>
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