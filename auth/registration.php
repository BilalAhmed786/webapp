<?php require_once(dirname(dirname(__FILE__)) . '/Database/database.php');?>
<?php
$emailalready="";
$passwordmismatch="";
$submitedsucess="";
$submittedfailure="";
$emailerror="";
$usernameerr="";
$userpasserr="";
$userretypepasserr="";



if(isset($_POST['signup_submit'])){
$username=htmlspecialchars($_POST['username']);
  $email=htmlspecialchars($_POST['email']);
  $password=htmlspecialchars($_POST['password']);
  $password=htmlspecialchars(md5($password));
  $password2=htmlspecialchars($_POST['password2']);
  $password2=htmlspecialchars(md5($password2));
  $hidenvalue=htmlspecialchars($_POST['hiden']);

$sql = "SELECT * FROM users_role where email='$email'";
$result =mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

//Form validation

if($username ==""){
    $usernameerr= "<P style=color:red;padding-bottom:10px>Name is required</p>";
  }
if($email==""){
    $emailerror="<P style=color:red;padding-bottom:10px>email is required</p>";
  }
elseif($email==isset($row['email'])){
      
       
  $emailalready=  "<P style=color:red;padding-bottom:10px>email already exist!!</p>";
}
if($password =='d41d8cd98f00b204e9800998ecf8427e'){
  
  $userpasserr= "<P style=color:red;padding-bottom:10px>password is required</p>";
}

if($password2=='d41d8cd98f00b204e9800998ecf8427e'){
  $userretypepasserr="<P style=color:red;padding-bottom:10px>retype is required</p>";
}
 
 
if($password != $password2){
  $passwordmismatch=  "<P style=color:red;padding-bottom:10px>passwords Mismatch..</p>";
}
elseif($username !="" && $email!= isset($row['email'])){
  $sql= "INSERT INTO users_role (name, email,password,retypepass,role) 
  Values ('$username','$email', '$password', '$password2', '$hidenvalue')";
     if (mysqli_query($conn, $sql)&& ($username !="")) {
               $submitedsucess= "<P style=color:red;padding-top:10px>Registerd succesfully</p>";
      } else {
            $submittedfailure="<P style=color:red;padding-top:10px> some fields are missing</p>";
    }
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
</div>
<div id="login-box">
  <div class="left">
    <h1>Sign up</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <input type="text" name="username" placeholder="Username" />
    <?php echo $usernameerr?>
    <input type="text" name="email" placeholder="E-mail" />
       <?php echo $emailerror ?>
       <?php echo $emailalready ?>

    <input id="showhidepass" type="password" name="password" placeholder="Password" />
    <a onclick="passwrd()"><i id="idfa" class="fa fa-eye"></i></a></br>
    <?php echo $userpasserr ?>
    <input  id="retypepass" type="password" name="password2" placeholder="Retype password" />
    <a onclick="retypepass()"><i class="fa fa-eye"></i></a></br>
    <?php echo $userretypepasserr ?>
    <?php echo $passwordmismatch ?>
   <input  type="hidden" name="hiden" value="subscriber" />
    <input type="submit" name="signup_submit" value="Sign me up" />
    <?php echo $submitedsucess ?>
    <?php echo $submittedfailure ?>
    
</form>
</div>
</div>

 
<script src="auth.js"></script>
<script src="../js/custom.js"></script>
</body>
</html>
