<?php

class Funcionario {
	public $id;
	public $salario;
	public $data;

	public function recebeDados($conexao) {

		$salario = trim($conexao->escape_string($_POST["salario"]));
		$data = trim($conexao->escape_string($_POST["data"]));

		$this->salario = $salario;
		$this->data = $data;
	}

	public function cadastrar($conexao, $nomeDaTabela) {
		$query = "INSERT $nomeDaTabela VALUES (
						DEFAULT,
						'$this->salario',
						'$this->data')";
		$enviado = $conexao->query($query) or die($conexao->error);
		echo "<p> Funcionário cadastrado com sucesso. </p>";
	}


	public function contar($conexao, $nomeDaTabela) {
		$query = "SELECT COUNT(*)
					FROM $nomeDaTabela
					WHERE salario > 1000 AND data > '2019-01-01'";
		$enviado = $conexao->query($query) or die($conexao->error);
		$registro = $enviado->fetch_array();
		$quantos = htmlentities($registro[0], ENT_QUOTES, "UTF-8");

		if ($quantos != 0) {
			echo "<p> Foram cadastrados $quantos funcionário(s) com salário acima de R$ 1.000 e contratados após 01/01/2019.</p>";
		} else {
			echo "<p>Nenhum funcionário(a) com salário acima de R$ 1.000 e contratados após 01/01/2019.</p>";
		}
	}
}

?>