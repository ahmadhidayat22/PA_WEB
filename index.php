<?php
    require "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. Perkapalan Indonesia</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style1.css">
    <link rel="icon" href="img/logo1.png">
    <script src="script.js" defer></script>
</head>
<body>
    <section class="landing">
        <div class="nav">
            <div class="nav-1">
                <img src="img/logo1.png" alt="">
            </div>
            <div class="nav-2"> 
                <a href="#home">Home</a>
                <a href="#body">Tiket</a>
                <a href="#kontak">Kontak</a>
            </div>
            <div class="nav-3">
                <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                <a href="login/login.php"><i class="fa-solid fa-user"></i></a>
                <i class="fa-solid fa-moon" id="toggleDark"></i>
                <a href="#" id="hamburger"><i class="fa-solid fa-bars-staggered"></i></a> 
            </div>
        </div>
        <section class="hero" id="home">
            <main class="content">
                <h1>Taklukkan Ombak Bersama Kami: Pesan Tiket Kapal Online Sekarang!</h1>
                <h3>Tentukan dan pesan tiket kapal anda</h3>
                <a href="#body" class="cta">Beli Sekarang!</a>
            </main>
        </section>
    </section>
    <section class="body" id="body">
        <div class="tiket">
            <div class="card">
                <div class="about">
                    <h1>Pencarian Tiket</h1>
                    <form action="" method="post">
                        <table class="table">
                            <tr>
                                <th><label for="">Asal Anda <i class="fa-solid fa-ship"></i> : </label></th>
                                <th><label for="">Tujuan Anda <i class="fa-solid fa-ship"></i> : </label></th>
                            </tr>
                            <tr>
                                <td><input type="text" name="asal" id=""></td>
                                <td><input type="text" name="tujuan" id=""></td>
                            </tr>
                            <tr>
                                <th><label for="">Tanggal Berangkat <i class="fa-solid fa-calendar-days"></i> : </label></th>
                                <th><label for="">Tanggal Tiba <i class="fa-solid fa-calendar-days"></i> : </label></th>
                            </tr>
                            <tr>
                                <td><input type="date" name="berangkat" id=""></td>
                                <td><input type="date" name="tiba" id=""></td>
                            </tr>
                            <tr>
                                <th colspan="2"><button class="pesan" type="submit" name="pesan">Cari Tiket</button></th>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="tabel-content">
                <?php
                if (isset($_POST['pesan'])) {
                    
                    $asal = $_POST['asal'];
                    $tujuan = $_POST['tujuan'];
                    $berangkat = $_POST['berangkat'];
                    $tiba = $_POST['tiba'];
                    
                    $result = mysqli_query($conn, "SELECT * FROM tiket WHERE asal = '$asal' AND tujuan ='$tujuan' AND tanggal_berangkat ='$berangkat' AND tanggal_tiba ='$tiba'");
                    $record = mysqli_fetch_assoc($result);
                    if ($result->num_rows === 1) {
                        $tiket[] = $record;
                        
                        foreach ($tiket as $tk) {
                            
                            echo "
                            <h4>Asal Anda: </h4><br/>
                            <h5>" . $tk['asal'] . "</h5><br>
                            <h4>Tujuan Anda: </h4><br/>
                            <h5>" . $tk['tujuan'] . "</h5><br>
                            <h4>Tanggal Berangkat: </h4><br/>
                            <h5>" . $tk['tanggal_berangkat'] . "</h5><br>
                            <h4>Tanggal Tiba: </h4><br/>
                            <h5>" . $tk['tanggal_tiba'] . "</h5><br>
                            <h4>Harga Tiket: </h4><br/>
                            <h5>" . $tk['harga'] . "</h5><br>
                            
                            ";
                        }
                    } else {
                        echo "
                                <script>
                                    alert('Tiket Tidak Di temukan!');
                                    document.location.href = 'index.php'; 
                                </script>
                            ";
                    } 
                }
                ?>
                <a href="bayar.php?id_tiket=<?=$tk["id_tiket"];?>">Pesan Tiket</a>
        </div>
    </section>
    <section class="kontak" id="kontak">
        <div class="wa">
            <i class="fa-solid fa-phone" ><a href="https://wa.me/+6282154576535"> Brayen Tisra S</a></i><br>
            <i class="fa-solid fa-phone" ><a href="https://wa.me/+6282353585277"> Ahmad Nurhidayat</a></i><br>
            <i class="fa-solid fa-phone" ><a href="https://wa.me/+6283143283990"> Alif Fadlan B</a></i><br>
        </div>
        <div class="ig">
            <i class="fa-brands fa-instagram"><a href="https://www.instagram.com/brayen_tisra/"> brayen_tisra</a></i><br>
            <i class="fa-brands fa-instagram"><a href="https://www.instagram.com/_ahmad.hidayat03/"> _ahmad.hidayat03</a></i><br>
            <i class="fa-brands fa-instagram"><a href="https://instagram.com/fadlan_hubzun/"> fadlan_hubzun</a></i><br>
        </div>
        <div class="git">
            <i class="fa-brands fa-github"><a href="https://github.com/ahmadhidayat22/PA_WEB.git"> Link github</a></i>
        </div>
        <div class="footer">
            <p>  </p><br>
            <p>©2023 PT.Perkapalan Indonesia. All Right Reserved.</p>
        </div>
    </section>
    <script src="script.js"></script>
</body>
</html>