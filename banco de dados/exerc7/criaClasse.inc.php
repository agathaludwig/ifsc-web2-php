<?php

class Funcionario {
	public $matricula;
	public $nome;
	public $salarioBase;
	public $anos;

	public function recebeDados($conexao) {

		$matricula = trim($conexao->escape_string($_POST["matricula"]));
		$nome = trim($conexao->escape_string($_POST["nome"]));
		$salarioBase = trim($conexao->escape_string($_POST["salario"]));
		$anos = trim($conexao->escape_string($_POST["anos"]));

		$this->matricula = $matricula;
		$this->nome = $nome;
		$this->salarioBase = $salarioBase;
		$this->anos = $anos;
	}

	public function cadastrar($conexao, $nomeTabela) {
		$query = "INSERT $nomeTabela VALUES (
						'$this->matricula',
						'$this->nome',
						'$this->salarioBase',
						$this->anos)";
		$enviado = $conexao->query($query) or die($conexao->error);
	}

	public function alterar($conexao, $nomeTabela, $novoSalario, $matricula) {

		$query = "SELECT * FROM $nomeTabela WHERE matricula = $matricula";
		//testar linhas afetadas =1
		$enviado = $conexao->query($query) or die($conexao->error);
		$quantos = $conexao->affected_rows;
		if ($quantos == 0) {
			echo "<p>Funcionario não localizado.</p>";
		} else {
			$query = "UPDATE $nomeTabela
							SET salarioBase = '$novoSalario'
							WHERE matricula = '$this->matricula'";
			$enviado = $conexao->query($query) or die($conexao->error);
			echo "<p> Salário alterado com sucesso. </p>";
		}
	}

	public function contar($conexao, $nomeTabela) {
		$query = "SELECT COUNT(*)
					FROM $nomeTabela
					WHERE nome = 'João' OR nome = 'Maria'";
		$enviado = $conexao->query($query) or die($conexao->error);
		$registro = $enviado->fetch_array();
		$quantos = htmlentities($registro[0], ENT_QUOTES, "UTF-8");

		if ($quantos != 0) {
			echo "<p> Foram cadastrados $quantos Joãos ou Marias.</p>";
		} else {
			echo "<p>Nenhum funcionário(a) chamados João ou Maria.</p>";
		}
	}

	public function listar($conexao, $nomeTabela) {
		$query = "SELECT * FROM $nomeTabela";
		$enviado = $conexao->query($query) or die($conexao->error);
		echo "<table>
					<caption> Funcionários Cadastrados </caption>
					<tr>
						<th> Matrícula </th>
						<th> Nome </th>
						<th> Tempo de serviço </th>
						<th> Salário Total </th>
					</tr>";

		while ($registro = $enviado->fetch_array()) {
			$matricula = htmlentities($registro[0], ENT_QUOTES, "UTF-8");
			$nome = htmlentities($registro[1], ENT_QUOTES, "UTF-8");
			$salarioBase = htmlentities($registro[2], ENT_QUOTES, "UTF-8");
			$anos = htmlentities($registro[3], ENT_QUOTES, "UTF-8");
			if ($anos > 10) {
				$salarioTotal = $salarioBase + (50 / 100 * $salariobase);
			} else {
				$salarioTotal = ($anos * 5 / 100 * $salarioBase) + $salarioBase;
			}

			echo "<tr>
						<td> $matricula </td>
						<td> $nome </td>
						<td> $anos </td>
						<td> $salarioTotal </td>
					<tr>";
		}
		echo "</table>";
	}

}

?>