<?php
$message='';
if(isset($_POST['send']))
{
require_once 'mailer.php';

$message='  
            <h3> عنوان البحث :'.$_POST["title"].'</h3> 
            <h3> الاسم الباحث :'.$_POST["idNames"].'</h3> 
            <h3> التخصص الدقيق :'.$_POST["privatess"].'</h3>
            <h3>   الايميل :'.$_POST["Email"].'</h3>  ';


$mail->setFrom($_POST["Email"], 'رفع مجلة البحث');
$mail->addAddress('hadi787531@gmail.com');  
$mail->Subject = ' مجلة البحث لجامعة البصرة  ';
$mail->Body = $message;
$mail->send();
}
?>
<?php
$database =new PDO("mysql:host=localhost;dbname=myproject;charset=utf8;","root","");

if(isset($_POST['send']))
{
   $fileType=$_FILES["file"]["type"];
   $fileName=$_FILES["file"]["name"];
   $file=$_FILES["file"]["tmp_name"];
   // file dont name
   $loadingType=$_FILES["loading"]["type"];
   $loadingName=$_FILES["loading"]["name"];
   $loading=$_FILES["loading"]["tmp_name"];
   //
   $title=$_POST['title'];
   $date=date("y-m-d");
   $dept=$_POST['dept'];
   $IDuser=$_POST['idname'];
   $idNames=$_POST['idNames'];
   $authors=$_POST['authors'];
   $summarys=$_POST['summarys'];
   $privatess=$_POST['privatess'];
   $methods=$_POST['methodss'];
   $Email=$_POST['Email'];
   $keyword=$_POST['keyword'];

   move_uploaded_file($file,"filepost/".$fileName);
   $position="filepost/".$fileName;
   //
   move_uploaded_file($loading,"fileloading/".$loadingName);
   $position_loading="fileloading/".$loadingName;
   //
     $uploadFile=$database->prepare(" INSERT INTO posts (date,department,name,type,position,loading_name,loading_type,loading_position,title,iduser,name_users,author,summary_en,privates,methods,Email,keyword)
      VALUES ('".$date."','$dept',:name,:type,:position,:loading_name,:loading_type,:loading_position,'$title','$IDuser','$idNames','$authors','$summarys','$privatess','$methods','$Email','$keyword') ");
     $uploadFile->bindParam("name", $fileName);
     $uploadFile->bindParam("type", $fileType);
     $uploadFile->bindParam("position", $position);
     //
     $uploadFile->bindParam("loading_name",$loadingName);
     $uploadFile->bindParam("loading_type",$loadingType);
     $uploadFile->bindParam("loading_position",$position_loading);
     //
    if($uploadFile->execute())
    {
        echo'<div class="ok"> تم ارسال البيانات بنجاح</div>';
        header("refresh:2,url=possts.php");
    }
    else
    {
        echo'<div class=" ok error"> فشل ارسال البيانات </div>';
    }

}
?>
<?php

 //echo "<a href='loguts.php' class='logout'> الصفحة الرئيسية </a>";
 ?>
<style>
    .ok
 {
    background-color: #44bb60;
    font-size: 40px;
    color: white;
    width: 800px;
    height: 40px;
    text-align: center;
    border-radius: 10px;
    padding-top: 20px;
    padding-bottom: 50px;
    margin-top: 20px;
    margin-bottom: 20px;
 }
 .error
 {
    background-color: #d12945; 
 }
 .logout
 {
    width:600px;
    background-color: rgb(13, 94, 94);
    color: wheat;
    text-align: center;
    padding-top: 10px;
    padding-bottom:10px;
    margin-top: 10px;
    margin-bottom: 30px;
    font-size: 20px;
    border-radius: 10px;
    margin-left: 1100px;
    text-decoration: none;
 }
</style>