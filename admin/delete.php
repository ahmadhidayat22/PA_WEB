<?php
include '../koneksi.php';

$id = $_GET['id'];


$cek_trx = mysqli_query($conn, "select * from transaksi where id_tiket = '$id'");

$t = [];
while ($rec = mysqli_fetch_assoc($cek_trx)) {
        $t[] = $rec;
}

if($t != null){
    // echo
    // "
    // <script>
    // const text = 'menghapus tiket ini akan menghapus data pada cart user\nklik OK untuk melanjutkan'
    // if(confirm(text) == false){
    //     window.location.href = 'user-cart.php';
    //     exit();
    // }else{
    
    // }
    

    // </script>
    // ";
    $del_trx = mysqli_query($conn, "delete from transaksi where id_tiket = '$id'");

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