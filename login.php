<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="index.css">
  <title>Login</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="" method="post" name="form" autocomplete="off">
                    <h2>Login</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" required name="email">
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" required name="passworde">
                        <label for="">Password</label>
                    </div>
                    
                    <button name="submit" type="submit">Log in</button>
                    <div class="register">
                        <p>Don't have a account? <a href="register.php">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

<?php
    require 'connect.php';
    if(isset($_POST["submit"])){
        $email = $_POST["email"];
        $pass = $_POST["passworde"];

        $query = "SELECT password from users where email='$email'";
        $result = $conn->query($query);
        $row = mysqli_fetch_assoc($result);
        $password = $row['password'];
        $verify = password_verify($pass,$password);
        if($verify){
            session_start();
            $_SESSION["$emid"]=$email;
            echo "
                <script> alert('Login Successful'); </script>
            ";
            header('location: homepage.html');
        }
        else{
            echo "
            <script> alert('Wrong password or email id'); </script>
            ";
        }

    }
?>