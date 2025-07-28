<?php

function abort(int $code = 404)
{
  http_response_code($code);
  require "public/{$code}.html";
  die();
}
