<?php

use Http\MyContext;

function NewsDetail(){ //获取新闻详细
    return function (MyContext $context){
        $context->getResponse()->end("news,shenyi");
    };
}
