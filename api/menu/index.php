<?php

if ($_GET['callback'])
{
	if (!preg_match("/[\w\.\[\]\"]+$/", $_GET['callback']))
	{
		header('HTTP/1.1 400 Bad Request');
		die("Malformed callback");
	}
	header("Content-type: text/javascript; charset=utf-8");
	echo $_GET['callback'] . '(';
	include ("menu.json.js");
	echo ')';
}
else
{
	header("Content-type: text/javascript; charset=utf-8");
	include ("menu.json.js");
}

