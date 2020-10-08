# Calculadora
Calculadora integrada a um banco de dados.
  Opera a partir de dois números inteiros informados pelo usuário e armazena os dados da operação no banco de dados.  

### Requisitos para instalação:

- Banco de dados mysql
- Servidor local Apache ou outro de sua escolha para rodar o php no navegador web
- Composer
- PHP 7+

### Passos necessários para utilização:

- Iniciar e o Composer no projeto. --> `composer update`
- Configurar o acesso ao banco de dados:

    - No localhost, criar um novo "schema" de nome "test".
    - Criar a tabela "tb_calculos"
    - A tabela deve conter as colunas: num_a, num_b, des_operacao, num_resultado, id_calculo(primary key), dt_calculo(timestamp).
    - Alterações podem ser feitas em `/public/index.php : linha 44`
    - Para utilizar o programa, entre no servidor local Apache, ou outro de sua escolha e rode o diretório `/public` que contém o arquivo `index.php`.
        
## Para rodar os testes:

- Instalar o PHPUnit no projeto, pelo composer --> `composer require --dev phpunit/phpunit ^9`
- Rodar os testes através do comando --> `./vendor/bin/phpunit`
