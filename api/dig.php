<?php
$inputPattern = '/^[0-9a-zA-Z-.]+$/';

	// Validate name
if(!isset($_GET['name']) || !preg_match($inputPattern, $_GET['name'])) {
	die('&nbsp;');
}

	// Validate server
if(isset($_GET['server']) && $_GET['server']!=='' && !preg_match($inputPattern, $_GET['server'])) {
	die('&nbsp;');
} else {
	if($_GET['server']!=='') {
		$_GET['server']='@'.$_GET['server'];
	} else {
		$_GET['server']='';
	}
}

	// Validate type
$types = array('ANY', 'MX', 'A', 'AAAA', 'NS', 'SOA', 'TXT');
if(!in_array($_GET['type'], $types)) {
	die('&nbsp;');
}

	// Query DNS	
passthru('/usr/bin/dig '.$_GET['name'].' '.$_GET['type'].' '.$_GET['server'].' 2>&1');

	// Log Query
error_log('['.date(DATE_ISO8601).'] '.implode(', ', $_GET).PHP_EOL, 3, dirname($_SERVER['DOCUMENT_ROOT']).'/log/dns.log');
?>
