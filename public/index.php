<?php

require '../vendor/autoload.php';
use App\Calculadora;
?>

 <html>
 <head>
   <h1 style= "font-family:fantasy; color:red; text-align:center">

     CALCULADORA v1.0
     </h1>
     <p><strong>Opera com 2 números inteiros.</p>
 </head>

 <body
 style= "background-color:powderblue; text-align:center">

   <form action="index.php" method="post" style="font-family:fantasy; color:gray;">
     A: <br/>
     <input type="number" name="nA"></br>
     B: <br/>
     <input type="number" name="nB"></br>
     </br>
     <input type="submit" name="somar" value="A+B" style="font-family:fantasy; color:orange;">
     <input type="submit" name="subtrair" value="A-B" style="font-family:fantasy; color:orange;">
     <input type="submit" name="multiplicar" value="A.B" style="font-family:fantasy; color:orange;">
     <input type="submit" name="dividir" value="A/B" style="font-family:fantasy; color:orange;">
   </form>
   <br>
 </body>
 </html>

 <?php
 $calc = new Calculadora();

 // prepara a conexao com o db
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "test";

try {

   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

   // modo de erro: execao
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   // prepara a execucao da query
   $stmt = $conn->prepare("INSERT INTO tb_calculos(num_a, num_b, des_operacao, num_resultado) VALUES (:A, :B, :OPERACAO, :RESULTADO)");


   // Garante que foram passados A e B
   if ((!empty($_POST['nA']) && !empty($_POST['nB'])))
   {

     // Quando o botao Somar for acionado
     if (isset($_POST['somar']))
     {
       $operacao = " + ";
       $dadoA = $_POST['nA'];
       $dadoB = $_POST['nB'];
       $calc->entrarA($dadoA);
       $calc->entrarB($dadoB);
       $resultado = $calc->somar();
       $stmt->bindParam(":A", $dadoA, PDO::PARAM_INT);
       $stmt->bindParam(":B", $dadoB, PDO::PARAM_INT);
       $stmt->bindParam(":OPERACAO", $operacao, PDO::PARAM_STR);
       $stmt->bindParam(":RESULTADO", $resultado, PDO::PARAM_FLOAT);
       echo "<br><strong> ( $dadoA ) $operacao ( $dadoB ) = $resultado";
       $stmt->execute();
       echo "<br><br><strong> Adicionado com sucesso ao banco de dados!";
     }

     // Quando o botao subtrair for acionado
     if (isset($_POST['subtrair']))
     {
       $operacao = " - ";
       $dadoA = $_POST['nA'];
       $dadoB = $_POST['nB'];
       $calc->entrarA($dadoA);
       $calc->entrarB($dadoB);
       $resultado = $calc->subtrair();
       $stmt->bindParam(":A", $dadoA, PDO::PARAM_INT);
       $stmt->bindParam(":B", $dadoB, PDO::PARAM_INT);
       $stmt->bindParam(":OPERACAO", $operacao, PDO::PARAM_STR);
       $stmt->bindParam(":RESULTADO", $resultado, PDO::PARAM_INT);
       echo "<br><strong> ( $dadoA ) $operacao ( $dadoB ) = $resultado";
       $stmt->execute();
       echo "<br><br><strong> Adicionado com sucesso ao banco de dados!";
     }

     // Quando o botao multiplicar for acionado
     if (isset($_POST['multiplicar']))
     {
       $operacao = " x ";
       $dadoA = $_POST['nA'];
       $dadoB = $_POST['nB'];
       $calc->entrarA($dadoA);
       $calc->entrarB($dadoB);
       $resultado = $calc->multiplicar();
       $stmt->bindParam(":A", $dadoA, PDO::PARAM_INT);
       $stmt->bindParam(":B", $dadoB, PDO::PARAM_INT);
       $stmt->bindParam(":OPERACAO", $operacao, PDO::PARAM_STR);
       $stmt->bindParam(":RESULTADO", $resultado, PDO::PARAM_INT);
       echo "<br><strong> ( $dadoA ) $operacao ( $dadoB ) = $resultado";
       $stmt->execute();
       echo "<br><br><strong> Adicionado com sucesso ao banco de dados!";     }

     // Quando o botao dividir for acionado
     if (isset($_POST['dividir']))
     {
       $operacao = " / ";
       $dadoA = $_POST['nA'];
       $dadoB = $_POST['nB'];
       $calc->entrarA($dadoA);
       $calc->entrarB($dadoB);
       $resultado = $calc->dividir();
       $stmt->bindParam(":A", $dadoA, PDO::PARAM_INT);
       $stmt->bindParam(":B", $dadoB, PDO::PARAM_INT);
       $stmt->bindParam(":OPERACAO", $operacao, PDO::PARAM_STR);
       $stmt->bindParam(":RESULTADO", $resultado, PDO::PARAM_INT);
       echo "<br><strong> ( $dadoA ) $operacao ( $dadoB ) = $resultado";
       $stmt->execute();
       echo "<br><br><strong> Adicionado com sucesso ao banco de dados!";
     }
   }

   // Se houver algum campo vazio
   elseif ((empty($_POST['nA']) or empty($_POST['nB'])) or (empty($_POST['nA']) && empty($_POST['nB'])))
   {
     // Ao acionar qualquer botão
     if (isset($_POST['somar']) or isset($_POST['subtrair']) or isset($_POST['dividir']) or isset($_POST['multiplicar']))
     {
       echo "<strong>Preencha os campos.</strong>";
     }
   }
}


catch(PDOException $e) {
  echo "<strong> ERRO AO CADASTRAR : </strong> <br>" . $e->getMessage();
}

// Encerra conexão com db
$conn = null;

 ?>
