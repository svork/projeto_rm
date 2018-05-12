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
				$this -> conexao = new PDO("mysql:host=localhost; dbname=projeto_rm", "root", "root");

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

    # Esta função faz uma busca no banco de dados
    public function buscar($comando){
      try {
        # Executar o comando recebido
        $stmt = $this -> conexao -> prepare($comando);
        $stmt -> execute();

        # Guardar os resultados na variável resultado
        while ($resultado = $stmt -> fetch(PDO::FETCH_ASSOC)) {;
          $evento = $resultado['tipo_evento'];
          $nome = $resultado['nome'];
          $data = $resultado['data'];

          # Exibir os valores no formato de uma tabela
          echo "<tr> \n";
          echo "<td>$evento</td> \n";
          echo "<td>$nome</td> \n";
          echo "<td>$data</td> \n";
          echo "</tr> \n";
        }

      }

			# Se algo der errado, mostre uma mensagem
			catch (PDOException $erro) {
				echo "Erro ao comando SQL. Erro: " . $erro -> getMessage();
      }
    }
	}
?>
