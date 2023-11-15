<?php 
   session_start();
    if(!isset($_SESSION['valid'])){
        echo "
        <script>
        alert('Anda Perlu Login Terlebih Dahulu!');
        document.location.href = '../login/login.php'; 
        </script>
        ";
    }

   include("../koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Change Profile</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php 
               if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $age = $_POST['age'];

                $id = $_SESSION['id'];

                $edit_query = mysqli_query($conn,"UPDATE users SET Username='$username', Email='$email', Age='$age' WHERE id_user=$id ") or die("error occurred");

                if($edit_query){
                    echo "<div class='message'>
                    <p>Profile Updated!</p>
                    </div> <br>";
                    echo "<a href='../user/home.php'><button class='btn'>Go Home</button>";
                    
                }
            }else{

                $id = $_SESSION['id'];
                $query = mysqli_query($conn,"SELECT*FROM users WHERE id_user=$id ");
                
                while($result = mysqli_fetch_assoc($query)){
                    $res_Uname = $result['Username'];
                    $res_Email = $result['Email'];
                    $res_Age = $result['Age'];
                }
                
            ?>
            <header>Change Profile</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="<?php echo $res_Uname; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo $res_Email; ?>" autocomplete="off" required>
                </div>
                
                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" value="<?php echo $res_Age; ?>" autocomplete="off" required>
                </div>
                
                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Update" required>
                </div>
                
            </form>
            <div class="right-links">
                <a href="logout.php"> <button class="btn">Log Out</button> </a>
            </div>
        </div>
        <?php } ?>
    </div>
</body>
</html>