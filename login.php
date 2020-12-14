<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>
    <div class="container col-md-6">
      <h2 class="bg-dark text-white">Login</h2>
      <form action="user_login.php" method="post">
        <div class="form-group">
          <label >Username</label>
          <input type="text" class="form-control" placeholder="Enter username" id="email" name="username">
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <button type="reset" class="btn btn-primary">Reset</button>
        <p>
          <center>
            <a href="Registration.php" class="text-warning">No Account,Register Here!</a>
          </center>
        </p>
      </form>
    </div>
  </body>
</html>
