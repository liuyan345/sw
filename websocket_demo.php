<?php

$ws = new swoole_websocket_server("0.0.0.0",9501);

$ws->on("open",function($ws,$request){
	var_dump($request->fd,$request->get,$request->server);
	$ws->push($request->fd,"hello,welcome\n");
});

$ws->on("message",function($ws,$frame){
//	$i = 0;
//	swoole_timer_tick(2000, function ($timer_id) {
//		$i++;
//		$ws->push($frame->fd,$i);
//	});
	 echo "Message:{$frame->data}\n";
});

$ws->on("close",function($ws,$fd){
	echo "client-{$fd} is closed\n";
});

$ws->start();



?>