<?php
/**
 * Uma Calculadora que capaz de operar com DOIS valores.
 *
 */
namespace App;
class Calculadora
{
  private $a;
  private $b;

  public function __construct()
  {
    $this->a = 0;
    $this->b = 0;
  }

  public function entrarA($x)
  {
    $this->a = $x;
  }

  public function entrarB($x)
  {
    $this->b = $x;
  }

  public function somar()
  {
    return $this->a + $this->b;
  }

  public function subtrair()
  {
    return ($this->a) - ($this->b);
  }

  public function multiplicar()
  {
    return ($this->a * $this->b);
  }

  public function dividir()
  {
    if ($this->b != 0)
    {
      return ($this->a / $this->b);
    }
    else {
      return "ZERO NÃO É UM DIVISOR VÁLIDO";
    }
  }

  public function obterDivisor()
  {
      return $this->b;
  }

}
