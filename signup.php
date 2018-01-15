<?php 
include("config.php");
include('class/userClass.php');
$userClass = new userClass();

$errorMsgReg='';

if (!empty($_POST['signupSubmit'])) {

	$username=$_POST['usernameReg'];
	$email=$_POST['emailReg'];
	$password=$_POST['passwordReg'];
    $name=$_POST['nameReg'];
    $gender=$_POST['gender'];
	$username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
	$email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
    $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);
    $apiGenerator = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 8);

    mkdir('api/'.$apiGenerator);

	if($username_check && $email_check && $password_check && strlen(trim($name))>0 && $gender != '') {
        $uid=$userClass->userRegistration($username,$password,$email,$name,$gender, $apiGenerator);
        if($uid)  {
            $url=BASE_URL.'home.php';
            header("Location: $url");
        } else {
            $errorMsgReg="Username or Email already exits.";
        }
	}else{
        $errorMsgReg="Username and password is not valid, please try new one.";
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
<link rel="stylesheet" type="text/css" href="css/signup.css" />
<title>Prenetics - HEALTH, REIMAGINED. Make smarter choices about your health, family and future.</title>
</head>

<body>

    <div class="signup-logo">
        <img src="images/Prenetics_logo.png" alt="Prenetics" />
        </div>
        <br/><br/>

        <div class="h1_pos">
        <span>Genetics: A Conceptual Approach - Register Today! </span>
        <br/><br/>
    </div>

    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">

            <div class="input-group">
                <div id="signup">
                    <form method="post" action="" name="signup">
                        <label>Name</label>
                        <input class="form-control" type="text" name="nameReg" autocomplete="off" /><br/><br/>
                        <br/><br/>
                        <label>Email</label>
                        <input class="form-control" type="text" name="emailReg" autocomplete="off" /><br/><br/>
                        <br/><br/>
                        <label>Username</label>
                        <input class="form-control" type="text" name="usernameReg" autocomplete="off" /><br/><br/>
                        <br/><br/>
                        <label>Gender</label>
					    <input type="radio" name="gender" value="Male" /> <span class="p_font">&nbsp;Male</span>
					    <input type="radio" name="gender" value="Female" /> <span class="p_font">&nbsp;Female</span>
                        <br/><br/>
                        <label>Password</label>
                        <input class="form-control" type="password" name="passwordReg" autocomplete="off"/><br/>
                        <div class="errorMsg"><?php echo $errorMsgReg; ?></div><br/><br/>
                        <br/><br/>
                        <input class="form-control signup-button" type="submit" name="signupSubmit" value="Signup"><br/>
                    </form>
                    </div>
                <br/><br/>
                <div>
                    <h5>Already have an account? <a href="index.php">Sign in</a> today!</h5>
                </div>
            </div>
        </div>
    </div>  
</body>
</html>
