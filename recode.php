<?php
include 'heders.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>تسجيل المعلومات</title>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<script src="jquery.js"></script>
<script src="javascript.js"></script>
</head>
<body>

    <div class="wrapper" >
    <div class="alert alert-primary" role="alert"> أنشاء حساب</div>

        <form  method="POST">
            <div class="field form-group">
                <input type="text" required name="name" placeholder=" الأسم الكامل " class="form-control">
              </div>

              <div class="field form-group">
                <input type="text" required name="user" placeholder=" الأسم المستخدم " class="form-control">
              </div>
              
              <div class="field form-group">
                <input type="password" required maxlength="6" name="password" placeholder=" كلمة المرور " class="form-control" >
              </div>

              <div class="field form-group">
                <input type="email" required name="email" placeholder=" الأيميل " class="form-control">
              </div>

              <div class="field form-group">
                <input type="text" required name="tole" placeholder=" رقم الهاتف " class="form-control">
              </div>
              <div class="field form-group">
                <input type="radio" checked value="4" name="rad" id="rad" class="form-control">
              </div>

              <div class="field form-group">
                <input type="submit" value="أرسال" name="send" class="form-control cont">
              </div>
             

        </form>

    </div>



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
      echo '<div class="alert alert-danger" role="alert">   هذ الايميل موجود مسبقا قم بتغيرة  </div>';
    }
    else
    { 
     $Name=$_POST['name'];
     $User=$_POST['user'];
     //$Password=sha1($_POST['password']);
     $Password=$_POST['password'];
     $Email=$_POST['email'];
     $Tole=$_POST['tole'];
     $rad=$_POST['rad'];
     $addData =$database->prepare("INSERT INTO records(Name,User,Password,Email,Tole,typeuser) 
      VALUES('$Name','$User','$Password','$Email','$Tole','$rad')");
      if($addData->execute())
     {
       echo '<div class="alert alert-success" role="alert">تم أنشاء الحساب بنجاح </div>';
       header("refresh:1,url=recode.php");
     }
      else
     {
       echo '<div class="alert alert-danger" role="alert">فشل أنشاء الحساب  </div>';
     } 
    }        
}
?>
</body>
</html>
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
#rad
 {
    display:none;
 }
</style>