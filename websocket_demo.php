<?php

$ws = new swoole_websocket_server("0.0.0.0",9501);

$ws->on("open",function($ws,$request){
//	$ws->push($request->fd,$request->data);
});

$ws->on("message",function($ws,$frame){
//	 echo "Message:{$frame->data}\n";
    var_dump($frame->fd);
    $ws->push($frame->fd, "server: {$frame->data}");
});

$ws->on("close",function($ws,$fd){
	echo "client-{$fd} is closed\n";
});

$ws->start();



?>