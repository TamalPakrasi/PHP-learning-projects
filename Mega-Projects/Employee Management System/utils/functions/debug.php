<?php

function dumpDie($param) {
  echo "<pre>";
  var_dump($param);
  echo "</pre>";

  die();
}