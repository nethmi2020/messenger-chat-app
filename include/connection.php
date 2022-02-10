<?php


// $con=mysqli_connect("localhost","root"," ") or die("Connection was not established");

$servername = "localhost";
$username = "root";
$password = "";
$mydb="mychat";


// Create connection
$con = mysqli_connect($servername, $username, $password,$mydb);
// $conn = mysqli_connect($servername, $username, $password);

?>