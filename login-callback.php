<?php
# login-callback.php

session_start();

include 'fbconfig.php';

$helper = $fb->getRedirectLoginHelper();
try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (isset($accessToken)) {
  // Logged in!
  $_SESSION['facebook_access_token'] = (string) $accessToken;
    
  // Now you can redirect to another page and use the
  // access token from $_SESSION['facebook_access_token']
    
    echo  "<h3>Logged in</h3>";
    echo  "<br>";
    echo  "please wait...";
    
    header('Refresh: 3; URL='. $my_url .'/welcome.php');
}
?>
