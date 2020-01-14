<?php
// criar consulta para gerar tabela vazia

$query = "CREATE TABLE IF NOT EXISTS $nomeTabela (
	id INT PRIMARY KEY AUTO_INCREMENT, 
	tema VARCHAR (350),
	participantes TINYINT UNSIGNED,
	data DATE,
	terminalidade VARCHAR(50),
	coorientador BOOLEAN,
	metodologia VARCHAR(100)
)";
$enviado = $conexao->query($query) or exit($conexao->error);

?>
