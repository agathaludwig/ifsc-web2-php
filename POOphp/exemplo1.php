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
		$nomeDaInclude = "exemplo1.inc.php";
		require_once $nomeDaInclude;
		
		// criar dois objetods do tipo ITEM

		$item1 = new Item("cartucho de tinta", 86.16, "suprimento de impressao");

		$item2 = new Item("placa de video", 568.12, "hardware computacional");

		$cat1 = $item1 -> getCategoria();
		$cat2 = $item2 -> getCategoria();

		echo "<p> Categoria do item 1: $cat1; <br> 
				Categoria do item 2: $cat2 </p>"
	?>

</body> 
</html> 