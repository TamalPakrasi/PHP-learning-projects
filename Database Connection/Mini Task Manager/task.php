<?php
require_once __DIR__ . "/connect.php";
require_once __DIR__ . "/function.php";

$sql1 = "SELECT `username` FROM `taskuser`";

$resUser = mysqli_query($conn, $sql1);

if (!$resUser) {
  abort("Failed to fetch users", 500);
}

$sql2 = "SELECT t.isComplete, t.task, t.priority, u.username AS `worker` FROM `tasks` `t` JOIN `taskuser` `u` ON t.userId = u.userId ORDER BY t.created_at DESC";

$resTask = mysqli_query($conn, $sql2);

if (!$resTask) {
  abort("Failed to fetch tasks", 500);
}

?>

<?php 
$title = "Tasks";
include __DIR__ . "/partials/head.php";
?>