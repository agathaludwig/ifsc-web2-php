<?php

$query = "CREATE TABLE IF NOT EXISTS $nomeTabela (
	id VARCHAR(20) PRIMARY KEY,
	orcamento DECIMAL (11,2),
	data DATE,
	horas INT)
	ENGINE=InnoDB";
$enviado = $conexao->query($query) or exit($conexao->error);

?>
