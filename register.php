<?php
include("config.php");

// storing all the data from the register form
$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$emailid = $_POST['email'];
$phoneno = $_POST['phone'];
$uname = $_POST['username'];
$password = sha1($_POST['pass']);
$cpassword = sha1($_POST['cpass']);

// Attempt create database query execution
$sql = "INSERT INTO login(firstname,lastname,email,phone,username,password,confirm_password) VALUES ('$firstname','$lastname','$emailid','$phoneno','$uname','$password','$cpassword')";
if(mysqli_query($conn, $sql))
{
  header('Location:login.php');
}
else
{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
// Close connection
mysqli_close($conn);
?>
