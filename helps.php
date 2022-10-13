<?php
include 'heders.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <script src="jquery.js"></script>
        <script src="javascript.js"></script>
    </head>
<body>
    <div class="alert alert-success help" role="alert">أتصل بنا </div>
    <form dir="rtl" method="post" enctype="multipart/form-data">
    <div class="form-group">
    <input type="text" name="fullname" required class="form-control"  placeholder="الأسم الكامل">
    </div>

    <div class="form-group">
    <input type="email" name="email" required class="form-control"  placeholder="الأيميل">
    </div>

    <div class="form-group">
    <input type="text" name="tole" required class="form-control" id="exampleFormControlInput1" placeholder="رقم الهاتف">
    </div>

    <div class="form-group">
    <textarea class="form-control" name="texts" required  placeholder="رسالة"  rows="3"></textarea>
  </div>

  <div class="form-group">
  <input type="submit" name="send" class="form-control button" value="أرسال" >
  </div>

 </form>
</body>
</html> 

<?php
$message='';
if(isset($_POST['send']))
{
require_once 'mailer.php';
$message='<h3>  الاسم الكامل :'.$_POST["fullname"].'</h3> 
<h3>  الايميل :'.$_POST["email"].'</h3> 
<h3>  الهاتف :'.$_POST["tole"].'</h3> 
<h3>  رسالة :'.$_POST["texts"].'</h3> 
';
$mail->setFrom($_POST["email"], 'مشكلة ');
$mail->addAddress('hadi787531@gmail.com'); 
$mail->Subject = '   جامعة البصرة  ';
$mail->Body = $message;
if($mail->send())
{
    echo '<div class="alert alert-success" role="alert">تم ارسال البيانات بنجاح</div>';
  
}
else
{
    echo '<div class="alert alert-danger " role="alert"> فشل ارسال البيانات </div>';
}
}
?>

<style>
    
    *{
        margin: 0;
        padding: 0;
    }
    .button
    {
        text-align: center;
        color:black;
    }
    .button:hover
    {
        background-color: dodgerblue;
        color: white;
    }
    .form-control
    {
        border: 1px rgb(31, 162, 167) solid;
        width: 700px;
        margin-right: 350px;
    }
     form
     {
        margin-top: 10px;
     }
     .help
     {
        width: 700px;
        margin-left:320px ;
        text-align: center;
        margin-top: 40px;
        font-size: 20px;
        background-color: rgb(31, 162, 167);
        color:white;
     }
     .alert-success
     {
        width: 700px;
        margin-left:320px ;
        text-align: center;
        margin-top: 40px;
        font-size: 20px;
     }
   
</style>
