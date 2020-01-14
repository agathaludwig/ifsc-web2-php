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
		$nomeDaInclude = "exemplo2.inc.php";
		require_once $nomeDaInclude;
		
		$curso1 = new Curso("Tecnico em informática", 3);
		$curso2 = new Curso("Curso superior GTI", 6);

		$nomeCurso1 = $curso1->getNome();
		$nomeCurso2 = $curso2->getNome();

		$classiCurso1 = $curso1->classificarCurso();
		$classiCurso2 = $curso2->classificarCurso();

		echo "<p> $nomeCurso1: $classiCurso1; <br> 
				$nomeCurso2: $classiCurso2. </p>"
	?>

</body> 
</html> 