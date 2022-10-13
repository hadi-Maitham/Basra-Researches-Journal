
<?php
//action="email_editor.php"
if(isset($_GET['send']))
{
require_once 'mailer.php';
error_reporting(0);
$mail->setFrom('hadimaitham254@gmail.com', 'رفع مجلة البحث');
$mail->addAddress($_GET['departem']);  
$mail->addAddress($_GET['departem2']); 
$mail->addAddress($_GET['departem3']); 
$mail->Subject = ' مجلة البحث لجامعة البصرة  ';
$mail->Body = "<h3> تحية طيبة : <br> يرجى التفضل في تقيمم البحث</h3> 
<h3>المرسل: دكتور احمد صلاح  <br>رئيس مجلة البحث العلمي لجامعة البصرة - كلية التربية للعلوم الصرفة</h3> 
<h3>http://localhost/filemagazine/information_tight.php</h3>";

$mail->addAttachment('Files/Evaluation.docx');
$mail->addAttachment('Files/revise.docx');
$mail->addAttachment('Files/p3.docx');
$mail->addAttachment('fileloading/'.$_GET['file']);

//move_uploaded_file($_FILES['file']['tmp_name'],$_FILES['file']['name']);
//$mail->addAttachment($_FILES['file']['name']);

//$file_Research=$_FILES["Research"]["name"];
//move_uploaded_file($_FILES["Research"]["tmp_name"],$file_Research);

if($mail->send())
{
  echo '<div class="alert alert-success" role="alert"> تم ارسال البيانات بنجاح </div>';
}
else
{
  echo '<div class="alert alert-danger" role="alert">  فشل ارسال البيانات  </div>';
}
}
?>

<style>
     h3{
        font-family: 'Courier New', Courier, monospace;
    }
 .alert-success
 {
    width:500px;
    height:50px;
    padding:20px;
    color:white;
    text-align: center;
    font-size: 20px;  
    background-color: rgb(42, 190, 42);
 }
 .alert-danger
 {
    padding:20px;
    color:white;
     width:500px;
     height:50px;
    text-align: center;
    font-size: 20px;
    background-color: red;
 }
</style>