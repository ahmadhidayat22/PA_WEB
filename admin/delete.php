<?php
include '../koneksi.php';

$id = $_GET['id'];


$cek_trx = mysqli_query($conn, "select * from transaksi where id_tiket = '$id'");

$t = [];
while ($rec = mysqli_fetch_assoc($cek_trx)) {
        $t[] = $rec;
}

if($t != null){
    mysqli_query($conn, "delete from transaksi where id_tiket = '$id'");

}

$result = mysqli_query($conn, "delete from tiket where id_tiket = '$id'");

if ($result){
    echo
    "
    <script>
    // alert('Success');
    window.location.href = 'tiket.php';

    </script>
    ";

}else{
    echo
    "
    <script>
    alert('fail');
    // window.location.href = 'tiket.php';

    </script>
    ";  
}



?>