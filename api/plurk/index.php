<?php

require('./config.inc.php');

function print_plurks() {
	$file = './search.json.js';

	if (!file_exists($file) || filemtime($file) < time() - 10*60) {
		$plurks = file_get_contents('http://www.plurk.com/API/PlurkSearch/search?api_key=' . API_KEY . '&query=COSCUP');
		print $plurks;
		if ($plurks) file_put_contents($file, $plurks);
	} else {
		readfile($file);
	}
}

if (isset($_GET['callback']))
{
	if (!preg_match("/[\w\.\[\]\"]+$/", $_GET['callback']))
	{
		header('HTTP/1.1 400 Bad Request');
		die("Malformed callback");
	}

	header("Content-type: text/javascript; charset=utf-8");
	header('Access-Control-Allow-Origin: *');
	echo $_GET['callback'] . '(';
	print_plurks();
	echo ')';
}
else
{
	header("Content-type: text/javascript; charset=utf-8");
	header('Access-Control-Allow-Origin: *');
	print_plurks();
}
