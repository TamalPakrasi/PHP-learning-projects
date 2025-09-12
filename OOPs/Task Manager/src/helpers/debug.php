<?php

namespace APP\HELPERS;

function debug($val): void
{
  echo "<pre>";
  var_dump($val);
  echo "</pre>";
  die();
}
