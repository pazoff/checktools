<?php
$inputPattern = '/^[0-9a-zA-Z-.]+$/';

	// Validate name
if(!isset($_GET['name']) || !preg_match($inputPattern, $_GET['name'])) {
	die('&nbsp;');
}

	// Disable output buffer
ob_end_flush();

	// Query DNS
passthru('/usr/sbin/traceroute '.$_GET['name'].' 2>&1');
?>
