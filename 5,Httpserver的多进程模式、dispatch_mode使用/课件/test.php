<?php

$http=require("functions.php");
$http->set([
    "worker_num"=>2,
    "dispatch_mode"=>4
]);
$http->on("request",function(\Swoole\Http\Request $request,\Swoole\Http\Response $response){
   $uri=$request->server["request_uri"];
   //支持/news/123 这种url。 取出ID
   if(preg_match("/^\/news\/(\d+)/i",$uri,$matchs)){
        $id=$matchs[1];
        if($id==3) sleep(10);
        $response->end("news id=".$id."process id=".posix_getpid());
    }else
        $response->end("default");
});
$http->start();












