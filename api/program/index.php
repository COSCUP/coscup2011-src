<?php

if ($_GET['callback'])
{
	if (!ctype_alnum($_GET['callback']))
	{
		header("400 Bad Request");
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

