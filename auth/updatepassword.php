<?php require_once(dirname(dirname(__FILE__)) . '/Database/database.php');?>

<?php

$Mismatchpass="";
$passwordchange="";



       if(isset($_POST['resetsubmit'])){
		$Newpassword=htmlspecialchars(md5($_POST['newpassword']));
		$retypepassword=htmlspecialchars(md5($_POST['confirmpassword']));
	     $receiveemail=htmlspecialchars($_GET['email']);
   
         if($Newpassword!=$retypepassword ||$Newpassword="" ||$retypepassword=""){
               $Mismatchpass =  "<p style=color:red;padding-top:10px;text-align:center>Passwords Mismatch!!</p>";
		 }
		 else
		 {
			$q="UPDATE users_role  SET password = '$Newpassword' WHERE email ='$receiveemail'";	
			mysqli_query($conn,$q);
			
			$passwordchange="<p style=color:green;padding-top:10px;text-align:center> password change succesfully</p>";
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
			<h1>Reset Password</h1>
				<div class="login__field">
					<input id="showhidepass" type="text"  name="newpassword" class="login__input" placeholder="New password">
					<a onclick="passwrd()"><i id="idfa" class="fa fa-eye"></i></a>
					
				</div>
				<div class="login__field">
					<input  id="retypepass" type="password" name="confirmpassword" class="login__input" placeholder="Confirm Password">
					<a onclick="retypepass()"><i class="fa fa-eye"></i></a></br>
					
				</div>
				<button class="button login__submit" name="resetsubmit"	>
					<span class="button__text">Submit</span>
				   </button>	
				   <?php echo $Mismatchpass ?>
				   <?php echo $passwordchange ?>

<script src="auth.js"></script>
<script src="../js/custom.js"></script>
</body>
</html>