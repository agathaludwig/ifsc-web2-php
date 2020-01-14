<?php
	//delcaração da classe

	class Curso {
		// curso de curta duração : <= 1 semestre
		// curso de media duração : > 1 semestre <= 4
		// curso de longa duração : > 4 semestre
		public $nome, $duracao;

		function __construct($nomeDoCurso, $duracaoDoCurso) {
			$this->nome = $nomeDoCurso; 
			$this->duracao = $duracaoDoCurso;
		}

		function getNome() { 
			return $this->nome;
		}

		function classificarCurso() { 
			if ($this->duracao <= 1) {
				$mensagem = "Curso de curta duração";
			}
			elseif ($this->duracao > 1 and $this->duracao <= 4 ) {
				$mensagem = "Curso de média duração";
			}
			else {
				$mensagem = "Curso de longa duração";
			}
			return $mensagem;
		}
	}

?>