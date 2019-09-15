<?php
use Swoole\Http\Server;


 function ListenAndServe(FastRoute\RouteCollector $router){
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
     $dispatcher=new FastRoute\Dispatcher\GroupCountBased($router->getData());
     $http->on("request",function(\Swoole\Http\Request $request,\Swoole\Http\Response $response) use($dispatcher){
         $context=\Http\MyContext::build($request,$response);
         $result = $dispatcher->dispatch($request->server["request_method"], $request->server["request_uri"]);
         switch ($result[0]) {
             case FastRoute\Dispatcher::FOUND:
                 $handler = $result[1];
                 $vars = $result[2];
                 $context->setPathVars($vars);
                 $handler($context);
                 break;
             default:
                 $response->end("no data");
                 break;
         }

     });
     $http->start();
 }
