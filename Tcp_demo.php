<?php
// 创建TCP服务器

$serv = new swoole_server("0.0.0.0","9501");

$serv->on("connect",function($serv,$fd){
    echo "connect.\n";
});

$serv->on("receive",function($serv,$fd,$from_id,$data){
	var_dump($fd);
	var_dump($from_id);
	var_dump($data); 
   $serv->send($fd,"Server:".$data);
});

$serv->on("close",function($serv,$fd){
   echo "close.\n";
});

$serv->start();



?>