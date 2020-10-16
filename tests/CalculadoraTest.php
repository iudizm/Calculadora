<?php

use PHPUnit\Framework\TestCase;
use App\Calculadora;

class CalculadoraTest extends TestCase
{
  private $calc;

  protected function setUp() :void
  {
    $this->calc = new Calculadora();
  }

  public function testSomaSimples()
  {
    $this->calc->entrarA(1);
    $this->calc->entrarB(2);
    $this->assertEquals($this->calc->somar(), 3);
  }

  public function testSomaComutativa()
  {
    $this->calc->entrarA(2);
    $this->calc->entrarB(1);
    $this->assertEquals($this->calc->somar(), 3, "ordem dos fatores nao altera o resultado");
  }

  public function testSomaIdentidade()
  {
    $this->calc->entrarA(0);
    $this->calc->entrarB(5);
    $this->assertEquals($this->calc->somar(), 5, "zero é o elemento neutro da Soma" );

  }

  public function testSomaAssociativa()
  {
    $this->calc->entrarA(100+100);
    $this->calc->entrarB(0);
    $this->assertEquals($this->calc->somar(), 200, "alterar o agrupamento dos fatores não altera a soma");
  }

  public function testSubtracaoSimples()
  {
    $n_maior = 8;
    $n_menor = 5;

    $this->calc->entrarA($n_menor);
    $this->calc->entrarB($n_maior);
    $sub1 = $this->calc->subtrair();
    $this->assertEquals($sub1, -3);

    $this->calc->entrarA($n_maior);
    $this->calc->entrarB($n_menor);
    $sub2 = $this->calc->subtrair();
    $this->assertEquals($sub2, 3);
  }

  public function testSubtracaoRespectiva()
  {
    $this->calc->entrarA(5); 
    $this->calc->entrarB(8);
    $sub1 = $this->calc->subtrair();
    $this->calc->entrarA(8);
    $this->calc->entrarB(5);
    $sub2 = $this->calc->subtrair();
    $this->assertTrue($sub1 != $sub2, "Não é associativa: 5-8 != 8-5");
  }

  public function testMultiplicacaoElementoNeutro()
  {
    $this->calc->entrarA(420);
    $this->calc->entrarB(1);
    $this->assertEquals($this->calc->multiplicar(), 420); 
  }

  public function testMultiplicacaoComZero()
  {
    $this->calc->entrarA(420);
    $this->calc->entrarB(0);
    $this->assertEquals($this->calc->multiplicar(), 0);
  }

  public function testMultiplicacaoComutativa()
  {
    $this->calc->entrarA(5);
    $this->calc->entrarB(4);
    $mult1 = $this->calc->multiplicar();

    $this->calc->entrarA(4);
    $this->calc->entrarB(5);
    $mult2 = $this->calc->multiplicar();
    $this->assertEquals($mult2, 20);
    $this->assertEquals($mult1, 20);
    $this->assertEquals($mult1, $mult2);
  }

  public function testDivisaoSimples()
  {
    $this->calc->entrarA(30);
    $this->calc->entrarB(5);
    $this->assertEquals($this->calc->dividir(), 6, "É possivel agrupar 6 grupos de 5 dentro de 30");
  }

  public function testDivisaoComZeroDividendo()
  {
    $this->calc->entrarA(0);
    $this->calc->entrarB(555);
    $this->assertEquals($this->calc->dividir(), 0);
  }

  public function testDivisaoComZeroDivisor()
  {
    $this->calc->entrarA(64);
    $this->calc->entrarB(0);
    $this->assertEquals($this->calc->dividir(), "ZERO NÃO É UM DIVISOR VÁLIDO");
  }
}
