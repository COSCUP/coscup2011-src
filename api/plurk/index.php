<?php

require('./config.inc.php');

$file = './search.json.js';

header('Content-Type: text/javascript');
header('Access-Control-Allow-Origin: *');

if (!file_exists($file) || filemtime($file) < time() - 10*60) {
	$plurks = file_get_contents('http://www.plurk.com/API/PlurkSearch/search?api_key=' . API_KEY . '&query=COSCUP');
	print $plurks;
	if ($plurks) file_put_contents($file, $plurks);
} else {
	readfile($file);
}
