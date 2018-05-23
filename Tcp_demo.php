<?php
// 创建TCP服务器

$serv = new swoole_server("127.0.0.1","9501");

$serv->on("connect",function($serv,$fd){
    echo "connect.\n";
});

$serv->on("receive",function($serv,$fd,$from_id,$data){
   $serv->send($fd,"Server:".$data);
});

$serv->on("close",function($serv,$fd){
   echo "close.\n";
});

$serv->start();



?>