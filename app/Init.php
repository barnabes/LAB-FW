<?php

namespace app;
use LAB\Init\Bootstrap;

class Init extends Bootstrap {
    
    protected function _initRoutes() {
        $array['home'] = ['route' => '/', 'controller' => 'index', 'action' => 'index'];
        $array['artigo-home'] = ['route' => '/artigos', 'controller' => 'index', 'action' => 'index'];
        $array['artigo-novo'] = ['route' => '/artigo/novo', 'controller' => 'index', 'action' => 'novo'];
        $array['artigo-edit'] = ['route' => '/artigo/edit/', 'controller' => 'index', 'action' => 'edit'];
        $array['artigo-delete'] = ['route' => '/artigo/delete/', 'controller' => 'index', 'action' => 'delete'];
        $this->setRoutes($array);
    }
    
}