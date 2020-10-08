<?php

use PHPUnit\Framework\TestCase;
use App\Calculadora;

class CalculadoraTest extends TestCase
{
  public function testSomaSimples()
  {
    $calc = new Calculadora();

    $calc->entrarA(1);
    $calc->entrarB(2);
    $this->assertEquals($calc->somar(), 3);
  }

  public function testSomaComutativa()
  {
    $calc = new Calculadora();
    // ordem dos fatores nao altera o resultado
    $calc->entrarA(2);
    $calc->entrarB(1);
    $this->assertEquals($calc->somar(), 3);
  }

  public function testSomaIdentidade()
  {
     $calc = new Calculadora();
    // x + 0 = x
    $calc->entrarA(0);
    $calc->entrarB(5);
    $this->assertEquals($calc->somar(), 5);

  }

  public function testSomaAssociativa()
  {
    $calc = new Calculadora();
    // alterar o agrupamento dos fatores não altera a soma
    $calc->entrarA(100+100);
    $calc->entrarB(0);
    $this->assertEquals($calc->somar(), 200);
  }

  public function testSubtracaoSimples()
  {
    $calc = new Calculadora();

    $calc->entrarA(5);
    $calc->entrarB(8);
    $sub1 = $calc->subtrair();
    $this->assertEquals($sub1, -3);

    $calc->entrarA(8);
    $calc->entrarB(5);
    $sub2 = $calc->subtrair();
    $this->assertEquals($sub2, 3);
  }

  public function testSubtracaoRespectiva()
  {
    $calc = new Calculadora();
    $calc->entrarA(5); 
    $calc->entrarB(8);
    $sub1 = $calc->subtrair();
    $calc->entrarA(8);
    $calc->entrarB(5);
    $sub2 = $calc->subtrair();
    // Não é associativa: 5-8 != 8-5
    $this->assertTrue($sub1 != $sub2);
  }

  public function testMultiplicacaoElementoNeutro()
  {
    $calc = new Calculadora();
    $calc->entrarA(420);
    $calc->entrarB(1);
    $this->assertEquals($calc->multiplicar(), 420); 
  }

  public function testMultiplicacaoComZero()
  {
    $calc = new Calculadora();
    $calc->entrarA(420);
    $calc->entrarB(0);
    $this->assertEquals($calc->multiplicar(), 0);
  }

  public function testMultiplicacaoComutativa()
  {
    $calc = new Calculadora();
    $calc->entrarA(5);
    $calc->entrarB(4);
    $mult1 = $calc->multiplicar();

    $calc->entrarA(4);
    $calc->entrarB(5);
    $mult2 = $calc->multiplicar();
    $this->assertEquals($mult2, 20);
    $this->assertEquals($mult1, 20);
    $this->assertEquals($mult1, $mult2);
  }

  public function testDivisaoSimples()
  {
    $calc = new Calculadora();
    // É possivel agrupar 6 grupos de 5 dentro de 30
    $calc->entrarA(30);
    $calc->entrarB(5);
    $this->assertEquals($calc->dividir(), 6);
  }

  public function testDivisaoComZeroDividendo()
  {
    $calc = new Calculadora();
    $calc->entrarA(0);
    $calc->entrarB(555);
    $this->assertEquals($calc->dividir(), 0);
  }

  public function testDivisaoComZeroDivisor()
  {
    $calc = new Calculadora();
    $calc->entrarA(64);
    $calc->entrarB(0);
    $this->assertEquals($calc->dividir(), "ZERO NÃO É UM DIVISOR VÁLIDO");
  }
}
