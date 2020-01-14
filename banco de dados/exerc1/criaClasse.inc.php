<?php
//criar a classe Aluno

	class Aluno {
		public $matricula;
		public $uc;
		public $nota1;
		public $nota2;

		// metodos cf. enunciado
		// metodo para receber os dados do formulário
		function recebeDados($conexao) {
			//$matricula = $_POST["matricula"]; -> porta aberta para injeção de sql!

			// escape_string é metodo da classe MySQLi: descarta símbolos adicionais que podem ser perigosos para o banco de dados

			// função trim elimina espaços em branco
			$matricula = trim($conexao->escape_string($_POST["matricula"]));
			$uc = trim($conexao->escape_string($_POST["uc"]));
			$nota1 = trim($conexao->escape_string($_POST["nota1"]));
			$nota2 = trim($conexao->escape_string($_POST["nota2"]));

		// atribuir as variáveis para os atributos da classe

			$this->matricula = $matricula;
			$this->uc = $uc;
			$this->nota1 = $nota1;
			$this->nota2 = $nota2;
		}

		//cadastrar aluno no banco de dados
		function cadastrar($conexao, $nomeTabela) {
			// criar a consulta de inserção dos dados na tabela do bd
			// '' -> texto / varchar
			$query = "INSERT $nomeTabela VALUES (
						'$this->matricula',
						'$this->uc',
						$this->nota1,
						$this->nota2
			)";
		$enviado = $conexao->query($query) or die($conexao->error);
		}

	// metodo para calcular a média de cada aluno 

		function calcularMedia($conexao, $nomeTabela)  {
			$query = "SELECT matricula, (nota1+nota2)/2 FROM $nomeTabela";

			$resultado = $conexao->query($query) or exit($conexao->error);

			// mostrar resultado em formato tabular

			echo "<table>
					<caption> Resultado da média </caption>
					<tr>
						<th> Matrícula </th>
						<th> Média </th>
					</tr>";
					
				// criar um laço para percorrer o Resultado e gerar as
				while ($registro = $resultado->fetch_array())
				{
					// $matricula = $registro[0] -> deixa vulteravel ao ataque xss
					// $media = $registro[1]; -> aplicar metodos sanitizadores para segurança
					$matricula = htmlentities($registro[0], ENT_QUOTES, "UTF-8");
					$media = htmlentities($registro[1], ENT_QUOTES, "UTF-8");
					$mediaFormat = number_format($media, 1, ",", ".");
					echo "<tr>
							<td> $matricula </td>
							<td> $mediaFormat </td>
						<tr>";
				}
				echo "</table>";
			}

		//metodo para contar o numero de alunos aprovados
		function aprovados($conexao, $nomeTabela) {
			// poderia ser um metodo getter
			$query = "SELECT COUNT(*) FROM $nomeTabela WHERE (nota1+nota2)/2 >=6"; // atribui query a variavel
			$resultado = $conexao->query($query) or exit($conexao->error); // faz a query no sql e atribui a variavel
			$registro = $resultado->fetch_array(); // transforma o resultado do sql em array e atribui a variavel
			$quantos = htmlentities($registro[0], ENT_QUOTES, "UTF-8"); // sanitiza o resultado e atribui a variavel
			return $quantos;
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