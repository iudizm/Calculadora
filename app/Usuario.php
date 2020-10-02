<?php
namespace App;
require_once 'Sql.php';
/**
 *
 */
class Usuario
{
  private $id;
  private $login;
  private $senha;
  private $dt_cadastro;


  public function entrarId($id)
  {
    $this->id = $id;
  }

  public function logar($login, $senha)
  {
    $sql = new \Sql;

    $encontrados = $sql->select("SELECT * FROM tb_usuarios WHERE des_login = :LOGIN AND des_senha = :SENHA",
    array(
      ':LOGIN' => $login,
      ':SENHA' => $senha
    ));

    if (count($encontrados) > 0) {
      $this->carregarDados($encontrados[0]);
    } else {
      throw new \Exception("Login e/ou Senha: NADA CONSTA");
    }
  }

  public function carregarDados($dados)
  {
    // carrega todos dados, recebe em array
		$this->entrarId($dados['id_usuario']);
		$this->entrarLogin($dados['des_login']);
		$this->entrarSenha($dados['des_senha']);
		$this->entrarDtCadastro(new \DateTime($dados['dt_cadastro']));
	}

  public function obterCalculos()
  {
    // método que busca os calculos executados pelo Usuario
    // que foram armazenados no Banco de Dados.
    return true;
  }

  public function cadastrarNoBanco()
  {
    $sql = new \Sql();

      $resultados = $sql->select("CALL sp_usuario_atualizar(:LOGIN, :SENHA)", array(
			':LOGIN'=>$this->obterLogin(),
			':SENHA'=>$this->obterSenha()
		));

      if (count($resultados) > 0) {
        $this->carregarDados($resultados[0]);
      }
  }


  public function entrarDtCadastro($dt)
  {
    $this->dt_cadastro = $dt;
  }

  public function obterDtCadastro()
  {
    return $this->dt_cadastro;
  }

  public function obterId()
  {
    return $this->id;
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

  public function __construct($l = "", $s = "")
  {
    $this->entrarLogin($l);
    $this->entrarSenha($s);
  }

  public function __toString()
  {
    return json_encode(
      array(
        "id_usuario"=>$this->obterId(),
        "des_login"=>$this->obterLogin(),
        "des_senha"=>$this->obterSenha(),
        "dt_cadastro"=>$this->obterDtCadastro()->format("d/m/Y H:i:s")
      ));
    }


}
