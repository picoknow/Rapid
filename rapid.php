<?php
	function removeslashes($string) {
		$string = implode("",explode("\\",$string));
		return stripslashes(trim($string));
	}
	$file = removeslashes($_GET['q']);
?>
<html>
	<head>
	</head>
	<body>
	<script>
	var file = "<?php echo file_get_contents("texts/$file"); ?>";
	var title = file.split('\n');
	var contents = file.split(" ");
	console.log(title[0]);
	console.log(contents);
	
	
	</script>
	</body>
</html>
