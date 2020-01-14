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
	<h1> MySQL com PHP - Exercício 3</h1>
	<form action="listaL4-exerc3.php" method="post">
		<fieldset>
			<legend>Controle de hospedagem </legend>
			<label class="alinha" class="alinha">Nome do hospede: </label>
			<input type="text" name="nome" class="maior" autofocus> <br>

			<label class="alinha">Cpf: </label>
			<input type="text" name="cpf"> <br>

			<label class="alinha">Numero do cartão: </label>
			<input type="text" name="cartao" maxlength="20"> <br>

			<label class="alinha">Numero de diárias: </label>
			<input type="number" name="diarias" step="0.1" min="1"> <br>

			<label class="alinha">Valor da diária: R$ </label>
			<input type="number" name="valor" step="0.01" min="0"> <br>
		
			<label class="alinha">País de origem: </label> <br>
			<input type="radio" name="procedencia" value="Brasil" checked> Brasil </input> <br>
			<input type="radio" name="procedencia" value="Argentina"> Argentina </input> <br>
		
			<label class="alinha">Companhia aérea utilizada: </label><br>
			<input type="checkbox" name="companhia[]" value="Gol"> Gol </input> <br>
			<input type="checkbox" name="companhia[]" value="Azul"> Azul </input> <br>
		
			<button type="submit" name="cadastrar"> Cadastrar hóspede</button>
		</fieldset>

		<fieldset>
			<legend>Alteração de diárias </legend>

			<label class="alinha">Buscar pelo Cpf: </label>
			<input type="text" name="busca-cpf"> <br>

			<label class="alinha">Novo número de diárias: </label>
			<input type="number" name="altera-diarias" step="0.1" min="1"> <br>

			<button type="submit" name="alterar"> Alterar diárias</button>
		</fieldset>

		<fieldset>
			<legend>Outras operações </legend>
			<button type="submit" name="excluir"> Excluir hóspedes</button>
			<button type="submit" name="listar1"> Listar 1 </button>
			<button type="submit" name="listar2"> Listar 2 </button>
			<button type="submit" name="faturar"> Mostrar faturamento </button>
		</fieldset>
	</form>

	<?php
		$hospede = new Hospede();
		if(isset($_POST["cadastrar"])){
			$hospede->recebeDados($conexao);
			$hospede->cadastrar($conexao, $nomeTabela);
			echo "<p> Dados cadastrados com sucesso. </p>";
			}

		if(isset($_POST["alterar"])){
			$alterados = $hospede->alterarDiarias($conexao, $nomeTabela);

			if ($alterados > 0) {
				echo "<p>Número de diárias alterado com sucesso.</p>";
			}
			else {
				echo "<p>Este CPF não foi localizado.</p>";
			}
		}

	require_once $nomeDaInclude7 // desconectar db;
	?>
</body> 
</html> 