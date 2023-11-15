<link rel="stylesheet" href="../css/sidebar.css?v=2">
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>


<div class="sidebar">
    <div class="header">
        <a href="#">

            <div class="list-item">
                <span class="description-header">Booking Site</span>
            </div>

        </a>

        <div class="info-user">
            <div class="picture">
                <?php
                session_start();
                require '../koneksi.php';
                $id_u = $_SESSION['id_user'];

                $hasil = mysqli_query($conn, "select gambar from users where id_user = '$id_u'");
                $gambar = [];
                while ($record = mysqli_fetch_assoc($hasil)) {
                    $gambar[] = $record;
                }
                
                echo "
                <img src='../img/".$gambar[0]["gambar"] . "' alt=''>
                "
                ?>
                <div class="circle">
                    <i class="bi bi-pencil"></i>

                </div>
                <div class="layer"></div>


            </div>


            <div class="content" id="content">
                <h5>ADMIN</h5>

                <div class="online">
                    <div class="info"></div>
                    <p>online</p>

                </div>

            </div>
            <div class="change-pic">
                

                    <i class="bi bi-x"></i>
              
                <div class="head">
                    <p>Change Your image</p>
                </div>
                <div class="file">
                    <form action="../admin/update-image.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="gambar" id="gambar">
                        <button type="submit" name="change">Change</button>
                    </form>
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
        <div class="list-item logout">

            <a href="../login/logout.php">
                <i class="bi bi-power"></i>
                <span class="description">Logout</span>
            </a>
        </div>



    </div>

</div>

<script>
    $('.picture').click(function() {
        $('.change-pic').toggle();
    })
    $('.bi-x').click(function() {
        $('.change-pic').css('display', 'none');

    })
</script>