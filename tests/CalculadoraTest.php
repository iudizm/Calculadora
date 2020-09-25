<?php

use PHPUnit\Framework\TestCase;
use App\Calculadora;

class CalculadoraTest extends TestCase
{
  public function testSomaCalculadora()
  {
    $calc = new Calculadora();

    // Soma simples
    $calc->entrarA(1);
    $calc->entrarB(2);
    $this->assertTrue($calc->somar() == 3);

    // Propriedade comutativa da soma:
    // ordem dos fatores nao altera o resultado
    $calc->entrarA(2);
    $calc->entrarB(1);
    $this->assertTrue($calc->somar() == 3);

    // Propriedade de identidade da soma:
    // x + 0 = x
    $calc->entrarA(0);
    $calc->entrarB(5);
    $this->assertTrue($calc->somar() == 5);

    // Propriedade associativa da soma:
    // alterar o agrupamento dos fatores não altera a soma
    $calc->entrarA(100+100);
    $calc->entrarB(0);
    $this->assertTrue($calc->somar() == 200);
  }

  public function testSubtracaoCalculadora()
  {
    $calc = new Calculadora();

    // Subtração comum:
    $calc->entrarA(5);
    $calc->entrarB(8);
    $sub1 = $calc->subtrair();
    $this->assertTrue($sub1 == -3);

    $calc->entrarA(8);
    $calc->entrarB(5);
    $sub2 = $calc->subtrair();
    $this->assertTrue($sub2 == 3);

    // Não é associativa: 5-8 != 8-5
    $this->assertTrue($sub1 != $sub2);
  }

  public function testMultiplicacaoCalculadora()
  {
    $calc = new Calculadora();

    // Elemento neutro: a*1 = a
    $calc->entrarA(420);
    $calc->entrarB(1);
    $this->assertTrue($calc->multiplicar() == 420);

    // Numero zero: a*0 = 0
    $calc->entrarA(420);
    $calc->entrarB(0);
    $this->assertTrue($calc->multiplicar() == 0);

    // Propriedade comutativa da multiplicação: a*b = b*a
    $calc->entrarA(5);
    $calc->entrarB(4);
    $this->assertTrue($calc->multiplicar() == 20);

    $calc->entrarA(4);
    $calc->entrarB(5);
    $this->assertTrue($calc->multiplicar() == 20);

    // Propriedade distributiva da multiplicação: (a*b)*c = a*(b*c)
    // -- apenas para 3+ valores

    // Propriedade associativa da multiplicação: a*(b + c) = a*b + a*c
    // -- apenas para 3+ valores
  }

  public function testDivisaoCalculadora()
  {
    // $a = dividendo
    // $b = divisor
    $calc = new Calculadora();

    // Divisao: é possivel agrupar 6 grupos de 5 dentro de 30
    $calc->entrarA(30);
    $calc->entrarB(5);
    $this->assertTrue($calc->dividir() == 6);

    // Zero dividido por qualquer número sempre será zero: 0/x = 0
    $calc->entrarA(0);
    $calc->entrarB(555);
    $this->assertTrue($calc->dividir() == 0);

    // Zero não pode ser o divisor: a/0 NÃO EXISTE
    $this->assertTrue($calc->obterDivisor() != 0);
  }
}
