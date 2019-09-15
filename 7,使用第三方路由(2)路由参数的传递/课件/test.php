<?php
require("vendor/autoload.php");
$http=require("functions.php");
$dispatcher=require("router.php");
$http->on("request",function(\Swoole\Http\Request $request,\Swoole\Http\Response $response) use($dispatcher){
   $uri=$request->server["request_uri"];
   $method=$request->server["request_method"];
    $result = $dispatcher->dispatch($method, $uri);
    switch ($result[0]) {
        case FastRoute\Dispatcher::NOT_FOUND:
            // ... 404 Not Found
            $response->status(404);
            $response->end("404");
            break;
        case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
            $allowedMethods = $result[1];
            // ... 405 Method Not Allowed
            $response->status(405);
            $response->end("405: allow ".$allowedMethods);
            break;
        case FastRoute\Dispatcher::FOUND:
            $handler = $result[1];
            $vars = $result[2];

            $handler($response,$vars);
            break;
    }
});
$http->start();












