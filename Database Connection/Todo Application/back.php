<?php

require_once __DIR__ . "/connect.php";

$todo = $_POST["todo"];
$priority = $_POST["priority"];

if (isset($_GET["filter"])) {
  $filters = json_decode($_GET["filter"], true);
} else {
  die("Something went wrong");
}

// echo "<pre>";
// var_dump($filters);
// echo "</pre>";

// die();

$sql = "INSERT INTO todo (todo, priority) VALUES ('$todo', '$priority')";

$res = mysqli_query($conn, $sql);

if ($res) {
  $msg = "Todo created successfully";
  $completion = $filters["completion-filter"];
  $priority = $filters["priority-filter"];
  header("Location: index.php?msg=$msg&complete=$completion&priority=$priority");
  die();
}
