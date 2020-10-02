<?php
use PHPUnit\Framework\TestCase;
use App\Usuario;


/**
 *  Testes da classe Usuario.
 */
class UsuarioTest extends TestCase
{
  public function testGeralDoUsuario()
  {
    $user = new Usuario();

    // dado que
    // foram passados o login e senha,
    $user->entrarLogin("lorem");
    $user->entrarSenha("ipsum");

    // entao
    //o objeto deve armazenar os dados:
    $this->assertTrue($user->obterLogin() == "lorem");
    $this->assertTrue($user->obterSenha() == "ipsum");

    // dado que:
    // foram passados login e senha,
    $user->entrarLogin("lorem");
    $user->entrarSenha("ipsum");

    // quando:
    // logar no banco com os dados passados:
    $user->logar($user->obterLogin(), $user->obterSenha());

    // entao:
    // Usuario obtem seu id gravado no banco de dados
    $this->assertTrue($user->obterId() == 1);

    // Usuario deve ser capaz de listar os calculos já feitos por ele.
    $this->assertTrue($user->obterCalculos());
  }

  public function testAtributosUsuario()
  {
    /** A classe Usuario e a tabela "tb_usuarios" compartilham esses atributos.
    * É preciso garantir a existencia desses atributos para garantir a conexao com o DB.
    */
    $this->assertClassHasAttribute('id', Usuario::class);
    $this->assertClassHasAttribute('login', Usuario::class);
    $this->assertClassHasAttribute('senha', Usuario::class);
    $this->assertClassHasAttribute('dt_cadastro', Usuario::class);

  }
}



 ?>
