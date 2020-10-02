<?php
class Project {
  private $name;
  private $description;
  private $image;



  /**
   * Get the value of name
   */
  public function getName() {
    return $this->name;
  }

  /**
   * Set the value of name
   *
   * @return  self
   */
  public function setName($name) {
    $this->name = $name;

    return $this;
  }

  /**
   * Get the value of description
   */
  public function getDescription() {
    return $this->description;
  }

  /**
   * Set the value of description
   *
   * @return  self
   */
  public function setDescription($description) {
    $this->description = $description;

    return $this;
  }

  /**
   * Get the value of image
   */
  public function getImage() {
    return $this->image;
  }

  /**
   * Set the value of image
   *
   * @return  self
   */
  public function setImage($image) {
    $this->image = $image;

    return $this;
  }
}
