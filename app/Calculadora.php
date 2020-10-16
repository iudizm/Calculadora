<?php
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
    $divisao = new Divisao();
    
    return $divisao->dividir($this->a, $this->b);
  }

}
