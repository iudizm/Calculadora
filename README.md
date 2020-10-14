# Calculadora
Calculadora integrada a um banco de dados.
  Opera a partir de dois números inteiros informados pelo usuário e armazena os dados da operação no banco de dados.  

### Requisitos para instalação:

- Banco de dados mysql
- Servidor local Apache para rodar o php no navegador web
- Composer
- PHP 7+

## Passos necessários para utilização:

- `sudo apt install phpunit` 
- Iniciar o Composer no projeto. --> `composer update`

### Banco de Dados

- Configurar o acesso ao banco de dados:

    - No localhost, criar um novo "schema" de nome "test".
    - Criar a tabela "tb_calculos"
    - A tabela deve conter as colunas: num_a, num_b, des_operacao, num_resultado, id_calculo(primary key), dt_calculo(timestamp).
    - Alterações podem ser feitas em `/public/index.php : linha 44`
    - Para utilizar o programa, entre pelo servidor local e rode o diretório `/public` que contém o arquivo `index.php`.
        
## Para rodar os testes:

- Rodar os testes através do comando --> `./vendor/bin/phpunit`
