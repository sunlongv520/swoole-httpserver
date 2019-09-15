<?php

use App\http\MyContext;

function NewsDetail(){ //获取新闻详细
    return function (MyContext $context){
       return ["newsid"=>$context->getPathVars()["id"],"news_title"=>"test news"];
    };
}

function SetNewsCache(){ //插入缓存
    return function (MyContext $context){
        //return "set cache by NewsID".$context->getPathVars()["id"];
    };
}
