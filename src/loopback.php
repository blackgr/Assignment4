<?php

if(empty($_GET)){											//If no pairs passed
	echo '{"Type":"[GET|POST]", "parameters":null}';
	exit();
}
$url = strtok($_SERVER['QUERY_STRING'],'?'); 
$encoded = json_encode($url,JSON_FORCE_OBJECT);
$pair = explode("/", $encoded);
if(count($pair)%2 !=0)
	echo "Undefined";
else
	echo "{". "$encoded" . "}";

?>