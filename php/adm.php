<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Título da página -->
    <title>RM Wedding - Administrativo</title>

    <!-- Permitir acentos e pontuações do Português -->
    <meta charset="UTF-8"/>

    <!-- Ajustar tamanho da tela para smartphones -->
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- Autores da página -->
    <meta name="author" content="Rodrigo Costa, Renan Souza e Thiago Leal"/>
  
    <!-- Arquivo CSS com os estilos -->
    <link rel="stylesheet" href="../css/adm.css"/>

    <!-- Arquivo JavaScript com as funções -->
    <script src="../javascript/adm.js"></script>
  </head>
  <body>
    <!-- Cabeçalho -->
    <?php include '../html/cabecalho.html';?>
	
	<br />
    <!-- Formulário para validar login -->
    <form action="validar_login.php" method="post">

      <div class="login">
        <!-- Login -->
        <label>Usuário</label> <br/>
        <input id="login" name="login" type="text" maxlength="50" required> <br/>

        <!-- Senha -->
		    <label>Senha</label> <br/>
		    <input id="senha" name="senha" type="password" maxlength="20" required><br/>
        <!-- Botão para enviar os dados para validar -->
		    <br /><input id="btn_validar" name="btn_validar" type="submit" value="Entrar">
		  </div>
    </form>

    <!-- Rodapé -->
    <?php include '../html/rodape.html';?>

  </body>
</html>
