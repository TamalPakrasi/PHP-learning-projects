<?php

function abort(int $code) : void {
  http_response_code($code);
  require_once __DIR__ . "/../../public/pages/$code.html";
  die();
}