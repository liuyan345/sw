<?php
define($i, 1);
swoole_timer_tick(2000,function($timer_id){
	var_dump($timer_id);
	$i++;
	echo $i."\n";
	if($i == 4){
		swoole_timer_clear($timer_id);
	}
});

swoole_timer_after(10000,function(){
	echo "this is timer_after.\n";
});



?>