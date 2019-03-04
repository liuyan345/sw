<?php

$a = new test();

class test{

    public $clientArray = [];
    public function __construct()
    {
        $ws = new swoole_websocket_server("0.0.0.0",9501);
        $ws->on("open",function($ws,$request){
            $key = uniqid();
            $this->clientArray[$key] = $request->fd;
        });

        $ws->on("message",function($ws,$frame){
            var_dump($this->clientArray);
            if($frame->fd>4){
                $ws->push($frame->fd - 1, "server: {$frame->data}");
            }else{
                $ws->push($frame->fd, "server: {$frame->data}");
            }
        });

        $ws->on("close",function($ws,$fd){
            echo "client-{$fd} is closed\n";
        });

        $ws->start();
    }

}
//$clientArray = [];







?>