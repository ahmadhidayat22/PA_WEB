<?php
include '../koneksi.php';

$id = $_GET['id'];

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
    window.location.href = 'tiket.php';

    </script>
    ";  
}



?>