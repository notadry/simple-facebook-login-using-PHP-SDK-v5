<?php
# login.php

session_start();

include 'fbconfig.php';

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl($my_url.'/login-callback.php', $permissions);

if ($_SESSION['fb_id']) {
    header("Location:".$my_url."/welcome.php");
} else {
    echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
}

?>
