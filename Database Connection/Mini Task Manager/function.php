<?php

function dumpDie($param) {
  echo "<pre>";
  var_dump($param);
  echo "</pre>";
  die();
}

function abort(string $msg, int $code = 500) {
  http_response_code($code);
  dumpDie($msg);
}

function redirection(string $msg) {
  header("Location: index.php?msg=$msg");
  die();
}