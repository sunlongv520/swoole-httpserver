<?php


$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/news/{id:\d+}',
        function(\Http\MyContext $context){
        /** @var  $res \Swoole\Http\Response */
         $res= $context->getResponse();

         $res->end("news".$context->getPathVars()["id"]);

    }
    );

});
return $dispatcher;
