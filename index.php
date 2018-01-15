<?php 
include("config.php");
include('class/userClass.php');
$userClass = new userClass();

$errorMsgReg='';
$errorMsgLogin='';
if (!empty($_POST['loginSubmit'])) 
{
$usernameEmail=$_POST['usernameEmail'];
$password=$_POST['password'];
 if(strlen(trim($usernameEmail))>1 && strlen(trim($password))>1 )
   {
    $uid=$userClass->userLogin($usernameEmail,$password);
    if($uid)
    {
        $url=BASE_URL.'home.php';
        header("Location: $url");
    }
    else
    {
        $errorMsgLogin="Username and password did not matched, please check your login details.";
    }
   }
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css.map"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css.map"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css"/>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/login.css" />
<title>Prenetics - HEALTH, REIMAGINED. Make smarter choices about your health, family and future.</title>
</head>

<body>
	<div class="container">
    	<div class="container2">
    		<div class="h1_pos">
    			<h1>Genetics: A Conceptual Approach - Login Today! </h1>
    		</div><br/><br/><br/>
    		<form autocomplete="off" method="post" action="" name="login">
                <label>Username or Email</label>
                <input class="form-control" type="text" name="usernameEmail" autocomplete="off" />
                <br/>
                <label>Password</label>
                <input class="form-control" type="password" name="password" autocomplete="off"/>
                <br/>
                <div class="errorMsg"><?php echo $errorMsgLogin; ?></div>
                <input class="form-control login-button" type="submit" name="loginSubmit" value="Login">
            </form>
            <br/><br/>
            <div>
                <h5>Don't have account yet? <a href="signup.php">Sign up</a> today!</h5>
            </div>
    	</div>
    </div>  
</body>
</html>
