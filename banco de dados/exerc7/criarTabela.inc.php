<?php

$query = "CREATE TABLE IF NOT EXISTS $nomeTabela (
	matricula VARCHAR(20) PRIMARY KEY,
	nome VARCHAR(100),
	salarioBase DECIMAL (11,2),
	tempoServico INT)
	ENGINE=InnoDB";
$enviado = $conexao->query($query) or exit($conexao->error);

?>
