<?php
/*
When used correctly, this script will never be loaded as a single web page
Instead the server time data given by PHP will be 'mined' from it trough the AJAX request from index.php.
*/

if (isset($_GET['timereq'])):

	// PHP script that serves the server time to an AJAX request
	function serverTime() {
		date_default_timezone_set('Europe/Oslo');
		return "Server time is: ".date("H:i:s");
	}
	echo serverTime();

else:
	echo "No soup for you!";
endif;

/* 
note: This script will only show the time if 
it has the right GET attribute set in the URL too.
If you want to do this manually, append "?timereq" behind the url (without quotes).
*/

?>
