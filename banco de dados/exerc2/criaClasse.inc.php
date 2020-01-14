<?php

	class Pis {
		public $tema;
		public $participantes;
		public $dataApresentacao;
		public $terminalidade;
		public $coorientador;
		public $metodologia;

		function recebeDados($conexao) {
			// testar se um botao de radio foi selecionado
			if(!isset($_POST["coorientador"])) {
				exit("<p> Você esqueceu de preencher quanto ao coorientador. </p>");
			}

			$tema = trim($conexao->escape_string($_POST["tema"]));
			$participantes = trim($conexao->escape_string($_POST["num-participantes"]));
			$dataApresentacao = trim($conexao->escape_string($_POST["data-apresentacao"]));
			$terminalidade = trim($conexao->escape_string($_POST["terminalidade"]));
			$coorientador = trim($conexao->escape_string($_POST["coorientador"]));
			
			// testar se nenhum checkbox foi marcado, neste caso setamos a metodologia com uma string default
			if(!isset($_POST["metodologia"])) {
				$metodologia = "Nenhuma metodologia selecionada";
			}
			else {
				// como metodologia é vetor, converter em string unica
				$metodologia = $_POST["metodologia"];
				$metodologia = implode(" - ", $metodologia);
			}
				// sanitizando metodologia (é necessário)
				$metodologia = trim($conexao->escape_string($metodologia));
			
				$this->tema = $tema;
				$this->participantes = $participantes;
				$this->dataApresentacao = $dataApresentacao;
				$this->terminalidade = $terminalidade;
				$this->coorientador = $coorientador;
				$this->metodologia = $metodologia;
		}

		function cadastrar($conexao, $nomeTabela) {
			$query = "INSERT $nomeTabela VALUES (
					default,
					'$this->tema',
					$this->participantes,
					'$this->dataApresentacao',
					'$this->terminalidade',
					$this->coorientador,
					'$this->metodologia'				
			)";
		$enviado = $conexao->query($query) or die($conexao->error);
		echo "<p> Dados cadastrados com sucesso.</p>";
		}

	// metodo para listar dados

		function listar($conexao, $nomeTabela)  {
			$query = "SELECT tema, participantes FROM $nomeTabela WHERE data < '2015-01-05' AND coorientador = 1";

			$resultado = $conexao->query($query) or exit($conexao->error);

			// retorno de numero de linhas do resultset
			$linhas = $conexao->affected_rows;
			if ($linhas == 0) {
				echo "<p>Nenhum registro com data anterior a 05/01/2015 com coorientador.</p>";
			}
			else {
				echo "<table>
					<caption> PIs com data anterior a 05/01/2015 e coorientador </caption>
					<tr>
						<th> Tema ou Título</th>
						<th> Nº de alunos </th>
					</tr>";
				while ($registro = $resultado->fetch_array())
				{
					$tema = htmlentities($registro[0], ENT_QUOTES, "UTF-8");
					$numero = htmlentities($registro[1], ENT_QUOTES, "UTF-8");
					echo "<tr>
							<td> $tema </td>
							<td> $numero </td>
						<tr>";
				}
				echo "</table>";
			}
		}
		// exluir todos pis com mais de 2 participantes
		function excluir($conexao, $nomeTabela) {
			$query = "DELETE FROM $nomeTabela WHERE participantes > 2";
			$conexao->query($query) or exit($conexao->error); 
			$quantos = $conexao->affected_rows;
			return $quantos;
		}

		//alterar data para 01/03/2018 para todo registro cujo titulo inluir WEB

		function alterarData($conexao, $nomeTabela) {
			$query = "UPDATE $nomeTabela SET data = '2018-03-01' WHERE tema LIKE '%WEB%' "; 
			$conexao->query($query) or exit($conexao->error); 
			$quantos = $conexao->affected_rows;
			return $quantos;
		}
		function contar($conexao, $nomeTabela) {
			$query = "SELECT COUNT(*) FROM $nomeTabela WHERE terminalidade = 'Pesquisa teórica' OR metodologia = 'Pesquisa de campo'";
			$resultado = $conexao->query($query) or exit($conexao->error); 
			$registro = $resultado->fetch_array(); 
			$quantos = htmlentities($registro[0], ENT_QUOTES, "UTF-8"); 
			return $quantos;
		}

	}
?>