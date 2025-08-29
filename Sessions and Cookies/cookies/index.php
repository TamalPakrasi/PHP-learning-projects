<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST["username"];
  setcookie("username", $username, time() + 2 * 24 * 60 * 60, "/");
  header("Location: index.php");
}

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["msg"])) {
  if ($_GET["msg"] === "deletecookie" && isset($_COOKIE["username"])) {
    setcookie("username", $_COOKIE["username"], time() - 3600, "/");
  }
  header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cookies</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      min-height: 100dvh;
      display: flex;
      flex-direction: column;
      gap: 15px;
      justify-content: center;
      align-items: center;
    }
  </style>
</head>

<body>
  <?php
  if (isset($_COOKIE["username"])) {
    var_dump($_COOKIE);
    echo $_COOKIE["username"];
    echo "\naa gya firse!";
  } else {
    echo "first time!";
  }
  ?>

  <form action="index.php" method="post">
    <input type="text" name="username" id="username">
    <input type="submit" value="submit">
  </form>

  <button onclick="location.href='index.php?msg=deletecookie';">
    Delete Cookie!
  </button>
</body>

</html>