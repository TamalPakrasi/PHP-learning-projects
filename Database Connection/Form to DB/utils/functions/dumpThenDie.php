<?php

function dumpThenDie($val) {
  echo "<pre>";
  echo var_dump($val);
  echo "</pre>";

  die();
}