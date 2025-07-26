<?php

$response = [];
$BMI = $weight = $height = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $weight = $_POST["weight"] ?? 1;
  $height = $_POST["height"] ?? 1;
  $BMI =  ($weight / ($height ** 2));

  $data = [
    "height" => number_format($height, 2),
    "weight" => number_format($weight, 2),
    "calculated_BMI" => number_format($BMI, 2)
  ];

  $query = http_build_query(['msg' => json_encode($data)]);
  header("Location: intro.php?$query");
}

if (isset($_GET['msg'])) {
  $response = [];
  $decoded = json_decode($_GET['msg'], true); //true to make it an associtaive array
  if (is_array($decoded)) {
    foreach ($decoded as $key => $value) {
      $response[$key] = htmlspecialchars($value);
    };
  } else $response = ["msg" => "Data Corrupted. Pls Retry!"];
}

require "./intro.view.php";
