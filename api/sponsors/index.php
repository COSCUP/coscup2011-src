<?php

if ($_GET['callback'])
{
	if (!preg_match("/^[0-9a-zA-Z_\-]+$/", $_GET['callback']))
	{
		header("400 Bad Request");
	}
	header("Content-type: text/javascript; charset=utf-8");
	echo $_GET['callback'] . '(';
	include ("sponsors.json.js");
	echo ')';
}
else
{
	header("Content-type: text/javascript; charset=utf-8");
	include ("sponsors.json.js");
}

