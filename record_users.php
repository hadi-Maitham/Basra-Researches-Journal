<?php
include 'heders_users.php'
?>
<?php
$message='';
if(isset($_POST['send']))
{
require_once 'mailer.php';
$message='  
            <h3>  الاسم المحكم :'.$_POST["name"].'</h3> 
            <h3>  كلمة المرور :'.$_POST["password"].'</h3> 
            <h3>   الايميل :'.$_POST["email"].'</h3>  ';

$mail->setFrom('hadimaitham254@gmail.com', 'حساب المحكميين');
$mail->addAddress($_POST["email"]);  
$mail->Subject = 'مرحبا';
$mail->Body = $message;
$mail->send();
}
?>
<?php
/*
 session_start();
 if(isset($_SESSION['users']))
 {
   if($_SESSION['users']->typeuser=="1")
   {
     echo "";
   }
   else
   {
      header("location:logins.php");
      die("");
   }
 }
 else
 {
   header("location:logins.php");
   die("");
 }*/
?>
<!DOCTYPE html>
<html>
<head>
<title>حساب المقيمين</title>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<script src="jquery.js"></script>
<script src="javascript.js"></script>
</head>
<body>
    
    <div class="wrapper" >
     <div class="alert alert-primary" role="alert"> أنشاء حساب</div>
     <form  method="POST" enctype="multipart/form-data">
            <div class="field form-group">
                <input type="text" required name="name" placeholder=" الأسم الكامل " class="form-control">
              </div>
              <div class="field form-group">
                <input type="text" required name="users" placeholder=" الأسم المستخدم " class="form-control">
              </div>

              <div class="field form-group">
                <input type="tetx" required maxlength="6" name="password" id="tb" placeholder=" كلمة المرور " class="form-control" >
                <button type="button" class="form-control" id="dt" onclick="ran();" >Random password</button>
            </div>
              <div class="field form-group">
                <input type="email" required name="email" placeholder=" الأيميل " class="form-control">
              </div>
              <div class="field form-group">
                <input type="text" required name="tol" placeholder=" الهاتف " class="form-control">
              </div>

              <div class="field form-group">
                <input type="radio" checked value="3" name="rad" id="rad" class="form-control">
              </div>

              <div class="field form-group">
                <input type="submit" value="أرسال" name="send" class="form-control cont">
              </div>
             

        </form>
</body>
</html>

<?php
$database =new PDO("mysql:host=localhost;dbname=myproject;charset=utf8;","root","");
if(isset($_POST['send']))
{
    $checkemail=$database ->prepare("SELECT * FROM records WHERE Email=:Email ");
    $Email=$_POST['email'];
    $checkemail->bindParam("Email",$Email);
    $checkemail->execute();
    if($checkemail->rowCount()>0)
    {
      echo '<div class="alert alert-danger" role="alert">  هذا الايميل موجود مسبقا   </div>';
    }
    else
    { 
     $Name=$_POST['name'];
     $users=$_POST['users'];
     $Password=$_POST['password'];
     $Email=$_POST['email'];
     $tol=$_POST['tol'];
     $rad=$_POST['rad'];
     $addData =$database->prepare("INSERT INTO records(Name,User,Password,Email,Tole,typeuser) 
      VALUES('$Name','$users','$Password','$Email','$tol','$rad')");
      if($addData->execute())
     {
       echo '<div class="alert alert-success" role="alert">تم أنشاء الحساب بنجاح </div>';
       header("refresh:1,url=record_users.php");
     }
      else
     {
       echo '<div class="alert alert-danger" role="alert">فشل أنشاء الحساب  </div>';
     } 
    }        
}
?>

<style>
    input
 {
    text-align: right;
 }
  .alert-success
 {
    text-align: center;
    font-size: 20px;
 }
 .alert-danger
 {
    text-align: center;
    font-size: 20px;
 }
 .form-control
 {
    width: 700px;
    margin-left: 20%;
    border: 1px solid rebeccapurple;
    margin-top: 20px;
 }
 .cont
 {
    text-align:center;
 }
 .cont:hover
 {
    background-color: rebeccapurple;
    color: white;
    
 }
 .alert-primary
 {
    width: 700px; 
    margin-left: 20%;
    text-align:center;
    background-color:rgb(31, 162, 167) ;
    font-size: 20px;
    color: white;
    margin-top: 10px;
 }
 #dt
 {
    background-color: wheat;
    color: black;
    font-size: 20px;
 }
 #rad
 {
    display:none;
 }
</style> 
 <script type="text/javascript">
          function Random()
         {
            return Math.floor(Math.random()*1000000);
         }
         function ran()
         {
         document.getElementById('tb').value=Random();
         }
</script>       

