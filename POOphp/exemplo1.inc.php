<?php
	//delcaração da classe ITEM

	class Item {
		// campos ou atributos da classe
		// atributos é  necessário colocar visibilidade
		public $nome, $valor, $categoria;
		// protected ou private

		//criação de construtor personalizado
		// o padrão existe default item()
		function __construct($nome, $valor, $categoria) {
			$this->nome = $nome; // sem o cifrão!
			$this->valor = $valor;
			$this->categoria = $categoria;
		}
		// implementar método que retorna a categoria (get)
		// não colocar a visibilidade é = PUBLICO
		function getCategoria() { 
			return $this->categoria;
		}
	}

?>