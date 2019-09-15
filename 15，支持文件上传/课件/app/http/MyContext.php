<?php
namespace App\http;
class MyContext{
    private $request;
    private $response;
    private $pathVars;
    private $state=1;//代表 可以无障碍运行  ,如果是0代表被abort了
    public function next(){
        $this->state=1;
    }
    public function abort($message="abort"){
       $this->state=0;
       $this->handlerResult[]=$message;
    }
    public function getState(){return $this->state;}


    private $handlerResult=[];
    public function setHandlerResult($ret){
        $this->handlerResult[]=$ret;
    }
    public function getHandlerResult(){
        return $this->handlerResult;
    }
    public static function build($request, $response, $pathVars=[]){
        return new self($request, $response, $pathVars=[]);
    }
    /**
     * MyContext constructor.
     * @param $request
     * @param $response
     * @param $pathVars
     */
    public function __construct($request, $response, $pathVars=[])
    {
        $this->request = $request;
        $this->response = $response;
        $this->pathVars = $pathVars;
    }


    /**
     * @return mixed
     */
    public function getRequest():\Swoole\Http\Request
    {
        return $this->request;
    }

    /**
     * @param mixed $request
     */
    public function setRequest($request): void
    {
        $this->request = $request;
    }

    /**
     * @return mixed
     */
    public function getResponse() : \Swoole\Http\Response
    {
        return $this->response;
    }

    /**
     * @param mixed $response
     */
    public function setResponse($response): void
    {
        $this->response = $response;
    }

    /**
     * @return mixed
     */
    public function getPathVars()
    {
        return $this->pathVars;
    }

    /**
     * @param mixed $pathVars
     */
    public function setPathVars($pathVars): void
    {
        $this->pathVars = $pathVars;
    }

}