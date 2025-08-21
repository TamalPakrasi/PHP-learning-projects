<?php

function abort(int $code = 500) {
  http_response_code($code);
  include_once __DIR__ . "/../../public/pages/$code.html";
  die();
}