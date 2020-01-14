<?php
// criar consulta para gerar tabela vazia

$query = "CREATE TABLE IF NOT EXISTS $nomeTabela (
	cpf VARCHAR(20) PRIMARY KEY,
	nome VARCHAR(350),
	cartao VARCHAR(128),
	diarias DECIMAL(3,1) UNSIGNED,
	valor DECIMAL(7,2),
	procedencia VARCHAR(20),
	companhia VARCHAR(20),
	checkin DATETIME)";

$enviado = $conexao->query($query) or exit($conexao->error);

?>
