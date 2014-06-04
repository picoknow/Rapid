<?php
  $file = $_GET['q'];
  echo file_get_contents("texts/$file");
?>
