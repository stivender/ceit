<?php
include("header1.php");
session_start();
if(!isset($_SESSION['username']))
{
  header("Location:login1.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>
    <div class="container col-md-6">
      <h2 class="bg-dark text-white">Please register!</h2>
      <form action="register.php" method="post">

        <div class="form-group">
          <label>First Name</label>
          <input type="text" class="form-control" placeholder="Enter First Name" id="email" name="fname">
        </div>

        <div class="form-group">
          <label >Last Name</label>
          <input type="text" class="form-control" placeholder="Enter Last Name" id="" name="lname">
        </div>
        <div class="form-group">
          <label >Email</label>
          <input type="email" class="form-control" placeholder="Enter Email" id="" name="email">
        </div>

        <div class="form-group">
          <label >Phone</label>
          <input type="text" class="form-control" placeholder="Enter Phone No" id="" name="phone">
        </div>

        <div class="form-group">
          <label >Username</label>
          <input type="text" class="form-control" placeholder="Enter Username" id="" name="username">
        </div>

        <div class="form-group">
          <label >Password</label>
          <input type="password" class="form-control" placeholder="Enter Password" id="" name="pass">
        </div>

        <div class="form-group">
          <label >Confirm Password</label>
          <input type="password" class="form-control" placeholder="Enter Confirm Password" id="" name="cpass">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-primary">Reset</button>
      </form>
    </div>
  </body>
</html>
