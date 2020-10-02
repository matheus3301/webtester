<?php
function isImage($url) {
  return @is_array(getimagesize(file_get_contents($url)));
}
