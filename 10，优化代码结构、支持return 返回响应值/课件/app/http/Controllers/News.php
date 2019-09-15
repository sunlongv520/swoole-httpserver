<?php

use App\http\MyContext;

function NewsDetail(){ //获取新闻详细
    return function (MyContext $context){
        return "news";
    };
}
