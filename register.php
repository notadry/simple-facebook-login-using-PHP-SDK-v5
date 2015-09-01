<?php
session_start();

$fb_uid = $_SESSION['fb_id'] ;           
$fb_firstname = $_SESSION['firstname'];
$fb_lastname = $_SESSION['lastname'];
$fb_gender = $_SESSION['gender'];
$fb_email = $_SESSION['email'];

$birthday = $_POST['birthday'];
$address = $_POST['address'];


require 'dbconfig.php';


$check = mysql_query("select * from users where fb_id='$fb_uid'");

$check = mysql_num_rows($check);

if (empty($check)) { // if new user . Insert a new record

   $query = "INSERT INTO users (fb_id,fb_first_name,fb_last_name,fb_gender,fb_email,birthday,address) VALUES ('$fb_uid','$fb_firstname','$fb_lastname','$fb_gender','$fb_email',STR_TO_DATE('$birthday', '%m/%d/%Y'),'$address')";
   mysql_query($query);	

} else {   // If Returned user . update the user record	

   $query = "UPDATE users SET fb_id='$fb_uid', fb_first_name = '$fb_firstname', fb_last_name = '$fb_lastname', fb_gender = '$fb_gender', fb_email='$fb_email', birthday=STR_TO_DATE('$birthday', '%m/%d/%Y'), address='$address' where fb_id='$fb_uid'";
   mysql_query($query);

}



//if (!mysql_query($query,$conn)){
//    die('Error: ' . mysql_error());
//}

echo "<h2>Congratulation, you have been registered</h2>";
echo  "<br>";
echo  "redirecting...";

header('Refresh: 3; URL=index.php');
 
//mysql_close($conn);
?>
