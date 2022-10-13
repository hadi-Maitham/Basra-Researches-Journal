<?php
include 'heders_users.php'
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
 }
 */
?>

<!DOCTYPE html>
<html>
<head>
<title> معلومات المقيمين </title>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<script src="jquery.js"></script>
<script src="javascript.js"></script>
</head>
<body>

<div class="wrapper" >
    <div class="alert alert-primary" role="alert"> معلومات المقيميين</div>

        <form  method="POST" enctype="multipart/form-data">
            <div class="field form-group">
                <input type="text" required name="name" placeholder=" الأسم الكامل " class="form-control">
              </div>
              
              <div class="field form-group">
                  <select name="degree" class="form-control-lg">
                      <option>دكتوراء</option>
                      <option>ماجستير</option>
                  </select>
              </div>

              <div class="field form-group">
                  <select name="scientific" class="form-control-lg">
                      <option>مدرس مساعد</option>
                      <option>مدرس</option>
                      <option>استاذ مساعد</option>
                      <option>استاذ</option>
                  </select>
              </div>
                <!----
              <div class="field form-group">
                <input type="text" required name="scientific" placeholder="  اللقب العلمي " class="form-control">
              </div>
                 ---->
               
                 <select name="departem" class="select">
                     <?php
                     $host='localhost';
                     $usr='root';
                     $db='myproject';
                     $conn=mysqli_connect($host,$usr,$pass,$db);
                     $query="SELECT * FROM department";
                     $rows=$conn->query($query);
                     if($rows)
                     {
                       $no=$rows->num_rows;
                       for($i=0;$i<$no;$i++)
                       {
                         $ro=$rows->fetch_assoc();
                         $id=$ro['ID_dept'];
                         $name=$ro['name_dept'];
                        echo "<option value=$id>$name</option>";
                         
                       }
                     }
                     ?>
                   </select> 
           <!---------------------------------------------------->
           <select name="privates" class="select">
                     <?php
                      $host='localhost';
                      $usr='root';
                      $db='myproject';
                      $conn=mysqli_connect($host,$usr,$pass,$db);
                      $s1=$_POST['departem'];
                     $query1="SELECT * FROM privates";
                     $rows1=$conn->query($query1);
                     if($rows1)
                     {
                       $no1=$rows1->num_rows;
                       for($i=0;$i<$no1;$i++)
                       {
                         $ro1=$rows1->fetch_assoc();
                         //$id2=$ro1['ID_dept'];
                         $names=$ro1['name_private'];
                          echo "<option>$names</option>";
                       }
                     }
                     ?>
                   </select> 
        <!--------------------------------------------> 
                        
              
              <div class="field form-group">
                <input type="text" required name="workplace" placeholder="  مكان العمل " class="form-control">
              </div>
               
              <div class="field form-group">
                <input type="text" required name="email" placeholder="  الأيميل " class="form-control">
              </div>

              <div class="field  form-group">
              <input type='radio' value='Yes' name='radios' class="radio" ><b>خارجي</b><br>
              <input type='radio' value='No' name='radios' class="radio" > <b>غير خارجي</b>
              </div>
             
              <div class="field form-group">
                <input type="submit" value="أرسال" name="send" class="form-control cont">
              </div>

        </form>      
</div>
</body>
</html>

<?php

if(isset($_POST['send']))
{
  $Name=$_POST['name'];
  $degree=$_POST['degree'];
  $scientific=$_POST['scientific'];
  $workplace=$_POST['workplace'];
  $Email=$_POST['email'];
  $in_public=$_POST['privates'];
  $id_dept=$_POST['departem'];
  $rad=$_POST['radios'];

  $query="INSERT INTO information_users(name_users,degree,scientific,workplace,email,information_private,Id_dept,externals)
      VALUES('$Name','$degree','$scientific','$workplace','$Email','$in_public','$id_dept','$rad')";
  $rows=$conn->query($query);
  if($rows)
  {
    echo '<div class="alert alert-success" role="alert"> تم ارسال البيانات بنجاح </div>';
    header("refresh:2,url=information_users.php");
  }
  else
  {
    echo '<div class="alert alert-danger" role="alert">  فشل ارسال البيانات  </div>';
  }
}
?>

<style>
   .select
 {
   width:500px;
   width: 700px;
   height:50px;
    margin-left: 270px;
    margin-top: 10px;
 }
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
    border: 1px solid teal;
    margin-top: 20px;
}
.cont
{
    text-align:center;
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
.form-control-lg
{
    width: 700px;
    margin-left: 20%;
   
}
.File
 {
     width:700px;
     margin-left: 270px;
    border: 1px solid rebeccapurple;
    margin-top:10px;
 }
 .radio
 {
  margin-left: 270px;
 }

</style>   