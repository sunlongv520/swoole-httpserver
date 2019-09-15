<?php
require_once("vendor/autoload.php");
require(__DIR__."/app/Init.php");
$router=NewRouter();

$router->add("POST","/news/upload"
    ,NewsUpload() ); //文件上传
$router->Use(MustToken()); //下方的URL必须有token参数
{
    $router->add("GET","/news/{id:\d+}"
        ,NewsDetail(),SetNewsCache());
}

ListenAndServe($router);














