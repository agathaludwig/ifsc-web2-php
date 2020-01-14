<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Orientação a Objetos</title> 
		<link rel="stylesheet" href="formata-includes-funcoes.css">
</head> 

<body> 
	<h1> Orientação a objetos em php</h1>
	<?php
		// inserir include que contem a classe
		$nomeDaInclude = "exemplo3.inc.php";
		require_once $nomeDaInclude;
		
		$conta1 = new ContaBancaria(150);
		$conta2 = new ContaBancaria(280);

		$msgDep1 = $conta1->depositar(100);
		$msgSaq1 = $conta1->sacar(50);
		$mensagem = $conta1->mostrarSaldo();
		echo "$msgDep1, $msgSaq1, $mensagem";

		$msgDep2 = $conta2->depositar(100);
		$msgSaq2 = $conta2->sacar(50);
		$mensagem = $conta2->mostrarSaldo();

		echo "$msgDep2, $msgSaq2, $mensagem";

	?>

</body> 
</html> 