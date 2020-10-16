<?php

use PHPUnit\Framework\TestCase;
use App\Divisao;

class DivisaoTest extends TestCase
{
    private $divisao;

    protected function setUp() :void
    {
        $this->divisao = new Divisao();
    }
    
    public function testDividirUmPorUmResultaEmUm()
    {   
        $dividendo = 1;
        $divisor = 1;
        $resultado = $this->divisao->dividir($dividendo, $divisor);
        $this->assertEquals($resultado, 1);
    }

    public function testDividirQuatroPorDoisResultaEmDois()
    {   
        $dividendo = 4;
        $divisor = 2;
        $resultado = $this->divisao->dividir($dividendo, $divisor);
        $this->assertEquals($resultado, 2);
    }

    public function testDividirUmPorDoisResultaEmUmMeio()
    {   
        $dividendo = 1;
        $divisor = 2;
        $resultado = $this->divisao->dividir($dividendo, $divisor);
        $this->assertEquals($resultado, 0.5);
    }

    public function testDivisaoPorZeroEhInvalida()
    {   
        $dividendo = 1;
        $divisor = 0;
        $resultado = $this->divisao->dividir($dividendo, $divisor);
        $this->assertEquals($resultado, "ZERO NÃO É UM DIVISOR VÁLIDO");
    }
}
