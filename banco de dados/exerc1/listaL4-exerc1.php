<?php
// inserir includes
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
	<h1> MySQL com PHP - Exercício 1</h1>
	<form action="listaL4-exerc1.php" method="post">
		<fieldset>
			<legend>Cadastro e processamento dos dados dos alunos do CTI </legend>
			<label class="alinha" class="alinha">Nome da UC: </label>
			<input type="text" name="uc" class="maior" autofocus> <br>
			<label class="alinha">Matrícula do aluno: </label>
			<input type="text" name="matricula"> <br>
			<label class="alinha">Nota da primeira avaliação: </label>
			<input type="number" name="nota1" step="0.1" min="0" max="10"> <br>
			<label class="alinha">Nota da segunda avaliação: </label>
			<input type="number" name="nota2" step="0.1" min="0" max="10"> <br>
		</fieldset>
		<fieldset>
			<legend>Operações sobre o MySQL </legend>
			<label>Selecione uma operação: </label> <br>
			<input type='radio' name='operacao' value='1'> Cadastrar dados <br>
			<input type='radio' name='operacao' value='2'> Mostrar médias <br>
			<input type='radio' name='operacao' value='3'> Visualizar aprovados <br>
			<input type='radio' name='operacao' value='4'> Mostrar dados de aprovados <br>
			<button type="submit" name="enviar"> Executar operação</button>
		</fieldset>
	</form>

	<?php
		if(isset($_POST["enviar"])){
		// criar objeto Aluno
			$aluno = new Aluno();

			// testar qual operação do botao de rádio foi escolhida
			$operacao = $_POST["operacao"];
			if ($operacao == "1") {
				$aluno->recebeDados($conexao);
				$aluno->cadastrar($conexao, $nomeTabela);
				echo "<p> Dados cadastrados com sucesso. </p>";
			}
			if ($operacao == "2") {
				$aluno->calcularMedia($conexao, $nomeTabela);
			}
			if ($operacao == "3") {
				$quantos = $aluno->aprovados($conexao, $nomeTabela);
				echo "<p> Número de alunos aprovados = $quantos </p>";
			}
			if ($operacao == "4") {
				$aluno->mostrarDados($conexao, $nomeTabela);
			}

		}
	require_once $nomeDaInclude7 // desconectar db;
	?>
</body> 
</html> 