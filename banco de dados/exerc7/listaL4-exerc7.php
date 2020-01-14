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
	<h1> MySQL com PHP - Exercício 7</h1>
	<form action="listaL4-exerc7.php" method="post">
		<fieldset>
			<legend>Cadastro de Funcionário </legend>
			<label class="alinha"> Matrícula: </label>
			<input type="text" name="matricula" autofocus> <br>

			<label class="alinha"> Nome: </label>
			<input type="text" name="nome"> <br>

			<label class="alinha">Salário base (em R$): </label>
			<input type="number" name="salario" step="0.01" min="0"> <br>

			<label class="alinha">Tempo de serviço (em anos): </label>
			<input type="number" name="anos" min="0"> <br>

			<button type="submit" name="cadastrar"> Cadastrar </button>

			<button type="submit" name="alterar"> Alterar salário </button>
			<!-- alterar salário base dada matrícula -->

			<button type="submit" name="contar"> Contar joãos e marias </button>
			<!-- contar funcionarios que contenham joão ou maria no nome -->

			<button type="submit" name="tabelar"> Montar tabela </button>
			<!-- Montar tabela que contenha matricula, nome, tempo servico e salario total -->
			<!-- salario total: (temposerviço * 5/100 * salariobase) + salario base  -->
			<!-- se temposerviço > 10 anos : salariobase + (50/100 x salariobase)  -->

		</fieldset>

	<?php
$funcionario = new Funcionario();

if (isset($_POST["cadastrar"])) {
	$funcionario->recebeDados($conexao);
	$funcionario->cadastrar($conexao, $nomeTabela);
	echo "<p> Funcionário cadastrado com sucesso. </p>";
}

if (isset($_POST["alterar"])) {
	$matricula = trim($conexao->escape_string($_POST["matricula"]));
	$novoSalario = trim($conexao->escape_string($_POST["salario"]));

	$funcionario->alterar($conexao, $nomeTabela, $novoSalario, $matricula);
}

if (isset($_POST["contar"])) {
	$funcionario->contar($conexao, $nomeTabela);
}

if (isset($_POST["tabelar"])) {
	$funcionario->listar($conexao, $nomeTabela);
}

require_once $nomeDaInclude7 // desconectar db;
?>
</form>
</body>
</html>