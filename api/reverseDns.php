<?php
$inputPattern = '/^[0-9.]+$/';

	// Validate ipaddress
if(!isset($_GET['ipaddress']) || !preg_match($inputPattern, $_GET['ipaddress'])) {
	die('&nbsp;');
}

	// Query DNS	
echo htmlspecialchars(@gethostbyaddr($_GET['ipaddress']));
?>
