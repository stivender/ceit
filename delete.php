<?PHP

include("config.php");

$emp_id = $_GET['id'];

$sql = "DELETE FROM Employee WHERE id = $emp_id ";
$result = mysqli_query($conn, $sql) or die("Data not deleted!");

header('location:viewdata.php');

mysqli_close($conn);

?>
