<?php
	function removeslashes($string) {
		$string = implode("",explode("\\",$string));
		return stripslashes(trim($string));
	}
	
  $file = removeslashes($_GET['q']);
  echo file_get_contents("texts/$file");
?>
