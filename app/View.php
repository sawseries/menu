<?php

class View {

    private $data = array();
    private $success;
    private $fail;
    private $render = FALSE;

    public function __construct($template) {        
       $file = './view/'.$template.'.php';  
  
            if (file_exists($file)) {                                
                $this->render = $file;             
            } else {
                throw new customException('Template ' . $template . ' not found!');
            }
        
    }
   
    public function assign($variable, $value) {
        $this->data[$variable] = $value;
     
    }

    public function __destruct() {
        extract($this->data);
        include($this->render);
    }

}
