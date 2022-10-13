<?php
$database =new PDO("mysql:host=localhost;dbname=myproject;charset=utf8;","root","");
if(isset($_POST['send']))
{
     $Name=$_POST['name'];
     $degree=$_POST['degree'];
     $scientific=$_POST['scientific'];
     $workplace=$_POST['workplace'];
     $Email=$_POST['email'];
     $in_private=$_POST['publics'];
     $in_public=$_POST['privates'];
     $id_dept=$_POST['departem'];
     $addData =$database->prepare("INSERT INTO information_users(name_users,degree,scientific,workplace,email,information_public,information_private,Id_dept) 
      VALUES('$Name','$degree','$scientific','$workplace','$Email','$in_private','$in_public','$id_dept')");
      if($addData->execute())
     {
       echo '<div class="alert alert-success" role="alert">تم أنشاء الحساب بنجاح </div>';
     }
      else
     {
       echo '<div class="alert alert-danger" role="alert">فشل أنشاء الحساب  </div>';
     }         
}

?>