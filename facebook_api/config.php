<?php
  # Este script tem as configurações para conectar ao Facebook
  # Projeto RM 2018-ABR-21
  # Rodrigo Costa, Renan Souza e Thiago Leal

  # Chamando biblioteca Facebook
  require_once '../facebook_api/vendor/autoload.php';

  # Instanciando objeto fb da Classe Facebook
  $fb = new Facebook\Facebook([
  'app_id' => '177154966272473', # App ID do Projeto RM
  'app_secret' => '5cfdf488b89d2d64f16fd611df0f11a4', # App Secret do Projeto RM
  'default_graph_version' => 'v2.12', # Versão da API
  ]);

  # Objeto que contém todos os métodos necessários
  $helper = $fb -> getRedirectLoginHelper();

  # Verificar se ja existe uma sessão aberta
  if (isset($_GET['state'])) {
    $helper->getPersistentDataHandler()->set('state', $_GET['state']);
  }
?>
