<?php
// criar consulta para gerar tabela vazia

$query = "CREATE TABLE IF NOT EXISTS $nomeTabela (
	matricula VARCHAR(20) PRIMARY KEY,
	uc VARCHAR(100),
	nota1 DECIMAL(3,1) UNSIGNED,
	nota2 DECIMAL(3,1) UNSIGNED)";

$enviado = $conexao->query($query) or exit($conexao->error);

?>
