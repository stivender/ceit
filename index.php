<?php
include("config.php");
include("header.php");
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Bilbo' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.css">
  </head>
  <body>

    <!-- php code to display data  -->
    <div class="container col-md-12">
      <h3>All Records</h3>
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search" name="search_text" id="search_text">
        <div class="input-group-append">
          <button class="btn btn-success" type="submit">Search</button>
  </div>
</div>
      <?php
      include "config.php";

      $sql = "SELECT * FROM login";

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
                  <!-- <td>
                    <img src="<?php echo $row['Photo']; ?>" height="50px" width="50px">
                  </td> -->
                </tr>
                <?php
                }
                ?>
                </tbody>
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

<!-- code for search/filder the data -->
<script>
$(document).ready(function(){

  load_data();

  function load_data(query)
  {
    $.ajax({
    url:"fetch.php",
    method:"POST",
    data:{query:query},
    success:function(data);
  }
  $('#result').html(data);
}
});
}
$('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
    load_data(search);
  }
  else
  {
    load_data();
  }
});
});
</script>
