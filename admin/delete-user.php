<?php
include '../koneksi.php';

$id = $_GET['id'];

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