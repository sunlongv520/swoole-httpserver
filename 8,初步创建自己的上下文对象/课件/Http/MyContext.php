<?php
namespace Http;
class MyContext{
    private $request;
    private $response;
    private $pathVars;

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
    public function getRequest()
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
    public function getResponse()
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