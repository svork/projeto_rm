<?php
	# Este script faz a conexão com o banco de dados
	# Projeto RM 2018-ABR-02
	# Rodrigo Costa, Renan Souza e Thiago Leal

	class Banco {
		# Atributos
		private $servidor = "localhost";
		private $banco = "projeto_rm";
		private $usuario = "root";
		private $senha = "root";
		private $conexao;

		# Esta função abre uma conexão com o banco de dados
		function conectar() {
			try {
				# Objeto conexão da classe PDO
				$conexao = new PDO("mysql:host=$servidor; dbname=$banco", $usuario, $senha);

				# Ativando exceções de erro
				$conexao -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}

			# Se algo der errado, mostre uma mensagem
			catch (PDOException $erro) {
				echo "Erro ao abrir a conexão com o banco de dados. Erro: " . $erro;
			}
		}

		# Esta função fecha uma conexão com o banco de dados
		function desconectar() {
			try {
				$conexao = null;
			}

			# Se algo der errado, mostre uma mensagem
			catch (PDOException $erro) {
				echo "Erro ao fechar a conexão com o banco de dados. Erro: " . $erro;
			}
		}

		# Esta função executa um comando SQL
		function executar($comando){
			try {
				$conexao -> exec($comando);  
			}

			# Se algo der errado, mostre uma mensagem
			catch (PDOException $erro) {
				echo "Erro ao comando SQL. Erro: " . $erro;
			}
		}
	}
?>
