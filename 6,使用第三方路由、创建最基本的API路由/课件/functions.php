<?php
use Swoole\Http\Server;
$http=new  Server("0.0.0.0",80);
$http->on("workerstart",function(){
    cli_set_process_title("myweb worker ");
});
$http->on("managerstart",function(){
    cli_set_process_title("myweb manager");
});
$http->on("start",function(){
    cli_set_process_title("myweb master");
});
$http->set([
    "worker_num"=>2,
   // "dispatch_mode"=>4
]);
return $http;