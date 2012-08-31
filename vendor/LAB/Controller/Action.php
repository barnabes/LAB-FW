<?php

namespace LAB\Controller;

abstract class Action {
    
    protected $action;
    protected $view;
    
    public function __construct() {
        //echo 'Class:'.__CLASS__;
        $this->view = new \stdClass(); //A barra diz que a classe está na raiz!
    }  
    
    protected function render($view, $layout = true) {
        $this->action = $view;
        if ($layout == true && file_exists('../app/Views/layout.phtml'))
            include_once('../app/Views/layout.phtml');
        else
            $this->content($view);
    }
    
    protected function content() {
        $atual = get_class($this);
        $singleClassName = strtolower(str_replace('app\\Controllers\\', '', $atual));
        include_once '../app/Views/'.$singleClassName.'/'.$this->action.'.phtml';
    }
}

