<?php

namespace App\core;

use App\config\Env;
use mysqli;

class Database
{
  static private $conn = null;
  private array $configs;

  public function __construct()
  {
    $env = new Env();
    $this->configs = $env->getDBConfig();
  }

  public function getDBConnection(): mysqli
  {
    if (empty(self::$conn)) {
      self::$conn = new mysqli(
        $this->configs["host"],
        $this->configs["user"],
        $this->configs["pass"],
        $this->configs["name"],
      );

      if (self::$conn->connect_error) {
        die("Connection error");
      }
    }

    return self::$conn;
  }
}
