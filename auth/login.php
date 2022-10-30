<?php require_once(dirname(dirname(__FILE__)) . '/Database/database.php');?>
<?php
$loginerror="";
$passworderr="";
$loginfailure="";
$loginsuccess="";
$requiredfields="";

if(isset($_POST['loginsubmit'])){
    $loginemail =htmlspecialchars($_POST['email']);
	$loginpass= htmlspecialchars($_POST['password']);
	$loginpass=htmlspecialchars(md5($loginpass));

	$q="SELECT * from users_role where email='$loginemail' and password = '$loginpass'";
	$result= mysqli_query($conn,$q);
    $loginresult=mysqli_fetch_assoc($result);

	if($loginemail==""){
	$loginerror="<p style=color:red;text-align:center> email is required </p>";
	}
	if($loginpass=='d41d8cd98f00b204e9800998ecf8427e'){
	$passworderr="<p style=color:red;text-align:center> password is required </p>";
	}
	if($loginemail=="" || $loginpass=='d41d8cd98f00b204e9800998ecf8427e' ){
		$requiredfields="<p style=color:red;text-align:center;padding-top:10px> Required fields are missing.. </p>";
		}
elseif(isset($loginresult['email'] )!= $loginemail && isset($loginresult['password']) != $loginpass){
	$loginfailure= "<p style=color:red;text-align:center;padding-top:10px>invalid email or password</P>";
}elseif($loginresult['role']!='admin'){
	header("Location: http://localhost/webapp");
}else{
	header("Location: http://localhost/webapp/auth/registration.php");
}
}
	
?>

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
			<form class="login" action="" method="POST">
			<h1>Sign In</h1>
				<div class="login__field">
					<input type="text"  name="email" class="login__input" placeholder="Email">
					<span class="text-danger"><?php echo $loginerror ?></span>
				</div>
				<div class="login__field">
					<input  id="showhidepass" type="password" name="password" class="login__input" placeholder="Password">
					<a onclick="passwrd()"><i id="idfa" class="fa fa-eye"></i></a>
					<span class="text-danger"><?php echo $passworderr ?></span>
				</div>
				<button class="button login__submit" name="loginsubmit">
					<span class="button__text">Log In Now</span>
				   </button>	
				    <?php echo $loginfailure ?>
					<?php echo $loginsuccess?>
					<?php echo $requiredfields?>
					
				</br>
				<a href="http://localhost/webapp/auth/forgetpass.php" class="button login__submit">
					Forget password
                  </a>			
			</form>
			</div>
           </div>
         </div>

<script src="auth.js"></script>
<script src="../js/custom.js"></script>
</body>
</html>