<?php
  # Este script faz a conexão com o banco de dados
  # Projeto RM 2018-ABR-02
  # Rodrigo Costa, Renan Souza e Thiago Leal

  # Variáveis
  $servidor = "localhost";
  $banco = "projeto_rm";
  $usuario = "root";
  $senha = "root";

  # Tentando abrir a conexão, usando o método PDO
  try {
    # Objeto conexão da classe PDO
    $conexao = new PDO("mysql:host=$servidor; dbname=$banco", $usuario, $senha);

    # Ativando exceções de erro
    $conexao -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    # String com o comando SQL
    $sql = "create database test";

    # Executar o comando SQL
    $conexao -> exec($sql);
    
    # Teste, se deu certo, exibir mensagem
    echo "Banco de Dados criado com sucesso";
  }

  # Se algo der errado, mostre uma mensagem
  catch (PDOException $erro) {
    echo "Erro ao abrir a conexão com o banco de dados.\nErro " . $erro;
  }
?>
