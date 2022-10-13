<?php
if(isset($_POST['send']))
{
require_once 'mailer.php';
$mail->setFrom('hadimaitham254@gmail.com', 'رفع مجلة البحث');
$mail->addAddress($_POST["emalis"]);  
$mail->Subject = ' مجلة البحث لجامعة البصرة  ';
$mail->Body = "<h1>عزيزي الباحث لقد تم حذف بحثك لحتواء على استلال العلمي </h1>";
$mail->send();
}
?>

<?php
include 'heders_editor.php';
?>
<?php
session_start();
if(isset($_SESSION['users']))
{
   if($_SESSION['users']->typeuser=="2")
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
<html>
<head>
<title>دفع الطلب</title>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<script src="jquery.js"></script>
<script src="javascript.js"></script>
</head>
<body>
<form method="POST" enctype="multipart/form-data">
  <br>
  <div class="form-group">
  <input type="text" name="textsearch" class="inputs"  placeholder="Search" >
    <input type="submit" name="searchs"  class="btn btn-primary" value="Search">
  </div>

  <input type="text" name="id" id="fname" class="dis"  >
  <input type="text" name="emalis" id="email" class="dis" >
  <input type="text" name="n1" id="n1" class="dis" >


<table class="table" dir="rtl" id="table">
  <thead class="thead-dark">
    <tr>
      <th colspan="3">رقم البحث</th>
      <th>عنوان الباحث</th>
      <th>اسم الباحث</th>
      <th>اختصاص الدقيق</th>
      <th>تحميل الملف</th>
      <th>الأيميل</th>
      <th>تفاصيل</th>
      <th><input type="submit" name="send" value="Dletet" class="btn btn-primary" ></th>
      <th><input type="submit" name="send1" value="قبول " class="btn btn-primary" ></th>
      <th> البحث</th>
    </tr>
  </thead>

  <?php
    $host='localhost';
    $usr='root';
    $pass='';
    $db='myproject';
    $conn=mysqli_connect($host,$usr,$pass,$db);
    error_reporting(0);
    if(isset($_POST['searchs']))
    {
        $keys=$_POST['textsearch'];
        $query="SELECT * FROM posts  WHERE Checks='Yes' AND (name_users LIKE '%$keys%' OR title LIKE '%$keys%') ";
    }
    else

    $query="SELECT * FROM posts WHERE Checks='Yes' ";
    $res=mysqli_query($conn,$query);
    if($res)
    {
    while($row=mysqli_fetch_assoc($res))
    {
      $idd=$row['department'];
      $q1="SELECT * FROM department WHERE ID_dept = $idd ";
      $r1=$conn->query($q1);
      $row1=$r1->fetch_assoc();
    ?>
       <tr>
       <td><?php echo $row['ID_post'] ?></td>
       <td><?php echo $row['date'] ?></td>
       <td><?php echo $row1['name_dept'] ?></td>
        <td><?php echo $row['title'] ?></td>
        <td><?php echo $row['name_users'] ?></td>
        <td><?php echo $row['privates'] ?></td>
        <td><a href="filepost/<?php  echo $row['name'] ; ?>" download>download</a></td>
        <td><?php echo $row['Email'] ?></td>
        <td><a href="dsiplay_editor.php?de=<?php echo $row['privates'] ?>&users=<?php  echo $row['name_users']?>&namefile=<?php  echo $row['loading_name']?>">تفاصيل</a></td>
        <td><input type='radio' value='Yes' name='radios' ></td>
        <td><input type='radio' value='Yes' name='radios2' ></td>
        <td><?php echo $row['Acceptance'] ?></td>
      </tr>
    <?php
    }
  }
  ?>
</form>
</body>
</html>  
<?php
 if(isset($_POST['send']))
 {
  $id=$_POST['id'];
  $check=$_POST['radios'];
  $q="DELETE FROM posts WHERE ID_post=$id ";
  $r=$conn->query($q);
 }
?>
<?php
 if(isset($_POST['send1']))
 {
  $n1=$_POST['n1'];
  $Acceptance=$_POST['radios2'];
  $q="UPDATE posts SET 	Acceptance='$Acceptance' WHERE ID_post=$n1 ";
  $r=$conn->query($q);
 }
?>
<style>
  .a
  {
       text-decoration: none;
       color: white;
       background-color: rgb(12, 134, 165);
       font-size: 20px;
       padding: 6px;
  }
  .a:hover
   {
    text-decoration: none;
     color: black;  
   }
    .table
   {
    margin-top: 10px;
    cursor:pointer;
   }
   th
   {
    text-align: center;
   } tr
   {
    text-align: center;
   }
   .ths
   {
    text-align:center;
   
   }
   tr:hover
   {
    background-color:#c2cbbd;
   }
   .dis
   {
    display: none;
   }
   .form-control
   {
     width:700px;
     margin-left: 20%;
     text-align:right;
     border: 1px solid rgb(31, 162, 167);
  }
  .form-group
  {
    margin-left: 350px;
  }
  .inputs
  {
    width: 600px;
    height:33px;
    text-align: right;
  }
</style> 
<script type="text/javascript">
    var tbls=document.getElementById('table'),rIndex;
    for(var i=1; i<tbls.rows.length; i++)
    {
        tbls.rows[i].onclick=function()
        {
            rIndex=this.rowIndex;
            document.getElementById("fname").value=this.cells[0].innerHTML;
            document.getElementById("email").value=this.cells[7].innerHTML;
            document.getElementById("n1").value=this.cells[0].innerHTML;
        };
    }
</script> 