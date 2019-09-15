<?php
use Swoole\Http\Server;
$http=new  Server("0.0.0.0",80,SWOOLE_BASE);
$http->on("workerstart",function(){
    cli_set_process_title("myweb worker base");
});
$http->on("managerstart",function(){
    cli_set_process_title("myweb manager");
});
//$http->on("start",function(){
//    cli_set_process_title("myweb master");
//});
return $http;