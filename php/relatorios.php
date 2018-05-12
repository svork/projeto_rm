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

    <!-- Tabela para exibição dos dados -->
    <table id="agendamento">
      <tr>
        <th>Evento</th>
        <th>Nome</th>
        <th>Data</th>
      </tr>

        <?php

          # Chamando script para conectar ao banco de dados
          include 'banco.php';

          # Instancia da classe banco
          $banco = new Banco();

          # Abrir conexão com o banco de dados
          $banco -> conectar();

          # String com o comando SQL
          $sql = "select tipo_evento, nome, data from agendamento order by data";

          # Executar o comando SQL
          $banco -> buscar($sql);
        ?>

    </table>

    <!-- Rodapé -->
    <?php include '../html/rodape.html';?>

  </body>
</html>

<?php
  # Fechar conexão com o banco de dados
  $banco -> desconectar();
?>
