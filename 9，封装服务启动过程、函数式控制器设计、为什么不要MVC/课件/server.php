<?php
require_once("vendor/autoload.php");
require("functions.php");
require("router.php");


/** @var  $router FastRoute\RouteCollector */
$router=NewRouter();
$router->addRoute("GET","/news/{id:\d+}",NewsDetail());
ListenAndServe($router);














