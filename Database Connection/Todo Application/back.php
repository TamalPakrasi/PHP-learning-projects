<?php

require_once __DIR__ . "/connect.php";

$todo = $_POST["todo"];
$priority = $_POST["priority"];

// echo "<pre>";
// var_dump($_SERVER);
// echo "</pre>";

// die();

$sql = "INSERT INTO todo (todo, priority) VALUES ('$todo', '$priority')";

$res = mysqli_query($conn, $sql);

if ($res) {
  $msg = "Todo created successfully";
  header("Location: index.php?msg=$msg");
  die();
}
