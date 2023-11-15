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
    <script src="script2.js" defer></script>
</head>
<body>
    <section class="landing">
        <div class="nav">
            <div class="nav-1">
                <img src="img/logo2.png" alt="">
            </div>
            <div class="nav-2"> 
                <a href="#home">Home</a>
                <a href="#body">Tiket</a>
                <a href="#kontak">Kontak</a>
            </div>
            <div class="nav-3">
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
                        <div class="tkt">
                            <div class="input">
                                <label for="">Asal Anda <i class="fa-solid fa-ship"></i> : </label>
                                <input type="text" name="asal" id="">
                                <label for="">Tujuan Anda <i class="fa-solid fa-ship"></i> : </label>
                                <input type="text" name="tujuan" id="">
                            </div>
                            <div class="input1">
                                <label for="">Tanggal Berangkat <i class="fa-solid fa-calendar-days"></i> : </label>
                                <input type="date" name="berangkat" id="">
                                <label for="">Tanggal Tiba <i class="fa-solid fa-calendar-days"></i> : </label>
                                <input type="date" name="tiba" id="">
                            </div>
                        </div>
                        <button class="pesan" id="pesan" type="submit" name="pesan">Cari Tiket</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="tabel-content">
            <div class="cari_tiket">
                <h2>Tiket Anda <i class="fa-solid fa-ship"></i></h2><br>
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
                            <h3>Asal Anda: </h3><br/>
                            <h4>" . $tk['asal'] . "</h4><br>
                            <h3>Tujuan Anda: </h3><br/>
                            <h4>" . $tk['tujuan'] . "</h4><br>
                            <h3>Tanggal Berangkat: </h3><br/>
                            <h4>" . $tk['tanggal_berangkat'] . "</h4><br>
                            <h3>Tanggal Tiba: </h3><br/>
                            <h4>" . $tk['tanggal_tiba'] . "</h4><br>
                            <h3>Harga Tiket: </h3><br/>
                            <h4>" . $tk['harga'] . "</h4><br>
                            
                            ";
                        }
                    } else {
                        echo "
                                <script>
                                alert('Tiket Tidak Di temukan!');
                                document.location.href = 'index.php#body'; 
                                </script>
                                ";
                            } 
                        }
                        ?>
                <a href="bayar.php?id_tiket=<?=$tk["id_tiket"];?>" class="bayar">Pesan Tiket</a>
            </div>
        </div>
    </section>
    <section class="kontak" id="kontak">
        <div class="wa">
            <i class="fa-solid fa-phone" ><a href="https://wa.me/+6283143283990"> Alif Fadlan B</a></i><br>
            <i class="fa-solid fa-phone" ><a href="https://wa.me/+6282353585277"> Ahmad Nurhidayat</a></i><br>
            <i class="fa-solid fa-phone" ><a href="https://wa.me/+6282154576535"> Brayen Tisra S</a></i><br>
        </div>
        <div class="ig">
            <i class="fa-brands fa-instagram"><a href="https://instagram.com/fadlan_hubzun/"> fadlan_hubzun</a></i><br>
            <i class="fa-brands fa-instagram"><a href="https://www.instagram.com/_ahmad.hidayat03/"> _ahmad.hidayat03</a></i><br>
            <i class="fa-brands fa-instagram"><a href="https://www.instagram.com/brayen_tisra/"> brayen_tisra</a></i><br>
        </div>
        <div class="git">
            <i class="fa-brands fa-github"><a href="https://github.com/ahmadhidayat22/PA_WEB.git"> Link github</a></i>
        </div>
        <div class="footer">
            <p>  </p><br>
            <p>©2023 PT.Perkapalan Indonesia. All Right Reserved.</p>
        </div>
    </section>
    <script src="script2.js"></script>
</body>
</html>