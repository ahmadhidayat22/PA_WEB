<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login1.css">
    <title>Login</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">
            <?php 
             
              include("../koneksi.php");
              if(isset($_POST['submit'])){
                $email = mysqli_real_escape_string($conn,$_POST['email']);
                $password = mysqli_real_escape_string($conn,$_POST['password']);

                $result = mysqli_query($conn,"SELECT * FROM users WHERE Email='$email' AND Password='$password' ") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                echo "
                        <script>
                        console.log($row);
                        </script>
                        ";
                if(is_array($row) && !empty($row)){
                    $_SESSION['id'] = $row['id_user'];
                    $res_role = $row['role'];

                    if($res_role == 'admin'){
                    $_SESSION['admin_log'] = true;
                    header("Location: ../admin/home.php");


                    }else if($res_role == 'user'){
                        $_SESSION['valid'] = true;
                        header("Location: ../user/home.php");
                    }else{
                        echo "
                        <script>
                        alert('pler');
                        </script>
                        ";
                    }

                }else{
                    echo "<div class='message'>
                    <p>Wrong Username or Password</p>
                    </div> <br>";
                    echo "<a href='login.php'><button class='btn'>Go Back</button>";
                }
                

                // if(isset($_SESSION['valid'])){
                //     header("Location: ../home.php");
                // }
              }else{

            
            ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Don't have account? <a href="register.php">Sign Up Now</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>