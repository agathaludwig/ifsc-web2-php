<?php
// criar a tabela professores, ATENTAR a ordem, primeiro a tabela PRIMARY KEY
// devido as restrições da chave estrangeira, imposto pelo SQL

$query = "CREATE TABLE IF NOT EXISTS $tabelaProfessor (
	matricula VARCHAR(20) PRIMARY KEY,
	nome VARCHAR(350),
	uc VARCHAR(300))
	ENGINE=InnoDB";
$enviado = $conexao->query($query) or exit($conexao->error);

// EM SEGUIDA, CRIAR TABELAS DEPENDENTES 

$query = "CREATE TABLE IF NOT EXISTS $tabelaAluno (
	matricula VARCHAR(20) PRIMARY KEY,
	nome VARCHAR(350),
	matProfessor VARCHAR(20),

	FOREIGN KEY (matProfessor) REFERENCES $tabelaProfessor(matricula)
	ON DELETE CASCADE
	ON UPDATE CASCADE
	) ENGINE=InnoDB";
$enviado = $conexao->query($query) or exit($conexao->error);
?>
