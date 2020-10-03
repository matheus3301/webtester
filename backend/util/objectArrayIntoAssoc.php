<?php
function objectArrayIntoAssoc($objects) {
  $out = [];
  foreach ($objects as $object) {
    $currentObjectData = [];
    $refl = new ReflectionClass($object);
    $props = $refl->getProperties(ReflectionProperty::IS_PRIVATE);
    foreach ($props as $prop) {
      $prop->setAccessible(true);
      $currentObjectData[$prop->getName()] = $prop->getValue($object);
    }
    $out[] = $currentObjectData;
  }

  return $out;
}
