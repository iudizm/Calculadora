<?php
namespace App;

class Divisao
{
    public function dividir($dividendo, $divisor)
    {   
        $ehInvalido = $divisor == 0;
        if ($ehInvalido){
            return "ZERO NÃO É UM DIVISOR VÁLIDO";
        }
        return $dividendo / $divisor;
    }
}
