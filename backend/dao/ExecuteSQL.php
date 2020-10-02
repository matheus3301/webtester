<?php
class ExecuteSQL {
  protected PDO $connection;

  public function __construct(PDO $connection) {
    $this->connection = $connection;
  }
}
