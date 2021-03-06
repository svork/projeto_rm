<!doctype html>
<html lang="pt-br">
	<head>
		<!-- Título da página -->
		<title>RM Wedding - Portfólio</title>

		<!-- Permitir acentos e pontuações do Português -->
		<meta charset="UTF-8"/>

		<!-- Ajustar tamanho da tela para smartphones -->
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<!-- Autores da página -->
		<meta name="author" content="Rodrigo Costa, Renan Souza e Thiago Leal"/>

		<!-- Arquivo CSS com os estilos -->
		<link rel="stylesheet" href="../css/portfolio.css"/>

		<!-- Arquivo JavaScript com as funções -->
		<script src="../javascript/portfolio.js"></script>
	</head>
	<body>
		<!-- Cabeçalho -->
		<?php include '../html/cabecalho.html';?>

		<!-- Menu de Navegação -->
		<?php include '../html/menu.html';?>

		<!-- Título do Portfólio -->
		<h2>Portfólio</h2>

		<!-- Galeria de fotos pequenas -->
		<div class="linhas">
			<div class="foto_pequena">
				<img src="../images/foto_01.jpeg" alt="Foto 01" onclick="mostrar_foto(this);"/>
			</div>

			<div class="foto_pequena">
				<img src="../images/foto_02.jpeg" alt="Foto 02"  onclick="mostrar_foto(this);"/>
			</div>

			<div class="foto_pequena">
				<img src="../images/foto_03.jpeg" alt="Foto 03"  onclick="mostrar_foto(this);"/>
			</div>

			<div class="foto_pequena">
				<img src="../images/foto_04.jpeg" alt="Foto 04"  onclick="mostrar_foto(this);"/>
			</div>
		</div>

		<!-- Quebra de Página -->
		<hr/>

		<!-- Exibir foto grande -->
		<div class="container_foto_grande">
			<!-- Fechar a foto grande quando clicar no botão Fechar -->
			<span onclick="this.parentElement.style.display='none'" class="btn_fechar_foto">&times;</span> 

			<!-- Aqui será mostrada a foto grande -->
			<img id="foto_grande"/>

			<!-- Legenda para a foto -->
			<div id="legenda_foto"></div>
		</div>

		<!-- Quebra de Página -->
		<hr/>

		<!-- Rodapé -->
		<?php include '../html/rodape.html';?>

	</body>
</html>
