<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "taitonaki";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

$username = $_POST["u_name"];
$age = $_POST["age"];
$email = $_POST["email"];
$password = $_POST["psw"];

$sql = "INSERT INTO miniAuth (username, age, email, password)
VALUES ('$username', '$age', '$email', '$password')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
