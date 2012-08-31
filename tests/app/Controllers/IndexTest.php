<?php

class IndexTest extends PHPUnit_Extensions_SeleniumTestCase {
    
    public static $browsers = array (
        
        array(
            'name' => 'Firefox',
            'browser' => '*firefox',
            'timeout' => 10000,
            'host' => 'localhost'
        )
    );            
    
    public function setUp() {
        $this->setBrowserUrl('http://framework.local');
    }
    
    public function title() {
        $this->open("/");
        $this->assertTitle("LAB Framework");
    }
    
    public function testVerificaSeConsegueInserirRegistro() {
        $this->open("/artigos");
        $this->click("adicionar");
        $this->type("nome", "Teste S");
        $this->type("descricao", "Descrição S");
        $this->click("submit");
        $this->waitForPageToLoad(1000);
        $this->assertEquals("Dados inseridos com sucesso!", $this->getText("//div[@class='notification']/p"));
    }
    
    public function testGeral() {
        $this->title();
    }
}