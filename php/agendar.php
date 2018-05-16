<?php
	# Iniciando Sessão
	if (!session_id()) {
	session_start();
	}
	# Chamando arquivo de configuração
	require_once "../facebook_api/config.php";

	# Arquivo para verificar os dados recebidos do Facebook
	$redirectURL = 'https://localhost/projeto_rm/facebook_api/fb-callback.php';

	# Tipo de permissões que vou pedir ao usuário, emai, aniversário, páginas curtidas, fotos, etc
	#$permissions = ['birthday', 'age_range', 'email'];
	$permissions = ['email'];

	# Criando URL para direcionar para o Facebook
	$loginUrl = $helper->getLoginUrl($redirectURL, $permissions);
	?>
	<!doctype html>
	<html lang="pt-br">
		<head>
		<!-- Título da página -->
		<title>RM Wedding - Agendar Ensaio</title>

		<!-- Permitir acentos e pontuações do Português -->
		<meta charset="UTF-8"/>

		<!-- Ajustar tamanho da tela para smartphones -->
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<!-- Autores da página -->
		<meta name="author" content="Rodrigo Costa, Renan Souza e Thiago Leal"/>

		<!-- Arquivo CSS com os estilos -->
		<link rel="stylesheet" href="../css/agendar.css"/>

		<!-- Arquivo JavaScript com as funções -->
		<script src="../javascript/agendar.js"></script>
	</head>
	<body>
		<!-- Cabeçalho -->
		<?php include '../html/cabecalho.html';?>

		<!-- Menu de Navegação -->
		<?php include '../html/menu.html';?>

		<!-- Imagem com o logo da RM Wedding  -->
		<img id="logo" src="../images/logo.jpeg" alt="Logo da RM Wedding" height="350" width="350" >

		<!-- Form para Agendar Ensaio -->	
		<form action="agendar_ensaio.php" method="post">
			<table class="table" align="center">
				<tr>
					<td>
						<fieldset class="line">
							<!-- Seleção do tipo de evento desejado, New Born, 15 Anos ou Casamento -->
							<label for="tipo_evento">Escolha o tipo de Evento</label> <br/>
							<input id="rdo_ensaio" class="clique" name="tipo_evento" type="radio" value="ensaio" required>Ensaio Casal <br/>
							<input id="rdo_casamento" class="clique" name="tipo_evento" type="radio" value="casamento" required>Casamento <br/>
						</fieldset>
					</td>
					<td>
						<fieldset class="line">
							<!-- Escolha da data e hora do evento -->
							<div>
								<label for="data_evento">Escolha uma data</label> <br/>
								<input id="data_evento" name="data_evento" type="date" required> <br/>
							</div>
							<div>
								<label for="hora_evento">Horas:</label><br/>
								<input id="hora_evento" name="hora_evento" type="number" size="20" min="00" max="23" required>
							</div>
							<div>
								<label for="minuto_evento">Minutos: </label><br/>
								<input id="minuto_evento" name="minuto_evento" type="number" size="20" min="00" max="59" required> <br/>
							</div>
							<!-- Local do Evento -->
							<div>
								<label for="local_evento">Escolha um local</label> <br/>
								<input id="local_evento" name="local_evento" type="text" maxlength="300" placeholder="Endereço" required> <br/>
							</div>
						</fieldset>
					</td>
					<td>			
						<fieldset class="line">
							<!-- Nome e email do cliente -->
							<div>
								<label for="nome_completo">Nome Completo</label> <br/>
								<input id="nome_completo" name="nome_completo" type="text" maxlength="50" placeholder="Digite seu nome completo" required> <br/>
							</div>
							<div>
								<label for="email_cliente">Email</label> <br/>
								<input id="email_cliente" name="email_cliente" type="email" maxlength="50" placeholder="Digite seu email" required><br/>
								
								<!-- Telefone -->
								<label for="telefone">Celular</label> <br/>
								<input id="telefone" name="telefone" type="text" maxlength="50" placeholder="Digite seu Telefone" required><br/>
								
								<!-- Botão Enviar Email -->
								<button class="btn" id="btn_email" type="submit" value="Enviar Email">
									Enviar e-mail
								</button>
								
								<!-- Botão Conectar ao Facebook -->
								<hr/>
								<br/>
								<button class="btn" id="btn_facebook" type="button" onclick="window.location = '<?php echo $loginUrl; ?>'">
									<img src="../images/facebook.png" width="20" />
									Entrar com Facebook
								</button>
							</div>
						</fieldset>
					</td>
				</tr>
			</table>
		</form>

		<!-- Rodapé -->
		<?php include '../html/rodape.html';?>
	</body>
</html>
