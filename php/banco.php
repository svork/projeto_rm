<?php
	# Este script faz a conexão com o banco de dados
	# Projeto RM 2018-ABR-02
	# Rodrigo Costa, Renan Souza e Thiago Leal

	class Banco {

		# Atributos
		private $conexao;
			
		# Esta função abre uma conexão com o banco de dados
		public function conectar() {
			# Objeto conexão da classe PDO
			$this -> conexao = new PDO("mysql:host=localhost; dbname=projeto_rm", "root", "");

			# Ativando exceções de erro
			$this -> conexao -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		
		# Esta função fecha uma conexão com o banco de dados
		public function desconectar() {
			$this -> conexao = null;
		}
		
		# Esta função executa um comando SQL
		public function executar($comando){
			if($this -> conexao != null){
				return $this -> conexao -> exec($comando);
			}
			throw new PDOException("Banco desconectado", 0);
		}
		
		# Esta função executa um comando SQL
		public function selecionar($comando){
			if($this -> conexao != null){
				return $this -> conexao -> query($comando);
			}
			throw new PDOException("Banco desconectado", 0);
		}
		
		# Esta função faz uma busca no banco de dados
		public function buscar($comando){
			if($this -> conexao != null){
				$stmt = $this -> conexao -> prepare($comando);
				$stmt -> execute();
				return $stmt;
			}
		}
	}
?>
