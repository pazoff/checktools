<?php
$inputPattern = '/^[0-9.]+$/';

	// Validate ipaddress
if(!isset($_GET['ipaddress']) || !preg_match($inputPattern, $_GET['ipaddress'])) {
	die('&nbsp;');
}

	// Query DNS	
echo htmlspecialchars(@gethostbyaddr($_GET['ipaddress']));

	// Log Query
error_log('['.date(DATE_ISO8601).'] '.implode(', ', $_GET).PHP_EOL, 3, dirname($_SERVER['DOCUMENT_ROOT']).'/log/revdns.log');
?>
