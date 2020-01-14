<?php

	class Hospede {
		public $nome;
		public $cpf;
		public $cartao;
		public $diarias;
		public $valor;
		public $procedencia;
		public $companhia;

		function recebeDados($conexao) {
			
			$nome = trim($conexao->escape_string($_POST["nome"]));
			$cpf = trim($conexao->escape_string($_POST["cpf"]));
			$cartao = trim($conexao->escape_string($_POST["cartao"]));
			$diarias = trim($conexao->escape_string($_POST["diarias"]));
			$valor = trim($conexao->escape_string($_POST["valor"]));
			$procedencia = trim($conexao->escape_string($_POST["procedencia"]));

			// testar se nenhum checkbox foi marcado, neste caso setamos a metodologia com uma string default
			if(!isset($_POST["companhia"])) {
				$companhia = "Nenhuma companhia";
			}
			else {
				$companhia = $_POST["companhia"];
				$companhia = implode(" - ", $companhia);
			}
				$companhia = trim($conexao->escape_string($companhia));

			// criptografar o número do cartão de credito hash();
				$cartaoCriptografado = hash("sha512", $cartao);

			$this->nome = $nome;
			$this->cpf = $cpf;
			$this->cartao = $cartaoCriptografado;
			$this->diarias = $diarias;
			$this->valor = $valor;
			$this->procedencia = $procedencia;
			$this->companhia = $companhia;
		}

		function cadastrar($conexao, $nomeTabela) {
			$query = "INSERT $nomeTabela VALUES (
						'$this->cpf',
						'$this->nome',
						'$this->cartao',
						$this->diarias,
						$this->valor,
						'$this->procedencia',
						'$this->companhia', 
						NOW())";
		$enviado = $conexao->query($query) or die($conexao->error);
		}

		function alterarDiarias($conexao, $nomeTabela)  {
		//RECEBER OS DADOS DA BUSCA DO FRORMULARIO
			$buscaCpf = trim($conexao->escape_string($_POST["busca-cpf"]));
			$novoDiarias = trim($conexao->escape_string($_POST["altera-diarias"]));

			$query = "UPDATE $nomeTabela 
						SET diarias = $novoDiarias 
						WHERE cpf = '$buscaCpf'";

			$resultado = $conexao->query($query) or exit($conexao->error);
			$quantos = $conexao->affected_rows;
			return $quantos;
		}

		function excluir($conexao, $nomeTabela) {
			// excluir hospedes argentinos com checkin antes de 01/06/2018
			$query = "DELETE * FROM $nomeTabela 
						WHERE procedencia = Argentina 
						AND checkin < 2018-06-01"; 
			$resultado = $conexao->query($query) or exit($conexao->error); 
			$registro = $resultado->fetch_array(); 
		}

		//metodo para mostrar dados de alunos aprovados

		function mostrarDados($conexao, $nomeTabela) {
			// poderia ser um metodo getter
			$query = "SELECT matricula, uc, nota1, nota2, (nota1+nota2)/2 FROM $nomeTabela WHERE (nota1+nota2)/2 >= 6"; 
			$resultado = $conexao->query($query) or exit($conexao->error); 

			echo "<table>
					<caption> Resultado da média </caption>
					<tr>
						<th> Matrícula </th>
						<th> UC </th>
						<th> Nota 1 </th>
						<th> Nota 2 </th>
						<th> Média </th>
					</tr>";
					
			while ($registro = $resultado->fetch_array())
			{
				$matricula = htmlentities($registro[0], ENT_QUOTES, "UTF-8");
				$uc = htmlentities($registro[1], ENT_QUOTES, "UTF-8");
				$nota1 = htmlentities($registro[2], ENT_QUOTES, "UTF-8");
				$nota2 = htmlentities($registro[3], ENT_QUOTES, "UTF-8");
				$media = htmlentities($registro[4], ENT_QUOTES, "UTF-8");
				$mediaFormat = number_format($media, 1, ",", ".");
				echo "<tr>
						<td> $matricula </td>
						<td> $uc </td>
						<td> $nota1 </td>
						<td> $nota2 </td>
						<td> $mediaFormat </td>
					<tr>";
			}
			echo "</table>";
		}
	}
?>