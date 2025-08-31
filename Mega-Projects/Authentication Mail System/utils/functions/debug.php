<?php

function dumpDie($val) : void {
  echo "<pre>";
  var_dump($val);
  echo "</pre>";
  die();
}