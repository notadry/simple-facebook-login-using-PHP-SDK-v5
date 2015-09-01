<?php
    define('DB_SERVER', 'DB SERVER');       // DB server
    define('DB_USERNAME', 'DB USERNAME');   // DB username
    define('DB_PASSWORD', 'DB PASSWORD');   // DB password
    define('DB_DATABASE', 'DB NAME');       // DB name

    $conn = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die( "Unable to connect");
    $database = mysql_select_db(DB_DATABASE) or die( "Unable to select database");
?>
