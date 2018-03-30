<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Título da página -->
    <title>RM Wedding</title>

    <!-- Permitir acentos e pontuações do Português -->
    <meta charset="UTF-8"/>

    <!-- Ajustar tamanho da tela para smartphones -->
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- Autores da página -->
    <meta name="author" content="Rodrigo Costa, Renan Souza e Thiago Leal"/>
  
    <!-- Arquivo CSS com os estilos -->
    <link rel="stylesheet" href="../css/base_page.css"/>

    <!-- Arquivo JavaScript com as funções -->
    <script src="../javascript/base_page.js"></script>
  </head>
  <body>
    <!-- Cabeçalho -->
    <?php include '../html/cabecalho.html';?>

    <!-- Menu de Navegação -->
    <?php include '../html/menu.html';?>

    <!-- Imagem com o logo da RM Wedding  -->
    <img id="logo" src="../images/logo.jpeg" alt="Logo da RM Wedding" height="350" width="350" >

    <!-- Texto em Colunas -->
    <div class="colunas">
    	<a href="../php/portfolio.php"><h1>Portfólio</h1></a>
    	<p>Conheça um pouco de nossa história e nossos trabalhos.</p>

    	<a href="../php/agendar.php"><h1>Agendar Ensaio</h1></a>
    	<p>Reserve uma data para a melhor seção de sua vida.</p>

    	<a href="../php/sorteio.php"><h1>Sorteio</h1></a>
    	<p>Fique por dentro de nossos sorteios.</p>
    </div>

    <!-- Rodapé -->
    <?php include '../html/rodape.html';?>

  </body>
</html>
