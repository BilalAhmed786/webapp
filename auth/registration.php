<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="auth.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>

<div class="topbar">
<?php require_once(dirname(dirname(__FILE__)) . '/inc/topbar.php');?>
</div>
<div class="header">
<header>

<?php require_once(dirname(dirname(__FILE__)) . '/inc/header.php');?>

</header>
</div>
<div id="login-box">
  <div class="left">
    
    <h1>Sign up</h1>
    <input type="text" name="username" placeholder="Username" />
    <input type="text" name="email" placeholder="E-mail" />
    <input id="showhidepass" type="password" name="password" placeholder="Password" />
    <a onclick="passwrd()"><i id="idfa" class="fa fa-eye"></i></a>
    <input  id="retypepass" type="password" name="password2" placeholder="Retype password" />
    <a onclick="retypepass()"><i class="fa fa-eye"></i></a></br>
    
    <input type="submit" name="signup_submit" value="Sign me up" />
  </div>
</div>
 
<script src="auth.js"></script>
<script src="../js/custom.js"></script>
</body>
</html>