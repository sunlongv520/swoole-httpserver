<?php

use Swoole\Http\Server;


$http=new  Server("0.0.0.0",80,SWOOLE_BASE);
$http->on("workerstart",function(){
    cli_set_process_title("myweb worker base");
});
$http->on("managerstart",function(){
    cli_set_process_title("myweb manager");
});
$http->on("start",function(){
    cli_set_process_title("myweb master");
});
$http->on("request",function(\Swoole\Http\Request $request,\Swoole\Http\Response $response){

    $response->write("abc");
    $response->write("123");
    $response->end();
});
$http->start();












