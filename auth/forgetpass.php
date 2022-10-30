<?php require_once(dirname(dirname(__FILE__)) . '/Database/database.php');?>

<?php
$invalidemail="";
$emailsent="";


      if(isset($_POST['loginsubmit'])){

            $passreset  =htmlspecialchars($_POST['emailset']);

            
$q= "SELECT * FROM users_role where email = '$passreset'";
          $result=mysqli_query($conn,$q);
          $emailresult=mysqli_fetch_assoc($result);
          $row= mysqli_num_rows($result);

         if($row){
            $toEmail=$emailresult['email'];
          $Message="To reset password use the link below";
          echo '<a  href = "http://localhost/webapp/auth/updatepassword.php?email='.$toEmail.'" target="_blank"  style= text-decoration:none;color:red; >Reset password</a>';
         $siteName="webApp";
            $headers="Name:".$siteName. PHP_EOL 
            . "Email:".$toEmail . PHP_EOL 
            . "Message:".$Message;
               mail($toEmail,$username,$headers);
            $emailsent="<P style=color:Green;padding-top:10px> For update password link has been sent to your registerd email</P>";
            }else
            {
         $invalidemail  = "<P style=color:red;padding-top:10px>Invalid email please verify your email address)</P>";
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
					<input id="emailsubmit" type="text"  name="emailset"  placeholder="Email">
				</div>
		<button class="button login__submit" name="loginsubmit"	>
					<span class="button__text">Submit</span>
      </button>	
      <?php echo $invalidemail ?>
      <?php echo $emailsent ?>
<script src="auth.js"></script>
<script src="../js/custom.js"></script>
</body>
</html>