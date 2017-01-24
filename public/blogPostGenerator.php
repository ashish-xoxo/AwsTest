<?php
require_once('libraries/Unirest.php');
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json");
$url = "http://blog.frogo.in/?json=get_recent_posts&count=8";
$response = Unirest\Request::get($url, array("Accept" => "application/json"));

echo $response->raw_body;
?>