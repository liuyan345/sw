<?php
	$serv = new swoole_server("0.0.0.0",9501,SWOOLE_PROCESS,SWOOLE_SOCK_UDP);

	$serv->on("Packet",function($serv,$data,$clientInfo){
		$serv->sendto($clientInfo['address'],$clientInfo['port'],"Server".$data);
		var_dump($clientInfo);
		var_dump($data);
	});

	$serv->start();

?>