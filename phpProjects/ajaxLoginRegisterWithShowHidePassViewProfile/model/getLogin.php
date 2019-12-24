<?php
include('../config/dbconnection.php');
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 
$myusername = $_POST["email"];
$mypassword = $_POST["psw"];

$sql = "SELECT email,pass,status FROM login WHERE email = 'user@gmail.com'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

if($row['email'] == $myusername && $row['pass'] == $mypassword && $row['status'] == 'Active' ) {
	echo "Login Successfully";
}
else {
	//echo "Error: " . $sql . "" . mysqli_error($conn);
	echo "Invalide Email and Password";
}
$conn->close();
?>