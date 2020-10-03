<?php
header('Content-Type: application/json');

function isValidJSON($str) {
  json_decode($str);
  return json_last_error() == JSON_ERROR_NONE;
}

$json_params = file_get_contents("php://input");
$input;

if ($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "PUT") {
  if (strlen($json_params) > 0 && isValidJSON($json_params))
    $input = json_decode($json_params, true);
  else {
    http_response_code(400);
    die(json_encode(array('error' => 'invalid JSON')));
  }
}
