<?php
$nomeDaInclude1 = "criaClasseBanco.inc.php";
$nomeDaInclude2 = "criaClasseFuncionario.inc.php";

require_once $nomeDaInclude1;
require_once $nomeDaInclude2;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title> Avaliação 02</title>
		<link rel="stylesheet" href="banco.css">
</head>

<body>
	<h1> PHP com Banco de Dados MySQL</h1>
	<form action="avaliacao2.php" method="post">
		<fieldset>
			<legend>Cadastro de informações </legend>
			
			<label class="alinha">Salário mensal do funcionário: </label>
			<input type="number" name="salario" step="0.01" min="0"> <br>

			<label class="alinha">Data da contratação: </label>
			<input type="date" name="data"> <br>

			<button type="submit" name="cadastrar"> Processar dados dos funcionários </button>

		</fieldset>

	<?php


	if (isset($_POST["cadastrar"])) {
		$banco = new Banco();
		$conexao = $banco->conectar();
		$banco->definirCharset($conexao);
		$banco->criarBanco($conexao);
		$banco->usaBanco($conexao);
		$banco->criaTabela($conexao);

		$funcionario = new Funcionario();
		$funcionario->recebeDados($conexao);
		$funcionario->cadastrar($conexao, $banco->nomeDaTabela);
		$funcionario->contar($conexao, $banco->nomeDaTabela);

		$banco->desconectar($conexao);
	}

?>
</form>
</body>
</html>