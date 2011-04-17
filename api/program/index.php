<?php

if ($_GET['callback'])
{
	if (!preg_match("/^[0-9a-zA-Z_\-]+$/", $_GET['callback']))
	{
		header('HTTP/1.1 400 Bad Request');
		die("Malformed callback");
	}
	header("Content-type: text/javascript; charset=utf-8");
	echo $_GET['callback'] . '(';
	include ("program.json.js");
	echo ')';
}
else
{
	header("Content-type: text/javascript; charset=utf-8");
	include ("program.json.js");
}

