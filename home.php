<?php
include('config.php');
include('session.php');

$userDetails=$userClass->userDetails($session_uid);

if(!$userDetails->email){
    header("Location: ./");exit();
}

$tag="";
if (isset($_GET['tag']))
    $tag=$_GET['tag'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Welcome <?php echo ucfirst($userDetails->name); ?> | Prenetics - HEALTH, REIMAGINED. Make smarter choices about your health, family and future.</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="jquery-1.11.0.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css"/>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="css/home.css" />
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
</head>

<body>
    
    <div class="logout_btn">
        <?php        
        include './drop_down_menu.php';
        ?>
        <a href="logout.php" class="btn btn-primary btn-large">Logout <i class="icon-white icon-check"></i></a>
    </div><br/>
    
    <div class="img_home_pos">
        <a href="home.php"><img src="images/Prenetics_logo.png" alt="Prenetics" /></a>
    </div>
		<div class="container_middle">		
			
			<div class="container_show_post">
                <?php
                    if($tag=="homepage" or $tag=="")
                        include("homepage.php");
                    elseif($tag=="update_entry")
                        include("update_entry.php");
                    elseif($tag=="view_entry")
                        include("view_entry.php");
                    elseif($tag=="show_report")
                        include("show_report.php");  
                    elseif($tag=="generate_json")
                        include("generate_json.php");        
                    
                ?>
		    </div>
		</div>                
	</div>
    
</body>
</html>
