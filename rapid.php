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
		<div id="readerBox">Welcome to Rapid! Your article will begin in 10 seconds</div>
		<script>
        	var file = '<?php echo(trim(file_get_contents("texts/$file"),"\n")); ?>';
			var contents = file.split(" ");
			var wpm = parseInt(<?php echo $speed; ?>,10);
			console.log(wpm);
			console.log(contents);
			var wpms = wpm/60000;
			var interval = 1/wpms;
			setTimeout(read,10000);
			console.log(interval);
			function read() {
				console.log("Reading!");
				setInterval(rapid,interval)
			}
			
			function rapid() {
				console.log("Rapid is working!");
				
			}
		</script>
	</body>
</html>
