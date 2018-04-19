<?php
	# Este script faz a conexão com o banco de dados
	# Projeto RM 2018-ABR-02
	# Rodrigo Costa, Renan Souza e Thiago Leal

	class Banco {

    # Atributos
    public $conexao;

		# Esta função abre uma conexão com o banco de dados
		public function conectar() {
			try {
				# Objeto conexão da classe PDO
				$this -> conexao = new PDO("mysql:host=localhost; dbname=id5463586_projeto_rm", "id5463586_usuario", "usuario");

				# Ativando exceções de erro
				$this -> conexao -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}

			# Se algo der errado, mostre uma mensagem
			catch (PDOException $erro) {
				echo "Erro ao abrir a conexão com o banco de dados. Erro: " . $erro -> getMessage();
			}
		}

		# Esta função fecha uma conexão com o banco de dados
		public function desconectar() {
			try {
				$this -> conexao = null;
			}

			# Se algo der errado, mostre uma mensagem
			catch (PDOException $erro) {
				echo "Erro ao fechar a conexão com o banco de dados. Erro: " . $erro -> getMessage();
			}
		}

		# Esta função executa um comando SQL
		public function executar($comando){
			try {
				$this -> conexao -> exec($comando);  
			}

			# Se algo der errado, mostre uma mensagem
			catch (PDOException $erro) {
				echo "Erro ao comando SQL. Erro: " . $erro -> getMessage();
			}
		}
	}
?>
