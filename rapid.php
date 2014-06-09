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
		    <style>

        * {
            line-height: 1.5;
            margin: 0;
        }

        html {
            color: #888;
            font-family: sans-serif;
            text-align: center;
        }

        body {
            left: 50%;
            margin: -43px 0 0 -150px;
            position: absolute;
            top: 50%;
            width: 300px;
        }

        h1 {
            color: #555;
            font-size: 2em;
            font-weight: 400;
        }

        p {
            line-height: 1.2;
        }

        @media only screen and (max-width: 270px) {

            body {
                margin: 10px auto;
                position: static;
                width: 95%;
            }

            h1 {
                font-size: 1.5em;
            }

        }

    </style>
	</head>
	<body>
		<br />
		<h1><div id="readerBox">Welcome to Rapid! Your article will begin in 10 seconds</div></h1>
		<script>
		var reader;
        	var file='<?php echo(htmlentities(trim(file_get_contents("texts/$file"),"\n"))); ?>';
        	
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
				if(i < end) {
					i++
				}
				if(i == end) {
					clearInterval(reader);
					rapidBox.innerHTML="End of File! Why not try it a bit faster next time?"
				}
			}
		</script>
	</body>
</html>
