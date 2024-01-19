<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CityTales</title>
    <link rel="stylesheet" href="index.css">

    <style>
        
        *{
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .container{
                margin: auto;
                max-width: 80vw;
                display: flex;
                justify-content: space-between;
                flex-wrap: wrap;
            }

            .card{
                margin-top: 1rem;
                width: 100%;
                border: solid 2px #8ab92d;
                border-radius: 30px;
                padding: 30px;
            }

            h1,p{
                margin-top: 2rem;
                line-height: 2rem;
                letter-spacing: 3px;
            }

            textarea{
                border-radius: 30px;
                align: center;
                padding: 30px;
            }

            button{
                background-color: #8ab92d;
                align-self: center;
                position: relative;
                width: relative;
            }
    </style>
</head>
<body style="background-color: #ffffff">









    <!-- FORUM STARTS HERE -->
    <div class="basicform">
                <form action="pofg.php" method="post" name="form">
                    <!-- Share your thoughts : <input type="text" name="comment" id="comment"> -->
                    <h3>REVIEWS</h3>
                    <br>
                    <textarea cols="255" rows="7" placeholder="Enter here.." name="comment" required></textarea>
                    
                    <br>
                    <br>
                    <button name="submit" type="submit">Post</button>
                </form>
    </div>


            

    <div class="container">
                    <?php
                        require 'connect.php';
                        $sql1 = "SELECT username,post FROM pofg";
                        $result = $conn->query($sql1);
                            if($result-> num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    echo "<div class='card'><h1>".$row["username"]."</h1><p>".$row["post"]."</p></div>";   
                                }
                            }
                        $conn->close();
                    ?>
    </div>
    <!-- FORUM ENDS -->
</body>
</html>

<?php
    require 'connect.php';
    if(isset($_POST["submit"])){
        $comment = $_POST["comment"];
        session_start();
        $emid="";
        $email=$_SESSION["$emid"];
        
        $query = "SELECT username from users where email='$email'";
        $result = $conn->query($query);
        $row = mysqli_fetch_assoc($result);
        $un = $row['username'];
        $sqlquery = "UPDATE users SET comment = '$comment' WHERE email='$email'";
        $sqlquery = "INSERT INTO pofg VALUES('$un','$comment')";
        mysqli_query($conn,$sqlquery);
        header('location: pofg.php');


        
    }
?>