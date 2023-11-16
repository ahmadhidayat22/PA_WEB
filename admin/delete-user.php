<?php
include '../koneksi.php';

$id = $_GET['id'];
$cek_cart = mysqli_query($conn, "select * from transaksi where id_tiket = '$id'");
$cart = [];
while ($rec = mysqli_fetch_assoc($cek_cart)) {
        $cart[] = $rec;
}

if($cart != null){
    mysqli_query($conn, "delete from transaksi where id_user = '$id'");

}


$result = mysqli_query($conn, "delete from users where id_user = '$id'");

if ($result){
    echo
    "
    <script>
    // alert('Success');
    window.location.href = 'users.php';

    </script>
    ";

}else{
    echo
    "
    <script>
    alert('fail');
    window.location.href = 'users.php';

    </script>
    ";  
}



?>