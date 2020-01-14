<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Fundamentos do PHP </title> 
</head>
	
<body> 
	<h1> Elementos fundamentais da linguagem PHP - exercício 11 da lista L1</h1>
	
<?php
	//recebendo os dados do formulário
	$nota1 = $_POST["nota1"];
	$peso1 = $_POST["peso1"];
	$nota2 = $_POST["nota2"];
	$peso2 = $_POST["peso2"];
	$aluno = $_POST["nome"];
	
	$media = ($nota1*$peso1 + $nota2*$peso2)/($peso1+$peso2);
	$mediaFormatada = number_format($media, 2, ",", ".");
	
	echo "<p> Caro(a) aluno(a) <strong><em> $aluno</strong></em>, de acordo com os dados fornecidos, sua média na Unidade Programação para a Web é <strong><em>$mediaFormatada</strong></em>.</p>"

?> 

</body> 
</html> 