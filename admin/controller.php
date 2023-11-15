<?php
session_start();

if(isset($_SESSION['admin']) != true){
    header("Location: ../login/login.php");
    
    
}

?>