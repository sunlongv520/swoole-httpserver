<?php

use Swoole\Http\Server;


$http=new  Server("0.0.0.0",80);
$http->on("request",function(\Swoole\Http\Request $request,\Swoole\Http\Response $response){

    $response->write("abc");
    $response->write("123");
    $response->end();
});
$http->start();












