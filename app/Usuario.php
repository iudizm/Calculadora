<?php
namespace App;
use App\Sql;
/**
 *
 */
class Usuario
{
  private $id;
  private $login;
  private $senha;
  private $dt_cadastro;


  public function __construct($l = "", $s = "")
  {
		$this->entrarLogin($l);
		$this->entrarSenha($s);
	}


  public function logar($login, $senha)
  {
    $sql = new Sql;

    $encontrados = $sql->select("SELECT * FROM tb_usuarios WHERE des_login = :LOGIN AND des_senha = :SENHA", array(
      ':LOGIN' => $login,
      ':SENHA' => $senha ));

    if (count($encontrados) > 0) {
      $this->entrarDados($encontrados[0]);
    } else {
      throw new Exception("Login e/ou Senha inválidos", 1);
    }
  }

  public function entrarDados($dados)
  {
		$this->entrarId($dados['id_usuario']);
		$this->entrarLogin($dados['des_login']);
		$this->entrarSenha($dados['des_senha']);
		$this->entrarDatetimeDoCadastro(new DateTime($data['dt_cadastro']));
	}

  public function obterCalculos()
  {
    // método que busca os calculos executados pelo Usuario
    // que foram armazenados no Banco de Dados.
    return true;
  }

  public function obterId()
  {
    return $this->id;
  }

  public function entrarId($id)
  {
    $this->id = $id;
  }

  public function entrarLogin($l)
  {
    $this->login = $l;
  }

  public function entrarSenha($s)
  {
    $this->senha = $s;
  }

  public function obterLogin()
  {
    return $this->login;
  }

  public function obterSenha()
  {
    return $this->senha;
  }


}
