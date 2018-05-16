<?php
	# Este script valida o login do usuário
	# Projeto RM 2018-MAI-11
	# Rodrigo Costa, Renan Souza e Thiago Leal

	# Chamando script para conectar ao banco de dados
	include 'banco.php';

	# Esta função valida os dados que foram digitados
	function valida_dado($dado) {
		# Remover espaços e tabs
		$dado = trim($dado);

		# Remover barras
		$dado = stripslashes($dado);

		# Remover tags HTML
		$dado = htmlspecialchars($dado);

		# Retornar dado limpo
		return $dado;
	}
	
	function voltar(){
		# Voltar para a página anterior
		echo "<script>history.back()</script>";
	}
	
	$login = '';
	$senha = '';
	
	# Validar cada informação antes de enviar para o banco
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$login = valida_dado($_POST['login']);
		$senha = $_POST['senha'];
	}
	
	# String com o comando SQL
	$sql = "SELECT * FROM login WHERE usuario = '$login' and senha = '$senha';";
	
	# Instancia da classe banco
	$banco = new Banco();
	
	try{
		
		# Abrir conexão com o banco de dados
		$banco -> conectar();
		
		# Executar o comando SQL
		if($banco -> selecionar($sql) -> rowCount() == 0){
			echo "<script>alert('Usuário ou senha incorretos');</script>";
			voltar();
			return false;
		}
		
		# Exibir mensagem de sucesso
		echo "<script>alert('Login feito com sucesso')</script>";
		header("Location: relatorios.php");
	}
	catch(PDOException $e){
		echo "Erro no banco de dados: " . $e -> getMessage();
		voltar();
	}
	catch(Exception $e){
		echo "Erro inesperado: " . $e -> getMessage();
		voltar();
	}
	finally{
		# Fechar conexão com o banco de dados
		$banco -> desconectar();
	}
?>
