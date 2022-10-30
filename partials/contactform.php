<?php require_once(dirname(dirname(__FILE__)) . '/Database/database.php');?>
<?php
$name_error="";
$email_error= "";
$phone_error= "";
$submit_formfail="";
$submit_formsucc="";
$emailsent="";
$email_notsent="";

if (isset($_POST["register"])){
    $firstname = htmlspecialchars($_POST["user_fname"]);
    $email = htmlspecialchars($_POST["user_email"]);
    $phonenumber = htmlspecialchars($_POST["phone_number"]);
    $address = htmlspecialchars($_POST["user_textarea"]);
   
    
  if($firstname==''){
        $name_error = "<p style=color:red>Name is required</p>";
  }
 if
   ($email==''){
    $email_error = "<p style=color:red>email is required</p>";
 }
 if
   ($phonenumber==''){
    $phone_error = "<p style=color:red>phone number is required</p>";
 }
 else{
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $email_error = "<p style=color:red>Invalid email format</p>"; 
    }
        elseif($firstname !=''){
            $sql = "INSERT INTO submitform (fname,email,phoneno,faddress)
            VALUES ('$firstname','$email','$phonenumber','$address')";
            
            if (mysqli_query($conn, $sql)) {
              $submit_formsucc = "<p>Form submitted successfully</p>";
            } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            
            
//email to clients and the website owner as well
            $username=$firstname;
            $userEmail=$email;
            $userMessage=$address;
            $ownerMessage="we will in touch with you shortly";
            $toEmail="withhishelp20@gmail.com";
            $siteName="webApp";
            $headers="Name:".$username . PHP_EOL 
            . "Email:".$userEmail . PHP_EOL 
            . "Message:".$userMessage;
            $headers2="Name:".$siteName. PHP_EOL 
            . "Email:".$toEmail . PHP_EOL 
            . "Message:".$ownerMessage;
           
    if(mail($toEmail,$username,$headers) && (mail($userEmail,$siteName,$headers2))){
          $emailsent = "<p>Email sent to you..</P>"; 
          }else{
           
          $email_notsent=  "<P style=color:red>Email not sent! check your internet connection</p>";
          
              }
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
    <title>Document</title>
</head>
<body>

 <h2 style= text-align:center;margin-top:80px> Contact us</h2>
<div class="contactform">  
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 <div class="form-group">
    <label style=padding-right:15px>Name *</label>
    <input type ="text"  class="form-control" name="user_fname">
    <?php echo $name_error; ?>
</div>
<div class="form-group">
<label style=padding-right:15px>Email *</label>
<input type ="text" class="form-control" name="user_email" >
<?php echo $email_error; ?> 
</div>
<div class="form-group">
<label style=padding-right:15px>Phone*</label>
<input   type ="text" class="form-control" name="phone_number" >
<?php echo $phone_error;?>
</div>
<div class="form-group">
<label style=display:block;text-align:center;padding-bottom:10px>Address (optional)</label>
<textarea type ="textarea" class="form-control" name="user_textarea" ></textarea>
</div>
<br /><br />
<div class="submit-form">
<input type="submit" class="submitbutton" name="register" value="Submit"><br /><br />
<?php echo $submit_formsucc;?>
<?php echo $emailsent;?><span class="text-danger"><?php echo $email_notsent;?>
</div>
</form>
</div>
</body>
</html>