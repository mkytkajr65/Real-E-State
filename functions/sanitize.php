<?php
function escape($string)
{
	return htmlentities($string, ENT_QUOTES, 'UTF-8');
}

function escapeName($string)
{
	return htmlentities($string, ENT_COMPAT, 'UTF-8');
}

?>