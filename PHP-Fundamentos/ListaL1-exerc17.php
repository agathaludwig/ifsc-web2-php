<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Fundamentos do PHP </title> 
	<link rel="stylesheet" href="formularios.css"> 
</head> 

<body>
	<h1> Elementos fundamentais da linguagem PHP </h1>
	
	<?php     
		$total = $_POST["compras"];
		$comissao = $_POST["comissao"];
		$totalComissao = $total * $comissao/100;
		
		$totalComissaoFormat = number_format($totalComissao, 2, ',', '.');

		echo "<p> Total da comissão do vendedor nesta compra: <br>
							R$ $totalComissaoFormat </p>";
	?>
</body> 
</html> 