<?php

namespace App\config;

class Env
{
  private array $envConfig;

  public function __construct()
  {
    $this->envConfig = [
      "db" => [
        'host' => $_ENV['DB_HOST'] ?? 'localhost',
        'name' => $_ENV['DB_NAME'],
        'user' => $_ENV['DB_USER'],
        'pass' => $_ENV['DB_PASS'],
      ]
    ];
  }

  public function getDBConfig(): array
  {
    return $this->envConfig["db"];
  }
}
