<?php

/**
 * Description of StubTest
 *
 * @author leonardo
 */

require '../app/Models/Stub.php';

class StubTest extends PHPUnit_Framework_TestCase {
    
    public function testStub() {
        $stub = $this->getMock("app\Models\Stub");
        $stub->expects($this->any())
             ->method('rodaAlgo')
             //Se colocar a linha abaixo, só utiliza o mock se o parâmetro for igual a "algo" (Mock).
             //Se não colocar, o mock é utilizado de qualquer maneira (Stub).
             ->with($this->equalTo("algo")) 
             ->will($this->returnValue("xpto"));
        
        $this->assertEquals("xpto", $stub->rodaAlgo("algo"));
        //A linha abaixo sempre dá erro, pois nem a função rodaAlgo retorna "xpto", 
        //nem o mock é utilizado porque a condição para ser usado é que o parâmetro seja "algo", e não "algoMais".
        //$this->assertEquals("xpto", $stub->rodaAlgo("algoMais"));
    }
}