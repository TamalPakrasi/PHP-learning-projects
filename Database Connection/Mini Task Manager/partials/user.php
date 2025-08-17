<?php
$fieldName = "Add New User";
$name = "adduser";
$placeholder = "New username..."
?>


<form action="back.php?operation=adduser" method="post">
  <?php require_once __DIR__ . "/textInput.php" ?>
</form>