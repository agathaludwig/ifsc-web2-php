<?php

	class Professor {
		public $matricula;
		public $nome;
		public $uc;

		function recebeDados($conexao) {
			
			$matricula = trim($conexao->escape_string($_POST["matricula-professor"]));
			$nome = trim($conexao->escape_string($_POST["nome-professor"]));
			$uc = trim($conexao->escape_string($_POST["uc"]));

			$this->nome = $nome;
			$this->matricula = $matricula;
			$this->uc = $uc;
		}

		function cadastrar($conexao, $tabelaProfessor) {
			$query = "INSERT $tabelaProfessor VALUES (
						'$this->matricula',
						'$this->nome',
						'$this->uc')";
		$enviado = $conexao->query($query) or die($conexao->error);
		}

	}	


	class Aluno {
		public $matricula;
		public $nome;
		public $matricProfessor;

		function recebeDados($conexao) {
			
			$matricula = trim($conexao->escape_string($_POST["matricula-aluno"]));
			$nome = trim($conexao->escape_string($_POST["nome-aluno"]));
			$matricProfessor = trim($conexao->escape_string($_POST["professor"]));

			$this->matricula = $matricula;
			$this->nome = $nome;
			$this->matricProfessor = $matricProfessor;
		}

		function cadastrarAluno($conexao, $tabelaAluno, $tabelaProfessor) {
			// antes de criar a consulta de inserção dos dados do aluno
			// devemos checar na tabela professor
			// se o numero da matricula do prodessor fornecido existe

			$query = "SELECT matricula FROM $tabelaProfessor WHERE matricula = $this->matricProfessor";
			//testar linhas afetadas =1
			$enviado = $conexao->query($query) or die($conexao->error);
			$quantos = $conexao->affected_rows;
			if ($quantos = 0) {
				echo "Professor não localizado.";
			}
			else {
				$query = "INSERT $tabelaAluno VALUES (
						'$this->matricula',
						'$this->nome',
						'$this->matricProfessor')";
				$enviado = $conexao->query($query) or die($conexao->error);
			}
		}	
	}

	class Operacoes {

		function contarAlunos($conexao, $tabelaProfessor, $tabelaAluno, $professorPesquisado) {
			// consultar se o nome do professor existe na tabela
			$query = "SELECT matricula FROM $tabelaProfessor WHERE nome = '$professorPesquisado'";
			//testar linhas afetadas =1
			$enviado = $conexao->query($query) or die($conexao->error);
			$quantos = $conexao->affected_rows;
			if ($quantos = 0) {
				echo "Professor não localizado.";
			}
			else {
				// se a consulta foi bem sucedida
				$registro = $enviado->fetch_array();
				$matriculaProf = htmlentities($registro[0], ENT_QUOTES, "UTF-8");
			}

			// pesquisa quantos alunos desse professor
			$query = "SELECT COUNT(*) FROM $tabelaAluno WHERE matProfessor = '$matriculaProf'";
			$enviado = $conexao->query($query) or die($conexao->error);
			$registro = $enviado->fetch_array();
			$alunos = htmlentities($registro[0], ENT_QUOTES, "UTF-8");
			return $alunos;
		}
	}
?>