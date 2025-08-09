<?php

function dumpDie($val) {
  echo "<pre>";
  var_dump($val);
  echo "</pre>";

  die();
}