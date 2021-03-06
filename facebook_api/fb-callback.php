<?php
  # Este script tem a função de validar as informações que o Facebook enviar de volta
  # Projeto RM 2018-ABR-21
  # Rodrigo Costa, Renan Souza e Thiago Leal

  # Chamando arquivo de configuração
  require_once "../facebook_api/config.php";

  try {
    # Receber token de acesso
    $accessToken = $helper->getAccessToken();

    # Permissões necessárias
    $permissoes = '/me?fields=id,name,birthday,age_range,email';

    # Recebendo informações do perfil do usuário
    $response = $fb->get($permissoes, $accessToken);
  }
  catch (Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
  }
  catch (Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
  }

  if (! isset($accessToken)) {
    if ($helper->getError()) {
      header('HTTP/1.0 401 Unauthorized');
      echo "Error: " . $helper->getError() . "\n";
      echo "Error Code: " . $helper->getErrorCode() . "\n";
      echo "Error Reason: " . $helper->getErrorReason() . "\n";
      echo "Error Description: " . $helper->getErrorDescription() . "\n";
    } 
    else {
      header('HTTP/1.0 400 Bad Request');
      echo 'Bad request';
    }
    exit;
}

  # Receber todos os detalhes do usuário
  $user = $response->getGraphUser();

  # ---------------------------------------------------------------------------
  # Exibir o nome do usuário e seu Facebook ID, apenas para POC (Proof of concept)
  echo "<h1>Informações do Usuário: " . $user['name'] . "</h1>";

  # Quebra de linha
  echo "<hr/>";

  echo '<h3>ID: ' . $user['id'] . '</h3>';
  echo '<h3>Nome: ' . $user['name'] . '</h3>';
  #echo '<h3>Aniversário: ' . $user['birthday'] . '</h3>';
  echo '<h3>Idade: ' . $user['age_range'] . '</h3>';
  echo '<h3>Email: ' . $user['email'] . '</h3>';

  # Quebra de linha
  echo "<hr/>";

  # ---------------------------------------------------------------------------

  // Logged in
  # echo '<h6>Access Token</h6>';
  # var_dump($accessToken->getValue());

  // The OAuth 2.0 client handler helps us manage access tokens
  $oAuth2Client = $fb->getOAuth2Client();

  // Get the access token metadata from /debug_token
  $tokenMetadata = $oAuth2Client->debugToken($accessToken);
  # echo '<h6>Metadata</h6>';
  # var_dump($tokenMetadata);

  // Validation (these will throw FacebookSDKException's when they fail)
  $tokenMetadata->validateAppId('177154966272473'); // Replace {app-id} with your app id
  // If you know the user ID this access token belongs to, you can validate it here
  //$tokenMetadata->validateUserId('123');
  $tokenMetadata->validateExpiration();

  if (! $accessToken->isLongLived()) {
    // Exchanges a short-lived access token for a long-lived one
    try {
      $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
    }
    catch (Facebook\Exceptions\FacebookSDKException $e) {
      echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
      exit;
    }

    echo '<h3>Long-lived</h3>';
    var_dump($accessToken->getValue());
  }

  $_SESSION['fb_access_token'] = (string) $accessToken;

  // User is logged in with a long-lived access token.
  // You can redirect them to a members-only page.
  //header('Location: https://example.com/members.php');
?>
