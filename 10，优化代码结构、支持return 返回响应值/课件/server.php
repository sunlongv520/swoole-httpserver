<?php
require_once("vendor/autoload.php");



$router=NewRouter();
 $router->add("GET","/news/{id:\d+}",NewsDetail());
 ListenAndServe($router);














