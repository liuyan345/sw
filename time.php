<?php
$i = 1;
$timer = "";
swoole_timer_tick(2000,function($timer_id)use(&$i,&$timer){
	var_dump($timer_id);
	$timer = $timer_id;
	$i++;
	echo $i."\n";
});


swoole_timer_after(10000,function($timer_id)use($i,$timer){
	echo "this is timer_after.\n";
	var_dump($timer);
	var_dump($timer_id);
	// if($i >= 4){
		swoole_timer_clear($timer);
	// }
});



?>