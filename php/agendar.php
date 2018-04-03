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
					<label>Escolha o tipo de Evento</label> <br/>
					<input id="rdo_new_born" class="clique" name="tipo_evento" type="radio" value="new_born" required>New Born <br/>
					<input id="rdo_15_anos" class="clique" name="tipo_evento" type="radio" value="quinze_anos" required>15 Anos <br/>
					<input id="rdo_casamento" class="clique" name="tipo_evento" type="radio" value="casamento" required>Casamento <br/>
				</fieldset>
			</td>
			<td>
				<fieldset class="line">
					<!-- Escolha da data do evento -->
					<label>Escolha uma data</label> <br/>
					<input id="data_evento" name="data_evento" type="date" required>
				</fieldset>
			</td>
			<td>			
				<fieldset class="line">
					<!-- Nome e email do cliente -->
					<div>
						<label>Nome Completo</label> <br/>
						<input id="nome_completo" name="nome_completo" type="text" maxlength="50" placeholder="Digite seu nome completo" required> <br/>
					</div>
					<div>
						<label>Email</label> <br/>
						<input id="email_cliente" name="email_cliente" type="email" maxlength="50" placeholder="Digite seu email" required><br/>

            <!-- Botão Enviar Email -->
						<button id="btn_email" class="clique" type="button" onclick="enviar_email()">Enviar email</button><br/>

						<!-- Botão Conectar ao Facebook -->
						<span style="font: 2em bold Serif;"><hr/>ou</span><br/>
						<button id="btn_facebook" class="clique" type="button" onclick="conectar_facebook()"><img src="../images/facebook.png" width="20" /> Entrar com Facebook</button>

            <!-- Botão Agendar -->
            <input type="submit" value="Confirmar">
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
