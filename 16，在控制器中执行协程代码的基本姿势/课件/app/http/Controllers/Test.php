<?php

use App\http\MyContext;

function TestCo(){ //获取新闻详细
    return function (MyContext $context){
        $wg=new \App\WaitGroup();
        for($i=0;$i<=10;$i++){
            $wg->Add(1);
            go(function() use($i,$wg){
                defer(function() use($wg){
                    $wg->Done();
                });
                Swoole\Coroutine::sleep(2);
                echo $i.PHP_EOL;

            });
        }
        $wg->Wait();
        echo "this is main".PHP_EOL;
    };
}