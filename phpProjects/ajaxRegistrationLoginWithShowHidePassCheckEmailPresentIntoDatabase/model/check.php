<?php
include('../config/dbconnection.php');
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 
//$sql = "INSERT INTO login(email,pass,status)VALUES ('".$_POST["email"]."','".$_POST["psw"]."','Active')";
if(isset($_POST['email'])){
	$sql = "Select email from login where email='".$_POST['email']."'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
   		echo "<span class='text-danger'>Email not available</span>";
	} else {
   		echo "<span class='text-danger'>Email  available</span>";
	}
}

$conn->close();

?>
