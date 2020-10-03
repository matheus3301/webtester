<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/webtester/backend/dao/ExecuteSQL.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/webtester/backend/models/Project.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/webtester/backend/models/Filter.php");




class ProjectDAO extends ExecuteSQL {
  function __construct($connection) {
    parent::__construct($connection);
  }

  public function create(Project $project) {
    $sql = "INSERT INTO tb_project(name,description,image) VALUES(?,?,?)";
    $prepared = $this->connection->prepare($sql);
    $status =  $prepared->execute(array($project->getName(), $project->getDescription(), $project->getImage()));

    if ($status) {
      $id = $this->connection->lastInsertId();
      return $this->index([new Filter("id", "=", $id)]);
    }

    return 0;
  }

  public function index($filters = null) {
    $sql = "SELECT * FROM tb_project";

    if ($filters) {
      $sql .= " WHERE ";
      for ($i = 0; $i < count($filters); $i++) {
        $column = $filters[$i]->column;
        $comparation = $filters[$i]->comparation;
        $value = $filters[$i]->value;

        $sql .= "$column $comparation $value" . (($i != count($filters) - 1)  ? " AND " : "");
      }
    }

    return $this->connection->query($sql)->fetchAll(PDO::FETCH_CLASS, 'Project');
  }
}
