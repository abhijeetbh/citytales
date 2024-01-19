<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="index.css">
  <title>Register</title>
</head>
<body>
    <section>
        <div class="form-box1">
            <div class="form-value">
                <form action="" method="post" name="form" autocomplete="off">
                    <h2>Register</h2>
                    <div class="inputbox">
                        <ion-icon name=""></ion-icon>
                        <input type="text" required name="username">
                        <label for="">Username</label>
                    </div>

                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" required name="email">
                        <label for="">Email</label>
                    </div>

                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" required name="password">
                        <label for="">Password</label>
                    </div>
                    
                    <button name="submit" type="submit">Register Account</button>
                    <div class="register">
                        <p>Already have an account? <a href="login.php">Login</a></p>
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
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $hash = password_hash($password,PASSWORD_DEFAULT);

        // $sql2 = "SELECT email FROM users WHERE email='$email'";
        // $r = $conn->query($query);
        // $row = mysqli_fetch_assoc($r);
        // $em = $row['email'];
        // if($em==$email){
        //     echo "
        //     <script> alert('This email is already registered'); </script>
        //     ";
        // }
        
        $query = "INSERT INTO users VALUES('$username','$email','$hash','')";
        mysqli_query($conn,$query);
        header('location: login.php');
        
        
    }
?>