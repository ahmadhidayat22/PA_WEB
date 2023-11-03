<?php
include '../koneksi.php';

$id = $_GET['id'];

$result = mysqli_query($conn, "delete from transaksi where id_transaksi = '$id'");

if ($result){
    echo
    "
    <script>
    alert('Success');
    window.location.href = 'user-cart.php';

    </script>
    ";

}else{
    echo
    "
    <script>
    alert('fail');
    window.location.href = 'user-cart.php';

    </script>
    ";  
}