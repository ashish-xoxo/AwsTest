<?php
require_once('libraries/Unirest.php');

$url = "https://www.giftxoxo.com/index.php?route=app/frogoSitemap/siteMapJSON";
$response = Unirest\Request::get($url,
		  array("Accept" => "application/json"));
$xmlFile = fopen("jsonSitemap.json", "w");
fwrite($xmlFile, $response->raw_body);
fclose($xmlFile);
// echo $response->raw_body;
?>