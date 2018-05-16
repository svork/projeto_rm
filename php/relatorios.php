<!doctype html>
<html lang="pt-br">
	<head>
		<!-- Título da página -->
		<title>RM Wedding - Relatórios Ensaio</title>

		<!-- Permitir acentos e pontuações do Português -->
		<meta charset="UTF-8"/>

		<!-- Ajustar tamanho da tela para smartphones -->
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<!-- Autores da página -->
		<meta name="author" content="Rodrigo Costa, Renan Souza e Thiago Leal"/>

		<!-- Arquivo CSS com os estilos -->
		<link rel="stylesheet" href="../css/relatorios.css"/>

		<!-- Arquivo JavaScript com as funções -->
		<script src="../javascript/relatorios.js"></script>
	</head>
	<body>
		<!-- Cabeçalho -->
		<?php include '../html/cabecalho.html';?>
		
		<!-- Menu de Navegação -->
		<?php include '../html/menu.html';?>
		
		<!-- Descrição da Tabela -->
		<h2>Agendamentos</h2>
		<hr/>
		
		<form action="gerenciar_tabela.php" method="post">
			<!-- Tabela para exibição dos dados -->
			<table id="agendamento">
				<tr>
					<th></th>
					<th>Evento</th>
					<th>Nome</th>
					<th>Data</th>
					<th>Horário</th>
					<th>E-mail</th>
					<th>Telefone</th>
				</tr>

				<?php
					# Chamando script para conectar ao banco de dados
					include 'banco.php';
					
					# Instancia da classe banco
					$banco = new Banco();
					
					# Abrir conexão com o banco de dados
					$banco -> conectar();
					
					# String com o comando SQL
					$sql = "select * from agendamento order by data";
					
					# Executar o comando SQL
					$ret = $banco -> buscar($sql);
					
					# Guardar os resultados na variável resultado
					while ($resultado = $ret -> fetch(PDO::FETCH_ASSOC)) {
						$id = $resultado['id'];
						$evento = $resultado['tipo_evento'];
						$nome = $resultado['nome'];
						$data = $resultado['data'];
						$horario = $resultado['hora'];
						$email = $resultado['email'];
						$telefone = $resultado['telefone'];
						
						# Exibir os valores no formato de uma tabela
						echo "<tr> \n";
						echo '<td><input type="checkbox" name="linha[]" value="' . $id . '"></td>';
						echo "<td>$evento</td> \n";
						echo "<td>$nome</td> \n";
						echo "<td>$data</td> \n";
						echo "<td>$horario</td> \n";
						echo "<td>$email</td> \n";
						echo "<td>$telefone</td> \n";
						echo "</tr> \n";
					}
				?>
			</table>
			<br />
			<hr>
			<button id="btn_excluir" class="btn" type="submit">
				Excluir
			</button>
		</form>
		
		<!-- Rodapé -->
		<?php include '../html/rodape.html';?>
	</body>
</html>

<?php
	# Fechar conexão com o banco de dados
	$banco -> desconectar();
?>
