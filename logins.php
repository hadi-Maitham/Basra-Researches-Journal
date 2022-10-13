<!DOCTYPE html>
<html>
<head>

<title>تسجيل الدخول</title>
<meta charset="utf-8">
<link rel="stylesheet" href="logins.css">

</head>
<body>

    <div class="wrapper" >
        <div class="title">Login </div>
        <form  method="POST">

               <div class="field">
                <input  required name="email">
                <label> ألأيميل</label>
               </div>

              <div class="field">
                <input type="password"  required name="password"  maxlength="6" >
                <label>كلمة المرور</label>
              </div>
     
              <div class="field">
                <input type="submit" value="Login" name="login">
              </div>

              <div class="signup-link">
              <a href="recode.php">Sign in</a>
               هل انت مسجل مسبقا؟ 
                </div>

        </form>
     </div>   

<?php

$database =new PDO("mysql:host=localhost;dbname=myproject;charset=utf8;","root","");
 session_start();
if(isset($_POST['login']))
{
 
  $email=$_POST['email'];
  $password=$_POST['password'];
  //$Password=sha1($_POST['password']);
  $login = $database->prepare(" SELECT *  FROM records WHERE Email ='$email' AND Password ='$password'");
  $login->bindParam("$email",$_POST['email']);
  $login->bindParam("$password", $_POST['password']);

/*
$login = $database->prepare(" SELECT *  FROM records WHERE Email = :email AND Password = :password");
$login->bindParam("email",$_POST['email']);
$Password=sha1($_POST['password']);
$login->bindParam("password",$Password);
*/

  $login->execute();
  if($login->rowcount()==1)
  {
    $user=$login->fetchobject();
    $_SESSION["login_email"]=$email;
    $_SESSION['users']=$user;
    //header("location:upost.php");
     if($user->typeuser=="1")
     {
      header("location:pay_users.php");
     }
     elseif($user->typeuser=="4")
     {
      header("location:possts.php");
     }
     elseif($user->typeuser=="2")
     {
      header("location:pay_editor.php");
     }
     elseif($user->typeuser=="3")
     {
      header("location:information_tight.php");
     }
    
  }
  else
 {
    echo "<h1>  غير صحيح</h1>";
  }
}
   
?>

</body>
</html>