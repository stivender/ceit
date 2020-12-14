<?php
include("config.php");

if(isset($_POST["query"]))
{
  $search = mysqli_real_escape_string($conn, $_POST["query"]);
  $query = "
  SELECT * FROM employee
  WHERE first_name LIKE '%".$search."%'
  OR last_name LIKE '%".$search."%'
  OR email LIKE '%".$search."%'
  OR phone LIKE '%".$search."%'
  ";
}
else
{
$query = "SELECT * FROM employee ORDER BY id";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) .> 0)
{
 ?>
 <table cellpadding="7px" class="table table-striped">
        <thead class="thead-dark ">
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>email</th>
      </thead>
      <?php

    while($row = mysqli_fetch_array($result))
    {
      ?>
      <tr>
        <td> <?php echo $row['Employee_id']; ?> </td>
        <td> <?php echo $row['First_Name']; ?> </td>
        <td> <?php echo $row['Last_Name']; ?> </td>
        <td> <?php echo $row['Email']; ?> </td>
        <td>
          <img src="<?php echo $row['Photo']; ?>" height="50px"
          width="50px"/>
        </td>
      </tr>
      <?php
    }
  }
  else {
{
  echo 'Data Not Found';
}
?>
