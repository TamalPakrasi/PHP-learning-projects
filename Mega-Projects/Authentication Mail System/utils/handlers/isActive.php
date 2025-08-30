<?php

function isActive(string $link): string
{
  $currPath = $_SERVER["REQUEST_URI"];
  return $currPath === $link ? "active-link" : "inactive-link";
}
