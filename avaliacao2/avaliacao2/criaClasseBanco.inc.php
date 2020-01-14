<?php
	class Banco {
		public $servidor = "localhost";
		public $usuario = "root";
		public $senha = "";

		public $nomeDoBanco = "cti_prw2";
		public $nomeDaTabela = "funcionarios";

		function conectar () {
			$conexao = new mysqli($this->servidor, $this->usuario, $this->senha) or exit($conexao->error);
			return $conexao;
		}

		function definirCharset($conexao) {
			$conexao->set_charset("utf8");
		}

		function criarBanco($conexao) {
			$sql = "CREATE DATABASE IF NOT EXISTS $this->nomeDoBanco";
			$conexao->query($sql) or exit($conexao->error);
		}

		function usaBanco($conexao) {
			$conexao->select_db($this->nomeDoBanco);
		}

		function criaTabela($conexao) {
			$sql = "CREATE TABLE IF NOT EXISTS $this->nomeDaTabela (
			id INT AUTO_INCREMENT PRIMARY KEY,
			salario DECIMAL (7,2),
			data DATE) 
			ENGINE=innoDB";

			$enviado = $conexao->query($sql) or exit($conexao->error);
		}

		function desconectar($conexao) {
			$conexao->close();
		}
	}
?>