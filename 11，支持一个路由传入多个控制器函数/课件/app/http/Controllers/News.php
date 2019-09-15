<?php

use App\http\MyContext;

function NewsDetail(){ //获取新闻详细
    return function (MyContext $context){
        return "get news from DB ByID".$context->getPathVars()["id"];
    };
}

function SetNewsCache(){ //插入缓存
    return function (MyContext $context){
        return "set cache by NewsID".$context->getPathVars()["id"];
    };
}
