<?php
$inputPattern = '/^[0-9]{10}$/';

	// Validate timestamp
if(!isset($_GET['timestamp']) || !preg_match($inputPattern, $_GET['timestamp'])) {
	die('&nbsp;');
}

	// Query DNS	
echo(date(DATE_RFC1123, $_GET['timestamp']));
?>

