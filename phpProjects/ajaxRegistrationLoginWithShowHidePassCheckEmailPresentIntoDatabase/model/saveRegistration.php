<?php
include('../config/dbconnection.php');
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO login(email,pass,status)VALUES ('".$_POST["email"]."','".$_POST["psw"]."','Active')";

if (mysqli_query($conn, $sql)) {
   echo "Registration Successfully.";
} else {
   echo "Error: " . $sql . "" . mysqli_error($conn);
}
$conn->close();

?>
