<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/webtester/backend/db/config.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/webtester/backend/dao/ProjectDAO.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/webtester/backend/util/objectArrayIntoAssoc.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/webtester/backend/api/setup.php");

$method = $_SERVER['REQUEST_METHOD'];
$dao = new ProjectDAO($connection);

if ($method == "GET") {
  $projects = $dao->index();
  echo json_encode(objectArrayIntoAssoc($projects));
} else if ($method == "POST") {
  $project = new Project();

  if (!isset($input['name']) || trim($input['name']) == "") {
    http_response_code(400);
    die(json_encode(array('error' => 'missing name')));
  }
  $project->setName(trim($input['name']));

  if (!isset($input['description']) || trim($input['name']) == "") {
    http_response_code(400);
    die(json_encode(array('error' => 'missing description')));
  }
  $project->setDescription(trim($input['description']));

  if (isset($input['image']) && trim($input['image']) != "") {
    $project->setImage($input['image']);
  }

  $result = $dao->create($project);

  if ($result) {
    echo json_encode(objectArrayIntoAssoc($result));
  } else {
    http_response_code(500);
    die(json_encode(array('error' => 'internal error, please contact the support')));
  }
}
