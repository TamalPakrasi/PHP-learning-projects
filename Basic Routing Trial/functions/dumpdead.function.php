<?php

function dumpdead($value) {
  echo "<pre>";
  var_dump($value);
  echo "</pre>";

  die();
}