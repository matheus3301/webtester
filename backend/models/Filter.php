<?php

class Filter {
  public $column;
  public $comparation;
  public $value;

  function __construct($column, $comparation, $value) {
    $this->column = $column;
    $this->comparation = $comparation;
    $this->value = $value;
  }
}
