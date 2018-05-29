<?php
$client = new swoole_client(SWOOLE_SOCK_TCP);

if(!$client->connect("192.168.0.200",8080,5)){
	die("connect failed");
}

if(!$client->send("hello world")){
	die("send failed.");
}

$data = $client->recv();

if(!$data){
	die("recv failed.");
}

echo $data;

$client->close();

?>