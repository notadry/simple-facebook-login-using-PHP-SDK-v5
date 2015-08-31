<?php

require_once __DIR__ . '/src/Facebook/autoload.php';


$appID   = "730641963707408";   // APP ID
$appSecret = "fbd47cf51700fff96bbbef30e8caa3bd";    // APP SECRET
$my_url ="http://localhost/fblogin";   // APP DOMAIN --> ini harus disetting di facebook app juga
 

 $fb = new Facebook\Facebook([
  'app_id' => $appID,
  'app_secret' => $appSecret,
  'default_graph_version' => 'v2.4',
  ]);


?>