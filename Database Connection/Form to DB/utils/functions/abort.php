<?php

function abort(int $code = 404) {
  http_response_code($code);
  $file = dirname(__DIR__) . "/../public/pages/{$code}.html";
  staticServer($file);
}