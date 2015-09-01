<?php
include 'fbconfig.php';

session_start();
session_unset();

    $fb_access_token = NULL;
    $_SESSION['fb_id'] = NULL;

header('Refresh: 3; URL='. $my_url .'/index.php');

    echo  "<h3>LOGGED OUT</h3>";
    echo  "<br>";
    echo  "please wait...";
?>
