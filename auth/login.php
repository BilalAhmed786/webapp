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

<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form class="login" action="forgetpass.php" method="POST">
			<h1>Sign In</h1>
				<div class="login__field">
					<input type="text" class="login__input" placeholder="User name / Email">
				</div>
				<div class="login__field">
					<input  id="showhidepass" type="password" class="login__input" placeholder="Password">
					<a onclick="passwrd()"><i id="idfa" class="fa fa-eye"></i></a>
				</div>
				<button class="button login__submit">
					<span class="button__text">Log In Now</span>
				</button>	</br>
				<button href="http://localhost/webapp/auth/forgetpass.php" class="button login__submit">
					<span class="button__text">Forget password</span>
				</button>			
			</form>
			</div>
           </div>
         </div>

<script src="auth.js"></script>
<script src="../js/custom.js"></script>
</body>
</html>