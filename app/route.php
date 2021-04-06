<?php


class Route
{
    private $_listUri;
    private $_listCall;

    public function add($controller, $action)
    {
        $this->_listUri = $controller;
        $this->_listCall = $action;
    }

    public function submit()
    {
            
            $controller = $this->_listUri."Controller";
            $action = $this->_listCall;
            
            require_once('./controller/'.$this->_listUri.'Controller.php');

            $controllers = new $controller();
            $controllers->$action();
    }
}
