<?php
header("Content-type: application/json; charset=utf-8");
if (!ctype_alnum($_GET['callback']))
{
	die("Malformed callback");
}

echo $_GET['callback'] . '(';
include ("program.json.js");
echo ')';
