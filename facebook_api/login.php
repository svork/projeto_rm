<?php
  # Este script tem a função de conectar ao Facebook
  # Projeto RM 2018-ABR-21
  # Rodrigo Costa, Renan Souza e Thiago Leal

  # Iniciando Sessão
  session_start();

  # Chamando biblioteca Facebook
  require_once __DIR__.'/vendor/autoload.php';

  # Instanciando objeto fb da Classe Facebook
  $fb = new Facebook\Facebook([
  'app_id' => '177154966272473', // App ID do Projeto RM
  'app_secret' => '5cfdf488b89d2d64f16fd611df0f11a4', // App Secret do Projeto RM
  'default_graph_version' => 'v2.5',
  ]);

  $helper = $fb -> getRedirectLoginHelper();

  $permissions = ['email']; // Optional permissions

  $loginUrl = $helper->getLoginUrl('https://rmcasamentos.000webhostapp.com/projeto_rm-master/facebook_api/fb-callback.php', $permissions);

  echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
?>
