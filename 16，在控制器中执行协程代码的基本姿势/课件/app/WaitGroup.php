<?php
namespace App;
use Swoole\Coroutine\Channel;

class WaitGroup{
    private $chan;
    private $count;
    function __construct()
    {
        $this->chan=new Channel(1);
        $this->count=0;
    }
    public function Add(int $c){
        $this->count+=$c;
    }
    public function Done(){
        $this->chan->push(1);
    }

    public function Wait(){
        for($i=0;$i<$this->count;$i++){
            $this->chan->pop();
        }
    }
}