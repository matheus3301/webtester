<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/webtester/backend/dao/ExecuteSQL.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/webtester/backend/models/Project.php");


class ProjectDAO extends ExecuteSQL {
  function __construct($connection) {
    parent::__construct($connection);
  }

  public function create(Project $project) {
    $sql = "INSERT INTO tb_project(name,description,image) VALUES(?,?,?)";
    $prepared = $this->connection->prepare($sql);
    return $prepared->execute(array($project->getName(), $project->getDescription(), $project->getImage()));
  }
}
