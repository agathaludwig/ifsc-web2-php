<?php
	//delcaração da classe

	class ContaBancaria {

		public $saldo;

		function __construct($depositoInicial) {
			$this->saldo = $depositoInicial; 
		}

		function mostrarSaldo() { 
			$saldoAtual = $this->saldo;
			$mensagem = "<p> Saldo atual: R$$saldoAtual.</p>";
			return $mensagem;
		}

		function depositar($valor) { 
			$this->saldo += $valor;
			$mensagem = "<p> O depósito de R$$valor foi efetuado em sua conta.</p>";
			return $mensagem;
		}
		function sacar($valor) { 
			$this->saldo += $valor;
			$mensagem = "<p> O saque de R$$valor foi efetuado em sua conta.</p>";
			return $mensagem;
		}
	}

?>