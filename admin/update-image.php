<?php
require '../koneksi.php';
$id = $_SESSION['id_user'];

if (isset($_POST['change'])) {
    $date = date('Y-m-d');
    $image = $_FILES['gambar']['name'];
    $explode = explode('.', $image);
    $ekstensi = strtolower(end($explode));
    $new_image = "$date.$id.$ekstensi";
    $temp = $_FILES['gambar']['tmp_name'];


    if (move_uploaded_file($temp, '../img/' . $new_image)) {
    
        
        $result = mysqli_query($conn, "update users set gambar = '$new_image' where id_user= '$id'");
        if ($result) {
            echo "berhasil";
            header("Location: home.php");
        } else {
            echo "<script>
                alert('failed');
                
                </script>";
                header("Location: home.php");
        }
    }
}
