<?php

require '../app/Models/Exemplo.php';

class ExemploTest extends PHPUnit_Framework_TestCase {
    
    private $model;
        
    public function setUp() {
        $this->model = new app\Models\Exemplo();
    }

    public function testVerificaTipoDoObjeto() {
        $this->assertInstanceOf('app\Models\Exemplo', $this->model);
    }
    
    public function testVerificaSePodeSomar() {
        $this->assertEquals(2, $this->model->somar(1,1));
        $this->assertEquals(3, $this->model->somar(2,1));
    }
    
    public function testVerificaSeEntradasSaoNumeros() {
        //$this->fail($this->model->somar('a', 1));
        try {
            $result = $this->model->somar('a', 1);
        } catch (\Exception $e) {
            $this->assertEquals('Nao e numerico', $e->getMessage());
        }
        //$this->fail($this->model->somar('a', 'a'));
        //$this->fail($this->model->somar(1, 'a'));
    }
}
