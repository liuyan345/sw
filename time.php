<?php
$i = 1;
swoole_timer_tick(2000,function($timer_id)use(&$i){
	var_dump($timer_id);
	$i++;
	echo $i."\n";
	
});

swoole_timer_after(10000,function()use($i){
	echo "this is timer_after.\n";
	if($i == 4){
		swoole_timer_clear($timer_id);
	}
});



?>