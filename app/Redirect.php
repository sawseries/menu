<?php

class Redirect extends BaseController{

    private $data = array();
    private $render = FALSE;

    public function __construct($controller,$action) {
        
    }

    public function url($controller,$action) {
        $location = "./index.php?controller=".$controller."&action=".$action."";
        header("Location: ".$location."");
    }

    public function para($controller,$action,Array $para) {

        $location = "./index.php?controller=".$controller."&action=".$action."";
        $i=0;
        foreach($para as $x=>$x_value)
        {
            $location.="&".$x."=".$x_value;
        }
        header("Location: ".$location."");
    }
    
    
    public static function view($action,Array $para) {

            $view = new View($action);            
            foreach($para as $x=>$x_value)
            {
                $view->assign($x,$x_value);
            }
    }
    
    public static function back($action) {

            $view = new View($action);            
    }
   
}
