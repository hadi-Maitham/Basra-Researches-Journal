<?php
include 'heders_tight.php';
?>
<?php
$message='';
if(isset($_POST['send']))
{
  error_reporting(0);
   require_once 'mailer.php';
   $dates=date("y-m-d");
   $message='<h3> الاسم المحكم :'.$_POST["Names"].'</h3> 
            <h3>   الايميل :'.$_POST["Emails"].'</h3> 
            <h3>   تاريخ التسليم :'.$dates.'</h3> ';

   $mail->setFrom($_POST["Emails"], 'تسليم بحث المحكم');
   $mail->addAddress('hadimaitham254@gmail.com');
   $mail->Subject = ' مجلة البحث لجامعة البصرة  ';
   $mail->Body = $message;
   $mail->send();
}

/*
if(isset($_POST['send']))
{
require_once 'mailer.php';

$mail->setFrom($_POST["Email"], 'رفع مجلة البحث');
$mail->addAddress('hadimaitham254@gmail.com');  
$mail->Subject = ' مجلة البحث لجامعة البصرة  ';
$mail->Body = "Yes is title";

//$file_re=$_FILES["Research"]["name"];
//move_uploaded_file($_FILES["Research"]["tmp_name"],$file_re);

$ReName=$_FILES['Research']['name'];
$ReTemp=$_FILES['Research']['tmp_name'];
$Re=$ReName;
move_uploaded_file($ReTemp,"FileResarch/".$Re);
$mail->addAttachment($ReName);


$mail->send();
//move_uploaded_file($_FILES['file']['tmp_name'],$_FILES['file']['name']);
//$mail->addAttachment($_FILES['file']['name']); 
}
*/
?>
<?php
 session_start();
 if(isset($_SESSION['users']))
 {
   if($_SESSION['users']->typeuser=="3")
   {
    echo "";
   }
   else
   {
    header("location:logins.php");
   }
 }
 else
 {
   header("location:logins.php");
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>رفع التحكيم</title>
    <link rel="stylesheet" href="style.css">
        <script src="jquery.js"></script>
        <script src="javascript.js"></script>
</head>
<body>
  
<div class="alert alert-primary" role="alert">رفع التحكيم</div>
  <form method="POST" enctype="multipart/form-data"  dir="let" >

  <!--
  <div class="field form-group">
   <input type="text" required  name="Names" placeholder="الاسم"  class="form-control title">
   </div>

  <div class="field form-group">
   <input type="email" required  name="Emails" placeholder="الأيميل"  class="form-control title">
   </div>-->
                   <select name="idname" id="select">
                     <?php
                     $host='localhost';
                     $usr='root';
                     $db='myproject';
                     $conn=mysqli_connect($host,$usr,$pass,$db);
                     @$pemail=$_SESSION['login_email'];
                     @$show=mysqli_query($conn,"SELECT * FROM records WHERE Email='$pemail'");
                     @$result=mysqli_fetch_assoc($show);
                    // $idsa=$result['ID'];
                     $idname=$result['Name'];
                     $emailname=$result['Email'];
                    // echo "<option value=$idsa></option>";
                     echo "<input type='text' value='$idname' name='Names' id='Names' class='form-control title names'> ";
                     echo "<input type='email' value='$emailname' name='Emails' id='Emails' class='form-control title names'> ";

                     ?>
                  </select>

                  


 <!-- <input type="file" accept=".docx,.pdf" required name="Research" class="File">-->
 
  <input type="file" accept=".docx,.pdf" required name="evaluation"  class="File">
  <label for="">استمارة التقييم</label><br>
  
  <input type="file" accept=".docx,.pdf" required name="showing"  class="File">
  <label for="">  استمارة تبين درجات</label><br>

  <input type="file" accept=".docx,.pdf" required name="assigned"  class="File">
  <label for="">كتاب التكليف</label><br>
  
  <div class="field fil form-group">
  <input type="submit" name="send" value="ارسال"  class="form-control cont">
  </div>
  </form>

</body>
</html>
<?php

if(isset($_POST['send']))
{
 //File Evaluation
 $EvaluationName=$_FILES['evaluation']['name'];
 $EvaluationTemp=$_FILES['evaluation']['tmp_name'];
 $Evaluation=$EvaluationName;
 move_uploaded_file($EvaluationTemp,"FileEvaluation/".$Evaluation);
 // File Showing
 $ShowingName=$_FILES['showing']['name'];
 $ShowingTemp=$_FILES['showing']['tmp_name'];
 $Showing=$ShowingName;
 move_uploaded_file($ShowingTemp,"FileShowing/".$Showing);
 // File assigned
 $assignedName=$_FILES['assigned']['name'];
 $assignedTemp=$_FILES['assigned']['tmp_name'];
 $assigned=$ShowingName;
 move_uploaded_file($assignedTemp,"FileAssigned/".$assigned);

 $names=$_POST['Names'];
 $email=$_POST['Emails'];
 $date=date("y-m-d");

 $query="INSERT INTO information_tight(date,Name_user,Email,Evaluation,Showing,Assigned) 
 VALUE('$date','$names','$email','$Evaluation','$Showing','$assigned')";
 $Rs=$conn->query($query);
 if($Rs)
 {
   echo '<div class="alert alert-success" role="alert"> تم ارسال البانات بنجاح</div>';
   header("refresh:1,url=information_tight.php");

 }
 else
 {
   echo '<div class="alert alert-success success" role="alert"> فشل ارسال البيانات </div>';
 }
}

?>
<style>
  
   .File
 {
     width:700px;
     margin-left: 270px;
    border: 1px solid rebeccapurple;
    margin-top:30px;
 }
 .form-group
 {
    width: 700px;
    margin-left: 20%;
    border: 1px solid rebeccapurple;
    margin-top: 20px;
 }
 .cont
 {
    text-align:center;
    background-color:  rebeccapurple;
    color: white;
 }
 .cont:hover
 {
   background-color: teal;
    color: white;
 }
 .alert-primary
 {
    width: 700px; 
    margin-left: 20%;
    text-align:center;
    background-color: teal;
    font-size: 20px;
    color: white;
    margin-top: 10px;
 }
 .alert-success
 {
    text-align: center;
    font-size: 20px;
 }
 .title
 {
  text-align: right;
 }
 #select
 {
    display:none;
 }
 #Emails
 {
   display:none;
 }
 #Names
 {
   display:none; 
 }
 .names
 {
  width:700px;
  margin-left: 270px;
  border: 1px solid rebeccapurple;
  margin-top:30px;
 }
 .success
 {
  background-color: red;
  color:white;
 }


</style>