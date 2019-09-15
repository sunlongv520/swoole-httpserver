<?php
function NewRouter(){
    $options=[
        'routeParser' => 'FastRoute\\RouteParser\\Std',
        'dataGenerator' => 'FastRoute\\DataGenerator\\GroupCountBased',
        'dispatcher' => 'FastRoute\\Dispatcher\\GroupCountBased',
        'routeCollector' => 'FastRoute\\RouteCollector',
    ];
    $routeCollector = new $options['routeCollector'](
        new $options['routeParser'], new $options['dataGenerator']
    );
    return $routeCollector;
}

//$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
//    $r->addRoute('GET', '/news/{id:\d+}',
//        function(\Http\MyContext $context){
//        /** @var  $res \Swoole\Http\Response */
//         $res= $context->getResponse();
//
//         $res->end("news".$context->getPathVars()["id"]);
//
//    }
//    );
//
//});
//return $dispatcher;
