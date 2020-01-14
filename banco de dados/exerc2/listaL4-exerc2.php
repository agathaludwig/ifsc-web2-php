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
	<h1> MySQL com PHP - Exercício 2</h1>
	<form action="listaL4-exerc2.php" method="post">
		<fieldset>
			<legend>Controle de Projetos Integradores </legend>

			<label class="alinha" class="alinha">Tema/Título do PI: </label>
			<input type="text" name="tema" class="maior" autofocus> <br>
			
			<label class="alinha">Número de alunos participantes: </label>
			<input type="number" name="num-participantes" min="1" max="4"> <br>
			
			<label class="alinha">Data de apresentação: </label>
			<input type="date" name="data-apresentacao"> <br>
			
			<label class="alinha">Terminalidade: </label>
			<select name="terminalidade">
				<option> Aplicação para a Web </option>
				<option> Pesquisa Teórica </option> 
			</select> <br> <br>

			<label class="alinha">Presença de professor coorientador: </label> 
			<input type="radio" name = "coorientador" value="1"> Sim  
			<input type="radio" name = "coorientador" value="0"> Não <br>

			<label class="alinha">Metodologia utilizada: </label> 
			<input type="checkbox" name=metodologia[]" value="Plano de ação"> Plano de ação
			<input type="checkbox" name=metodologia[]" value="Pesquisa de campo"> Pesquisa de campo <br>

			<div class="botoes">
				<button type="submit" name="cadastrar"> Cadastrar dados</button>
				<button type="submit" name="listar"> Listar dados</button>
				<button type="submit" name="excluir"> Excluir dados</button>
				<button type="submit" name="alterar"> Alterar data</button>
				<button type="submit" name="contar"> Contar projetos</button>
			</div>
		</fieldset>
	</form>

	<?php
		$pi = new Pis();
		if(isset($_POST["cadastrar"])) {
			$pi->recebeDados($conexao);
			$pi->cadastrar($conexao, $nomeTabela);
		}
		if(isset($_POST["listar"])) {
			$pi->listar($conexao, $nomeTabela);
		}
		if(isset($_POST["excluir"])) {
			$excluidos = $pi->excluir($conexao, $nomeTabela);
			echo "<p>Foram excluidos $excluidos Projetos Integradores (PIs) </p>";
		}
		if(isset($_POST["alterar"])) {
			$alterados = $pi->alterarData($conexao, $nomeTabela);
			echo "<p>Foram alterados $alterados Projetos Integradores (PIs) </p>";
		}
		if(isset($_POST["contar"])) {
			$cadastrados = $pi->contar($conexao, $nomeTabela);
			echo "<p>Foram cadastrados $cadastrados Projetos Integradores (PIs) cuja terminalidade é Pesquisa Teórica ou a metodologia corresponde a Pesquisa de Campo</p>";
		}

	require_once $nomeDaInclude7; // desconectar
	?>
</body> 
</html> 