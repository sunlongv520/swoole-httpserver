<?php

$http=require("functions.php");
$http->on("request",function(\Swoole\Http\Request $request,\Swoole\Http\Response $response){
    // /new/1?a=1
   $uri=$request->server["request_uri"];
   if(preg_match("/^\/news\/(\d+)/i",$uri,$matchs)){
        $id=$matchs[1];
        $response->end("news id=".$id);
    }else
        $response->end("default");
});
$http->start();












