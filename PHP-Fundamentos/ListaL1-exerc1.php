<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Fundamentos do PHP </title> 
</head>
	
<body> 
	<h1> Elementos fundamentais da linguagem PHP </h1>
	
	<?php
		//comentário de uma linha
		
		/*comentário
		de várias
		linhas*/
		
		$nome = "Maria";
		$sobrenome = 'das Dores';
		$idade = "52";
		$saldoContaBancaria = 9700.12;
		echo "<p> Nome do usuário = $nome <br>
		Sobrenome do usuário = $sobrenome <br>
		Idade do usuário = $idade anos <br>
		Saldo bancário = R$$saldoContaBancaria </p>";
		
		
		// diferença entre aspas e apóstrofos no comando ECHO
		
		echo '<p> Notar a diferença entre o uso de aspas e apóstrofos no comando ECHO do PHP: <br>
		Nome: $nome;<br>
		Idade: ', $idade, ' anos.</p>';
		
		// com aspas simples não há interpolação de variáveis
		// se for utilizá-la, precisa fechar antes da variál e separar string da variável por vírgula
		
		//exemplificando o uso de CONTANTES na linguagem PHP
		
		define("INVESTIDOR", "Mário de Almeida");
		define("QTDOLAR", 5000.12);
		define("EXTERIOR", true);
		define("TAXACAMBIO", 4.00);
		
		$valorEmReais = QTDOLAR * TAXACAMBIO;
		
		//fazendo o PHP devolver ao navegador o valor de uma constante
		
		echo "<p> Resultado do processamento com constantes em PHP: <br>
			Nome do Investidor: ", INVESTIDOR, "<br>
			O Investidor vai para o exterior? ", EXTERIOR ,"<br>
			Valor total convertido na transação: R$ $valorEmReais </p>";
		
		// Fazendo o PHP devolver par ao usuário muitas informações do servidor: phpinfo
		
		echo "<p> Informações trazidas do servidor: <br>";
		phpinfo();
		echo "</p>;"
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	?>
	
    
</body> 
</html> 