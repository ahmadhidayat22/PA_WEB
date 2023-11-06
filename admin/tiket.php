<?php
require '../koneksi.php';

if (isset($_POST['tambah'])) {
    $asal = $_POST['asal'];
    $tujuan = $_POST['tujuan'];
    $tgl_berangkat = $_POST['tgl_berangkat'];
    $tgl_tiba = $_POST['tgl_tiba'];
    $harga = $_POST['harga'];



    if ($asal != $tujuan) {
        $result = mysqli_query($conn, "insert into tiket values ('','$asal','$tujuan','$tgl_berangkat','$tgl_tiba','$harga')");

        if ($result) {
            echo "
            <script>
            alert('Data Berhasil Ditambahkan!');
            document.location.href = 'tiket.php';
            </script>
        ";
        } else {
            echo "
                <script>
                alert('Data Gagal Ditambahkan!');
                document.location.href = 'tiket.php';

                </script>
            ";
        }
    } else {
        echo "
        <script>
        alert('asal dan tujuan tidak boleh sama!');
        document.location.href = 'tiket.php';

        </script>
    ";
    }
}
$entries = 1;
if (isset($_POST['set'])){
    $entries = $_POST['entries']; 
    
}
$result = mysqli_query($conn, "select * from tiket");

$tiket = [];

while ($record = mysqli_fetch_assoc($result)) {
    $tiket[] = $record;
}

if (isset($_POST['set'])){
    $entries = $_POST['entries']; 
    
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/tiket.css?v=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <title>Tiket List</title>

    <style>
        .container .sidebar .main .list-item:nth-child(6) {
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
<!-- 
            <div class="modal" id="mymodal-update">
                <div class="modal-content" id="1">
                    <div class="header-content">
                        <h3>Update Tiket</h3>
                    </div>
                    <div id="close"><i class="bi bi-x"></i></div>
                    
                    

                </div>
            </div> -->



            <div class="wrapper">
                <div class="header">
                    <p>Ticket</p>
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
                                <option value="10" >1</option>
                                <option value="20" >2</option>
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
                                <th>Id</th>
                                <th>Asal</th>
                                <th>Tujuan</th>
                                <th>Tanggal Berangkat</th>
                                <th>Tanggal tiba</th>
                                <th>Harga</th>
                                <th>Tools</th>
                            </tr>
                            <?php foreach ($tiket as $tk) : ?>

                                <tr>
                                    <td><?= $tk["id_tiket"] ?></td>
                                    <td><?= $tk["asal"] ?></td>
                                    <td><?= $tk["tujuan"] ?></td>
                                    <td><?= $tk["tanggal_berangkat"] ?></td>
                                    <td><?= $tk["tanggal_tiba"] ?></td>
                                    <td><?= $tk["harga"] ?></td>

                                    <td width="15%">

                                        <a href="crud/update.php?id=<?= $tk['id_tiket'] ?>">

                                            <button type="submit" id="update" data-id="<?= $tk['id_tiket']?>"><i class="bi bi-pencil-fill"></i> Edit</button>
                                        </a>
                                        

                                        <a href="crud/delete.php?id=<?= $tk['id_tiket'] ?>">
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