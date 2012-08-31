<?php

use LAB\Di\Container;

class ArticleTest extends PHPUnit_Framework_TestCase {
    
    private $model;
    
    //O método abaixo é sempre executado antes de um teste ser executado.
    public function setUp() {
        $this->model = Container::getClass("Article");
        
        $db = new \PDO("mysql:host=localhost;dbname=phptdd","root","root");
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        //A linha abaixo limpa a tabela, inclusive limpando os ids, coisa que delete não faz.
        $db->exec("truncate table artigo");
    }
    
    //A primeira coisa a se garantir é que o objeto seja mesmo da classe instanciada.
    public function testVerificaTipoDoObjeto() {
        $this->assertInstanceOf("app\Models\Article", $this->model);
    }
    
    public function testVerificaSeConsegueInserirRegistro() {
        $data['nome'] = 'Artigo teste';
        $data['descricao'] = 'Artigo teste descrição';
        $this->assertEquals(1, $this->model->save($data));
        $this->assertEquals(2, $this->model->save($data));
    }
    
    public function testVerificaSeInsereRegistroSemDados() {
        $data['nome'] = 'Artigo teste';
        $data['descricao'] = 'Artigo teste descrição';
        //$data = array();
        try {
            $this->model->save($data);
            $this->fail('Nao pode inserir com dados em branco');
        } catch (\Exception $e) {
            
        }
    }
    
    /**
     * @depends testVerificaSeConsegueInserirRegistro
     */
    public function testVerificaSeConsegueAlterarRegistro() {
        $data['nome'] = 'Artigo teste';
        $data['descricao'] = 'Artigo teste descrição';
        $this->model->save($data);
        
        $data['id'] = 1;
        $data['nome'] = 'Artigo teste nome alterado';
        $data['descricao'] = 'Artigo teste descrição alterada';
        $this->assertEquals(1, $this->model->save($data));
    }
    
    /**
     * @depends testVerificaSeConsegueInserirRegistro
     */
    public function testVerificaSeConsegueSelecionarAlgumRegistro() {
        $data['nome'] = 'Artigo teste';
        $data['descricao'] = 'Artigo teste descrição';
        $this->model->save($data);
        
        $data['nome'] = 'Artigo teste 2';
        $data['descricao'] = 'Artigo teste descrição 2';
        $this->model->save($data);
        
        $this->assertEquals("Artigo teste", $this->model->find(1)['nome']);
        $this->assertEquals("Artigo teste 2", $this->model->find(2)['nome']);
    }
    
    /**
     * @depends testVerificaSeConsegueInserirRegistro
     */
    public function testVerificaSeConsegueRemoverRegistro() {
        $data['nome'] = 'Artigo teste';
        $data['descricao'] = 'Artigo teste descrição';
        $this->model->save($data);
        
        $this->assertTrue($this->model->delete(1));
    }
    
    /**
     * @depends testVerificaSeConsegueInserirRegistro
     */
    public function testVerificaSeConsegueListarRegistro() {
        $data['nome'] = 'Artigo teste';
        $data['descricao'] = 'Artigo teste descrição';
        $this->model->save($data);
        
        $data['nome'] = 'Artigo teste 2';
        $data['descricao'] = 'Artigo teste descrição 2';
        $this->model->save($data);
        
        $this->assertEquals("Artigo teste", $this->model->fetchAll()[0]['nome']);
        $this->assertEquals("Artigo teste 2", $this->model->fetchAll()[1]['nome']);
    }
    
    //O método abaixo é sempre executado quando um teste acaba de ser executado.
    public function tearDown() {
        
    }
}
