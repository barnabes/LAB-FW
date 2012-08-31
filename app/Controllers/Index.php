<?php

namespace app\Controllers;

use LAB\Controller\Action,
    LAB\Controller\Crud,
    LAB\Di\Container;
    
    
class Index extends Action {
    protected $model = "article";
    use Crud;
    
}

