<?php

// /news/123
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/news/{id:\d+}', function(\Swoole\Http\Response $response){
        $response->end("news");
    });

});
return $dispatcher;
