<?php

require_once __DIR__ . '/src/Facebook/autoload.php';


$appID      = "YOUR APP ID";        // APP ID
$appSecret  = "YOUR APP SECRET";    // APP SECRET
$my_url     = "YOUR APP DOMAIN";    // APP DOMAIN --> It has to be match with app domain on your facebook app
 

 $fb = new Facebook\Facebook([
  'app_id' => $appID,
  'app_secret' => $appSecret,
  'default_graph_version' => 'v2.4', // API GRAPH VERSION
  ]);


?>