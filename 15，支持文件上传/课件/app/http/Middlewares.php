<?php

function MustToken(){
    return function (\App\http\MyContext $context){
            if($context->getRequest()->get["token"]){
                //判断token是否合法
                $context->next();
            }else{
                $context->abort("missing token");
            }
    };
}