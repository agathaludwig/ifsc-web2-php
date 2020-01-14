<?php

class Projeto {
	public $id;
	public $orcamento;
	public $data;
	public $horas;

	public function recebeDados($conexao) {

		$id = trim($conexao->escape_string($_POST["id"]));
		$orcamento = trim($conexao->escape_string($_POST["orcamento"]));
		$data = trim($conexao->escape_string($_POST["data"]));
		$horas = trim($conexao->escape_string($_POST["horas"]));

		$this->id = $id;
		$this->orcamento = $orcamento;
		$this->data = $data;
		$this->horas = $horas;
	}

	public function cadastrar($conexao, $nomeTabela) {
		$query = "INSERT $nomeTabela VALUES (
						'$this->id',
						'$this->orcamento',
						'$this->data',
						$this->horas)";
		$enviado = $conexao->query($query) or die($conexao->error);
	}

	public function listar($conexao, $nomeTabela) {
		$query = "SELECT id, orcamento FROM $nomeTabela";
		$enviado = $conexao->query($query) or die($conexao->error);
		echo "<table>
					<caption> Projetos Cadastrados </caption>
					<tr>
						<th> Id </th>
						<th> Orçamento </th>
					</tr>";

		while ($registro = $enviado->fetch_array()) {
			$id = htmlentities($registro[0], ENT_QUOTES, "UTF-8");
			$orcamento = htmlentities($registro[1], ENT_QUOTES, "UTF-8");
			echo "<tr>
						<td> $id </td>
						<td> $orcamento </td>
					<tr>";
		}
		echo "</table>";
	}

	public function mostrar($conexao, $nomeTabela) {
		$query = "SELECT COUNT(*) FROM $nomeTabela WHERE YEAR(data) > 2015";
		$enviado = $conexao->query($query) or die($conexao->error);
		$registro = $enviado->fetch_array();
		$quantos = htmlentities($registro[0], ENT_QUOTES, "UTF-8");

		if ($quantos != 0) {
			echo "<p> Foram cadastrados $quantos projetos com data posterior a 2015.</p>";
		} else {
			echo "<p>Nenhum projeto com data posterior a 2015.</p>";
		}
	}

	public function excluir($conexao, $nomeTabela) {
		//<!-- Excluir com horas inferiores a 100 e orçamento inferior a 1000 -->
		$query = "DELETE FROM $nomeTabela WHERE horas < 100 AND orcamento < '1000'";
		$enviado = $conexao->query($query) or die($conexao->error);
		$quantos = $conexao->affected_rows;

		if ($quantos != 0) {
			echo "<p> Foram deletados $quantos projetos com menos de 100h e orçamento inferior a R$1.000,00.</p>";
		} else {
			echo "<p>Nenhum projeto com menos de 100h e orçamento inferior a R$1.000,00.</p>";
		}
	}

	public function media($conexao, $nomeTabela) {
		//<!-- mostrar a média de horas e quantos ficaram abaixo da média -->
		// calcular média geral de horas
		$query = "SELECT AVG(horas) FROM $nomeTabela";
		$enviado = $conexao->query($query) or die($conexao->error);
		$registro = $enviado->fetch_array();
		$media = htmlentities($registro[0], ENT_QUOTES, "UTF-8");
		$mediaFormat = number_format($media, 0, ",", ".");
		echo "<p> A média de horas dos cursos cadastrados é $mediaFormat horas. <br>";

		// quantos abaixo da média
		$query = "SELECT COUNT(*) FROM $nomeTabela WHERE horas > $media";
		$enviado = $conexao->query($query) or die($conexao->error);
		$registro = $enviado->fetch_array();
		$quantos = htmlentities($registro[0], ENT_QUOTES, "UTF-8");
		//$mediaFormat = number_format($media, 0, ",", ".");
		echo "Temos $quantos projeto(s) com horas acima da média. </p>";
	}
}

?>