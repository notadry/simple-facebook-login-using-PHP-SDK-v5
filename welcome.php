<?php
session_start();

$fb_access_token = $_SESSION['facebook_access_token'];

include 'fbconfig.php';

try {
  // Returns a `Facebook\FacebookResponse` object
  // [PENTING NIH..!!] Kalo mau ngambil user information harus disetting di fields
    
  $response = $fb->get('/me?fields=id,name,first_name,last_name,email,gender', $fb_access_token);
    
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

// Get the response typed as a GraphUser
$user = $response->getGraphUser();

// get user info berdasarkan fields yang sudah disetting
$fb_id = $user->getId();
$fullname = $user->getName();
$firstname = $user->getFirstName();
$lastname = $user->getLastName();
$email = $user->getEmail();
$gender = $user->getGender();

// SET SESSION
$_SESSION['fb_id'] = $fb_id;           
$_SESSION['firstname'] = $firstname;
$_SESSION['lastname'] =  $lastname;
$_SESSION['gender'] = $gender;
$_SESSION['email'] = $email;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome, <?php echo $firstname ?></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"> 
</head>
<body>
    
</body>
</html>

<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h1>Hello, <?php echo $fullname ?> ..!!! </h1>
            </div>
        </div>
    </div>
</header>

<div style="height: 2em;"></div>

<div class="container-fluid">
    <div class="row">
       <div class="col-sm-1 foto-profil">
           <img src="https://graph.facebook.com/<?php echo $fb_id ?>/picture" alt="<?php echo $fullname ?>">
       </div>
       <div class="col-sm-4">
           <p>FB ID : <?php echo $fb_id ?></p>
       </div>
    </div>
   
   <div style="height: 2em;"></div>
   
        <form action="register.php" method="post" class="form-horizontal">
            <div class="form-group">
                <label for="first_name" class="col-sm-1 control-label">First Name</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" value="<?php echo $firstname ?>" disabled>
                </div>
            </div>
            
            <div class="form-group">
                <label for="last_name" class="col-sm-1 control-label">Last Name</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" value="<?php echo $lastname ?>" disabled>
                </div>
            </div>
            
            <div class="form-group">
                <label for="last_name" class="col-sm-1 control-label">Email</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" value="<?php echo $email ?>">
                </div>
            </div>
            
            <div class="form-group">
                <label for="last_name" class="col-sm-1 control-label">Gender</label>
                <div class="col-sm-4">
                   <?php
                        if ($gender == 'male') {
                            echo "
                            
                                 <div class=\"radio disabled\">
                                    <label for=\"Male\"> <input type=\"radio\" name=\"gender-option\" value=\"Male\" checked> Male</label>
                                </div>
                                <div class=\"radio disabled\">
                                    <label for=\"Female\"><input type=\"radio\" name=\"gender-option\" value=\"Female\"> Female</label>
                                </div>
                                
                            ";
                        } else {
                            echo "
                            
                                 <div class=\"radio disabled\">
                                    <label for=\"Male\"> <input type=\"radio\" name=\"gender-option\" value=\"Male\"> Male</label>
                                </div>
                                <div class=\"radio disabled\">
                                    <label for=\"Female\"><input type=\"radio\" name=\"gender-option\" value=\"Female\" checked> Female</label>
                                </div>
                            
                            ";

                        }
                    ?>
                </div>
            </div>
            
            <div class="form-group">
                <label for="last_name" class="col-sm-1 control-label">Birthday</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="birthday" value="" placeholder="DD/MM/YYYY">
                </div>
            </div>
            
            <div class="form-group">
                <label for="last_name" class="col-sm-1 control-label">Address</label>
                <div class="col-sm-4">
                    <textarea cols="30" rows="10" class="form-control" name="address"></textarea>
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-5">
                        <input type="submit" value="Register" class="btn btn-lg btn-default pull-right"/>
                    </div>
                    <div class="col-sm-7">
                        <a href="<?php echo $my_url ?>/logout.php" class="btn btn-default btn-lg pull-right">LOG OUT</a>
                    </div>
                </div>
            </div>
            
        </form>
</div>

<div style="height: 2em;"></div>

