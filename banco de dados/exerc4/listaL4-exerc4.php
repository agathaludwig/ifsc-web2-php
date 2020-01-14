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
	<h1> MySQL com PHP - Exercício 4</h1>
	<form action="listaL4-exerc4.php" method="post">
		<fieldset>
			<legend>Cadastro de Professor </legend>
			<label class="alinha" class="alinha">Nome: </label>
			<input type="text" name="nome-professor" class="maior" autofocus> <br>

			<label class="alinha">Unidade Curricular: </label>
			<input type="text" name="uc" class="maior"> <br>

			<label class="alinha">Matrícula: </label>
			<input type="text" name="matricula-professor" maxlength=20> <br>

			<button type="submit" name="cadastrar-professor"> Cadastrar professor</button>
		</fieldset>

		<fieldset>
			<legend>Cadastro de Aluno </legend>

			<label class="alinha" class="alinha">Nome: </label>
			<input type="text" name="nome-aluno" class="maior"> <br>

			<label class="alinha">Matrícula: </label>
			<input type="text" name="matricula-aluno" maxlength=20> <br>

			<label class="alinha">Professor: </label>
			<select name="professor"> 
				<option>  </option>
				<?php
					$query = "SELECT * FROM $tabelaProfessor";
					$executa = $conexao->query($query);
					while ($row = $executa->fetch_array()) {
						echo "<option value= '$row[0]'> $row[1] </option>";
					}
				?>
			</select>	
			<br>

			<button type="submit" name="cadastrar-aluno"> Cadastrar aluno</button>
		</fieldset>

		<fieldset>
			<legend>Pesquisar Professor </legend>
			<label class="alinha" class="alinha">Nome do professor: </label>
			<input type="text" name="pesquisar-professor" class="maior"> <br>

			<button type="submit" formtarget="_blank" name="pesquisar"> Pesquisar professor</button>
		</fieldset>

	<?php
		$professor = new Professor();
		$aluno = new Aluno();
		$operacoes = new Operacoes();

		if(isset($_POST["cadastrar-professor"])){
			$professor->recebeDados($conexao);
			$professor->cadastrar($conexao, $tabelaProfessor);
			echo "<p> Professor cadastrado com sucesso. </p>";
			}

		if(isset($_POST["cadastrar-aluno"])){
			$aluno->recebeDados($conexao);
			$aluno->cadastrarAluno($conexao, $tabelaAluno, $tabelaProfessor);
			echo "<p> Aluno cadastrado com sucesso. </p>";
			}

		if(isset($_POST["pesquisar"])){
			$professorPesquisado = trim($conexao->escape_string($_POST["pesquisar-professor"]));
			$quantos = $operacoes->contarAlunos($conexao, $tabelaProfessor, $tabelaAluno, $professorPesquisado); 
			echo "<p> Este professor tem $quantos alunos. </p>";
			}
	require_once $nomeDaInclude7 // desconectar db;
	?>
</body> 
</html> 