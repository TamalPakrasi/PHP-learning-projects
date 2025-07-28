<?php

function isURl(string $url): string
{
  $paredCurrentURL = parse_url($_SERVER["REQUEST_URI"],  PHP_URL_PATH);
  return $paredCurrentURL === $url ? "bg-[#232530] hover:bg-[#1f212a]" : "hello";
}
