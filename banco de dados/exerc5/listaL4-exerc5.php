<?php
$nomeDaInclude1 = "dados.conectar.inc.php";
$nomeDaInclude2 = "conectar.inc.php";
$nomeDaInclude3 = "criar-banco.conectar.inc.php";
$nomeDaInclude4 = "useBanco.inc.php";
$nomeDaInclude5 = "definirCharset.inc.php";
$nomeDaInclude6 = "criarTabela.inc.php";
$nomeDaInclude7 = "desconectar.inc.php";
$nomeDaInclude8 = "criaClasse.inc.php";

require_once $nomeDaInclude1;
require_once $nomeDaInclude2;
require_once $nomeDaInclude3;
require_once $nomeDaInclude4;
require_once $nomeDaInclude5;
require_once $nomeDaInclude6;
require_once $nomeDaInclude8;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title> Banco de dados MySQL com PHP</title>
		<link rel="stylesheet" href="banco.css">
</head>

<body>
	<h1> MySQL com PHP - Exercício 5</h1>
	<form action="listaL4-exerc5.php" method="post">
		<fieldset>
			<legend>Cadastro de Projeto </legend>
			<label class="alinha"> ID do projeto: </label>
			<input type="text" name="id" autofocus> <br>

			<label class="alinha">Orçamento (em R$): </label>
			<input type="number" name="orcamento" step="0.01" min="0"> <br>

			<label class="alinha">Data de início: </label>
			<input type="date" name="data" > <br>

			<label class="alinha">Número de horas necessárias: </label>
			<input type="number" name="horas" min="0"> <br>

			<button type="submit" name="cadastrar"> Cadastrar </button>

			<button type="submit" name="listar"> Listar todos </button>
			<!-- id e orçamento -->

			<button type="submit" name="mostrar"> Mostrar após 2015 </button>
			<!-- mostrar mensagem se não houver -->

			<button type="submit" name="excluir"> Excluir 100h </button>
			<!-- Excluir com horas inferiores a 100 e orçamento inferior a 1000 -->

			<button type="submit" name="media"> Mostrar média </button>
			<!-- mostrar a média de horas e quantos ficaram abaixo da média -->
		</fieldset>

	<?php
$projeto = new Projeto();

if (isset($_POST["cadastrar"])) {
	$projeto->recebeDados($conexao);
	$projeto->cadastrar($conexao, $nomeTabela);
	echo "<p> Projeto cadastrado com sucesso. </p>";
}

if (isset($_POST["listar"])) {
	$projeto->listar($conexao, $nomeTabela);
}

if (isset($_POST["mostrar"])) {
	$projeto->mostrar($conexao, $nomeTabela);
}

if (isset($_POST["excluir"])) {
	$projeto->excluir($conexao, $nomeTabela);
}

if (isset($_POST["media"])) {
	$projeto->media($conexao, $nomeTabela);
}
require_once $nomeDaInclude7 // desconectar db;
?>
</form>
</body>
</html>