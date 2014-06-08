<?php
	function removeslashes($string) {
		$string = implode("",explode("\\",$string));
		return stripslashes(trim($string));
	}
	$file = removeslashes($_GET['q']);
	$speed = $_GET['s'];
?>
<html>
	<head>
	</head>
	<body>
	<script>
        var file = '<?php echo(trim(file_get_contents("texts/$file"),"\n")); ?>';
	var contents = file.split(" ");
	var wpm = parseInt(<?php echo $speed; ?>,10);
	console.log(wpm);
	console.log(contents);
	
	
	</script>
	</body>
</html>
