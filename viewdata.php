<?php
include "config.php";
session_start();
if(!isset($_SESSION['username']))
{
  header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Employee Details</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Bilbo' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.css">
  </head>
  <body>
    <div class="container text-center">
      <img src="images/banner.jpg" alt="" width="100%" height="130px">
      <ul>
        <li><a class="active" href="#">
        <i class="fas fa-home"></i>  Home
        </a></li>
        <li style="float:right"><a href="logout.php">
          <i class="fas fa-sign-in-alt"></i>&nbsp;Logout</a></li>

          <li style="float:right">
            <a href="#"> Welcome <?php echo $_SESSION['username']; ?> !  </a></li>
    </ul>
    </div>


    <!-- viewdata.php code starts -->
    <div class="container col-md-4">
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="email">First Name</label>
          <input type="text" class="form-control" placeholder="Enter first name" id="firstname" name="firstname">
        </div>

        <div class="form-group">
          <label for="email">Last Name</label>
          <input type="text" class="form-control" placeholder="Enter last name" id="lastname" name="lastname">
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control" placeholder="Enter Email" id="email" name="email">
        </div>

        <div class="form-group">
          <label>Select Image File:</label>
          <input type="file" name="file" id="file" class="form-control">
        </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
      <!-- form closed here -->

      <!-- php code to submit data into the mysql table -->
      <?php
    // If submit button is clicked ...
    if (isset($_POST['submit'])) {
        include "config.php";
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $emailid = $_POST['email'];
        $files = $_FILES["file"];
        $filename = $files['name'];
        $fileerror =$files['error'];
        $filetemp = $files['tmp_name'];


         $fileext = explode('.',$filename);
         $filecheck  = strtolower(end($fileext));

         $fileextstored = array('png','jpg','jpeg');
         if(in_array($filecheck,$fileextstored)){
         $destinationfile = "images/".$filename;

         // Now let's move the uploaded image into the folder: images
         move_uploaded_file($filetemp, $destinationfile);

          // store all the submitted data from the form
          $sql = "INSERT INTO employee(firstname,lastname,email,photo,date_time) VALUES ('$firstname','$lastname','$emailid','$destinationfile',now())";

          // Execute query
          $query = mysqli_query($conn, $sql);

        }
        else
        {
        echo '<div class="text-danger">only png , jpg ,jpeg format is allowed!</div>';
        }
    }

  ?>
    </div>
    <!-- php code to submit the data into the table ends here! -->

    <!-- php code to display data  -->
    <div class="container col-md-12">
      <h2>All Records</h2>
      <?php
      include "config.php";

      $sql = "SELECT * FROM employee order by id";

      $result = mysqli_query($conn, $sql) or die("Sorry! Query Unsuccessful.");

      if(mysqli_num_rows($result) > 0)  {

      ?>
      <table cellpadding="7px" class="table table-bordered table-hover table-striped">
            <thead class="thead-dark ">
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Photo</th>
            <th>Action</th>
            </thead>
            <tbody>
              <?php
                  while($row = mysqli_fetch_assoc($result)) {
                  ?>
                  <tr>

                  <td> <?php echo $row['id']; ?> </td>
                  <td> <?php echo $row['firstname']; ?> </td>
                  <td><?php echo $row['lastname']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td>
                    <img src="<?php echo $row['photo']; ?>" height="50px" width="50px"/>
                  </td>
                  <td>
                    <a href="edit.php" emp_id=<?php echo $row['id']; ?>" class="btn btn-primary"><i class="fas" fa-pen">
                    </i>EDIT</a>

                    <a href="edit.php" emp_id=<?php echo $row['id']; ?>" class="btn btn-primary"><i class="fas" fa-pen">
                    </i>DELETE</a>

                  </td>

                </tr>
                <?php
                }
                ?>
                </body>
            </table>
                  <?php
                }
                  else   {
                    echo "<h2>No Records Found</h2>";
                  }
                  mysqli_close($conn);
                  ?>

    </div>
  </body>
</html>
