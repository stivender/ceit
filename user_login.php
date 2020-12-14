<?php
include("config.php");

$username = $_POST['username'];
$password = sha1($_POST['password']);

$sql = "select * from login where username = '$username' and password = '$password'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)> 0){
              while($row = mysqli_fetch_assoc($result)){
                session_start();
                $_SESSION["username"] = $row['username'];
                header("Location:viewdata.php");
              }
            }
          else{
              echo "<h1> Login failed. Invalid username or password.</h1>";
          }

 ?>
