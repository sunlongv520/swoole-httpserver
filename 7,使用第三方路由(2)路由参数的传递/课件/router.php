<?php


$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/news/{id:\d+}',
        function(\Swoole\Http\Response $response,array $pathVars){
        $response->end("newsid=".$pathVars["id"]);
    });

});
return $dispatcher;
