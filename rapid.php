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
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="theme.css">
	</head>
	<body>
		<h1><div id="readerBox">Welcome to Rapid! Your article will begin in 10 seconds</div></h1>
		<script>
		var reader;
        	var file = '<?php echo(trim(file_get_contents("texts/$file"),"\n")); ?>';
			var words = file.split(" ");
			var wpm = parseInt(<?php echo $speed; ?>,10);
			console.log(wpm);
			console.log(words);
			var wpms = wpm/60000;
			var interval = 1/wpms;
			setTimeout(read,10000);
			console.log(interval);
			var i = 0;
			var end = words.length;
			var rapidBox = document.getElementById("readerBox");
			function read() {
				console.log("Reading!");
				reader = setInterval(rapid,interval);
			}
			
			function rapid() {
				console.log("Rapid is working!");
				rapidBox.innerHTML = words[i];
				if(i <= end) {
					i++
				}
				if(i == end+1) {
					clearInterval(reader);
					rapidBox.innerHTML="End of File! Why not try it a bit faster next time?"
				}
			}
		</script>
	</body>
</html>
