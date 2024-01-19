<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="stylesheet" href="index.css">

        <!-- <link rel="stylesheet" href="index.css"> -->

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forum</title>
        <style>
        *{
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body{
            background:radial-gradient(ellipse at center, rgba(255,254,234,1) 0%, rgba(255,254,234,1) 35%, #B7E8EB 100%);
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
        <body>
            <div class="basicform">
                <form action="discussion.php" method="post" name="form">
                    <!-- Share your thoughts : <input type="text" name="comment" id="comment"> -->
                    <h3>FORUM</h3>
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
                        $sql1 = "SELECT username,post FROM comments";
                        $result = $conn->query($sql1);
                            if($result-> num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    echo "<div class='card'><h1>".$row["username"]."</h1><p>".$row["post"]."</p></div>";
                                }
                            }
                        $conn->close();
                    ?>
            </div>

            
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
        $sqlquery = "INSERT INTO comments VALUES('$un','$comment')";
        mysqli_query($conn,$sqlquery);
        header('location: discussion.php');


        
    }
?>