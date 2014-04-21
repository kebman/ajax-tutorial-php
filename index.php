<!DOCTYPE html>
<html>
<head>
	<title>AJAX Test</title>
	<meta charset="UTF-8" />
	<style type="text/css">
	</style>
</head>
<body>
	<article>
		<h1>AJAX Test</h1>
		<p>This script will call a PHP script called servertime.php and get the server time asynchronously from it - without refrheshing the current page - with an AJAX request.</p>
		<p>Look at the source code of the two files to see the full tutorial.</p>
		<hr />
		<p>If you want this to work, you'll need to edit one URL correctly inside this script, and save the files on a web serves with PHP 5 activated.</p>
	</article>
	<article>
		<h1>Test area</h1>
		<button id="button">Get time</button>
		<p id="receiveTime"></p>	
	</article>
	<script>
		var request = new XMLHttpRequest();
		var getTime = document.getElementById("button");

		getTime.onclick = function() {
			// Wait until the server is ready
			request.onreadystatechange = function() {
				/*
				Request readyStates:
				0. hasn't started
				1. connected to the server
				2. server has received our request
				3. server is processing
				4. request is finished and data is ready - the one we're waiting for
				Additionally we want a spesific confirmation code from the HTTP server that everything is OK. 
				This is what the 200 code is for.
				You may know the 404 error when a page doesn't exist. 
				Well, 200 is the code for 'everything is fine'
				*/
				if(request.readyState == 4 && request.status == 200) {
					document.getElementById("receiveTime").innerHTML = request.responseText;
				} else {
					document.getElementById("receiveTime").innerHTML = "Waiting for response...";
				}
			}
			// request.open("method", "URL", [if it is asynchronous or not]);
			request.open("GET", "http://your/url/address/here/servertime.php?timereq", true);
			request.send();
		}
	</script>
</body>
</html>
