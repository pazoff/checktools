<?php
	// validate Length
if(!isset($_GET['length']) || !intval($_GET['length']) === $_GET['length'] || $_GET['length'] < 8 || $_GET['length'] > 128) {
	die('&nbsp;');
}

	// validate upperCase
if(isset($_GET['upperCase']) && $_GET['upperCase'] !== 'on') {
	die('&nbsp;');
}

	// validate lowerCase
if(isset($_GET['lowerCase']) && $_GET['lowerCase'] !== 'on') {
	die('&nbsp;');
}

	// validate digits
if(isset($_GET['digits']) && $_GET['digits'] !== 'on') {
	die('&nbsp;');
}

	// validate specialChars
if(isset($_GET['specialChars']) && $_GET['specialChars'] !== 'on') {
	die('&nbsp;');
}

	// initialize Character Pool
$charPool = array();

	// add upper Case Characters to the Pool
if(isset($_GET['upperCase']) && $_GET['upperCase'] === 'on') {
	array_push($charPool, "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
}

	// add lower Case Characters to the Pool
if(isset($_GET['lowerCase']) && $_GET['lowerCase'] === 'on') {
	array_push($charPool, "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
}

	// add Digits to the Pool
if(isset($_GET['digits']) && $_GET['digits'] === 'on') {
	array_push($charPool, "0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
}

	// add special Characters to the Pool
if(isset($_GET['specialChars']) && $_GET['specialChars'] === 'on') {
	array_push($charPool, "!", "#", "$", "%", "&", "(", ")", "*", "+", "-", ".", "@", "[", "]", "_");
}

	// generate Cleartext Password
$passwordClear = '';
for($charCounter=0; $charCounter < $_GET['length']; $charCounter++) {
	$passwordClear .= $charPool[array_rand($charPool)];
}

	// calculate Hashed Versions
$passwords = array(
	'passwordClear'	=> $passwordClear,
	'passwordHash'	=> crypt($passwordClear, base64_encode($passwordClear)),
	'passwordMd5'	=> md5($passwordClear),
);

	// Output JSON
echo json_encode($passwords);

	// Log Query
//TODO ACTIVATE
//error_log('['.date(DATE_ISO8601).'] '.implode(', ', $_GET).PHP_EOL, 3, dirname($_SERVER['DOCUMENT_ROOT']).'/log/pwgen.log');
?>
