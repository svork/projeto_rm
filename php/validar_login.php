<?php
  # Este script valida o login do usuário
  # Projeto RM 2018-MAI-11
  # Rodrigo Costa, Renan Souza e Thiago Leal

  # Chamando script para conectar ao banco de dados
  include 'banco.php';

  # Instancia da classe banco
  $banco = new Banco();

  # Abrir conexão com o banco de dados
  $banco -> conectar();

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

  # Validar cada informação antes de enviar para o banco
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = valida_dado($_POST['login']);
    $senha = valida_dado($_POST['senha']);
  }
  
  # String com o comando SQL
  $sql = "select usuario, senha from login";

  # Executar o comando SQL
  $banco -> executar($sql);

  # Exibir mensagem de sucesso
  echo "<script>alert('Login feito com sucesso')</script>";
  
  # Voltar para a página anterior
  echo "<script>history.back()</script>"; 

  # Fechar conexão com o banco de dados
  $banco -> desconectar();
?>
