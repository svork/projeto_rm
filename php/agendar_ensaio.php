<?php
  # Este script recebe os dados que o usuário digitar na tela de Agendar
  # Projeto RM 2018-ABR-03
  # Rodrigo Costa, Renan Souza e Thiago Leal

  # Chamando script para conectar ao banco de dados
  include ("banco.php");

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

  # Esta função exibe os dados que foram submetidos via formulário
  function inserir_dados() {

    # Validar cada informação antes de enviar para o banco
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      $nome = valida_dado($_POST['nome_completo']);
      $email = valida_dado($_POST['email_cliente']);
      $tipo = valida_dado($_POST['tipo_evento']);
    }

    # String com o comando SQL
    $sql = "insert into agendamento () values ()";

    # Executar o comando SQL
    try {
      $conexao -> exec($sql);
    }

    # Se algo, der errado, exibir mensagem de erro
    catch (PDOException $erro) {
      echo "alert("Erro ao criar o agendamento!")";
    }
  }
?>
