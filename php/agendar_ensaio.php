<?php
	# Este script recebe os dados que o usuário digitar na tela de Agendar
	# Projeto RM 2018-ABR-03
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
	
	$nome = '';
	$telefone = '';
	$email = '';
	$hora_evento = '';
	$data_evento = '';
	$tipo_evento = '';
	$local_evento = '';
	
	# Validar cada informação antes de enviar para o banco
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$nome = valida_dado($_POST['nome_completo']);
		$telefone = valida_dado($_POST['telefone']);
		$email = valida_dado($_POST['email_cliente']);
		$hora_evento = valida_dado($_POST['hora_evento']);
		$data_evento = valida_dado($_POST['data_evento']);
		$tipo_evento = valida_dado($_POST['tipo_evento']);
		$local_evento = valida_dado($_POST['local_evento']);
	}

	# Concatenar variavel mensagem
	$mensagem = "Foi agendado o evento: ";
	$mensagem .= $tipo_evento;
	$mensagem .= ";\n No dia: ";
	$mensagem .= $data_evento;
	$mensagem .= " as ";
	$mensagem .= $hora_evento;
	$mensagem .= " no local ";
	$mensagem .= $local_evento;
	
	try{
		# Instancia da classe banco
		$banco = new Banco();
		
		# Abrir conexão com o banco de dados
		$banco -> conectar();
		
		# String com o comando SQL
		$sql = "insert into agendamento (nome, telefone, email, hora, data, tipo_evento, local_evento) values ('$nome', '$telefone', '$email', '$hora_evento', '$data_evento', '$tipo_evento', '$local_evento')";
		
		# Executar o comando SQL
		$banco -> executar($sql);
		
		# Envia um e-mail com a hora do evento
		mail($email, 'Agendamento de ' . $tipo_evento , $mensagem, $nome);
		
		# Voltar para a página anterior
		echo "<script>history.back()</script>";
		
		# Exibir mensagem falando que um email será enviado
		echo 'Dentro de alguns instantes um email será enviado';
		
		# Exibir mensagem de sucesso
		echo "<script>alert('Agendamento feito com sucesso')</script>";
	}
	catch(PDOException $e){
		echo "<script>alert('Erro no banco de dados: " . $e -> getMessage() . "');</script>";
	}
	catch(Exception $e){
		echo "<script>alert('Erro inesperado: " . $e -> getMessage() . "');</script>";
	}
	finally{
		# Fechar conexão com o banco de dados
		$banco -> desconectar();
	}
?>
