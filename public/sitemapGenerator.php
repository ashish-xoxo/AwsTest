<?php
require_once('libraries/Unirest.php');

$url = "https://www.giftxoxo.com/index.php?route=app/frogoSitemap/getSitemap";
$response = Unirest\Request::get($url,
		  array("Accept" => "application/xml"));
$xmlFile = fopen("sitemap.xml", "w");
fwrite($xmlFile, $response->raw_body);
fclose($xmlFile);
// echo $response->raw_body;
?>