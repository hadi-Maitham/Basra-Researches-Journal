<?php

$message='';
if(isset($_POST['send']))
{
require_once 'mailer.php';
$message='  
            <h3> عنوان البحث :'.$_POST["id"].'---
              '.$_POST["date"].'
              '.$_POST["department"].'</h3>
            <h3>  عنوان البحث : '.$_POST["title"].'</h3>
            <h3>   اسم الباحث : '.$_POST["name_users"].'</h3>  ';

            
$mail->setFrom('hadi787531@gmail.com', 'رئيس مجلة ');
$mail->addAddress('hadimaitham254@gmail.com');  
$mail->Subject = ' مجلة البحث لجامعة البصرة  ';
$mail->Body = $message;
$mail->send();

}

?>

<?php
include 'heders_users.php';
?>
<?php
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
  <input type="text" name="date" id="dates" class="dis">
  <input type="text" name="department" id="departments" class="dis">
  <input type="text" name="title" id="titles" class="dis">
  <input type="text" name="name_users" id="name_users" class="dis">

  <table class="table" dir="rtl" id="table">
  <thead class="thead-dark">
    <tr>
      <th><input type="submit" name="send" value="Send" class="btn btn-primary" ></th>
      <th colspan="3">رقم البحث</th>
      <th >عنوان البحث</th>
      <th >اسم الباحث</th>
      <th > دفع الطلب</th>
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
        $query="SELECT * FROM posts  WHERE name_users LIKE '%$keys%' OR title LIKE '%$keys%'  ";
    }
    else
    
    $query="SELECT * FROM posts ";
    $res=$conn->query($query);
    if($res)
    {
      $no=$res->num_rows;
    for($i=0;$i<$no;$i++)
    {
      $row=$res->fetch_assoc();
      $idd=$row['department'];
      $q1="SELECT * FROM department WHERE ID_dept = $idd ";
      $r1=$conn->query($q1);
      $row1=$r1->fetch_assoc();

      echo " <tr class='td1'>
      <td><input type='radio' value='Yes' name='radios' ></td>
      <td>".$row['ID_post']."</td>
      <td>".$row['date']."</td>
      <td>".$row1['name_dept']."</td>
      <td>".$row['title']."</td>
      <td>".$row['name_users']."</td>
      <td>".$row['Checks']."</td>
      </tr> ";
     
    }
  }
  
  ?>

</table>

</form>
</body>  
</html> 

<?php

 if(isset($_POST['send']))
 {
  $id=$_POST['id'];
  $check=$_POST['radios'];
  $q="UPDATE posts SET 	Checks='$check' WHERE ID_post=$id ";
  $r=$conn->query($q);
 }
?>
<style>
   .table
   {
    margin-top: 10px;
    cursor:pointer;
   }
   th
   {
    text-align: center;
   }
   .td1
   {
     width:700px;
   }
   tr
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
    text-align:right;
  }
</style>
<script type="text/javascript">
    var tbls=document.getElementById('table'),rIndex;
    for(var i=1; i<tbls.rows.length; i++)
    {
        tbls.rows[i].onclick=function()
        {
            rIndex=this.rowIndex;
            document.getElementById("fname").value=this.cells[1].innerHTML;
            document.getElementById("dates").value=this.cells[2].innerHTML;
            document.getElementById("departments").value=this.cells[3].innerHTML;
            document.getElementById("titles").value=this.cells[4].innerHTML;
            document.getElementById("name_users").value=this.cells[5].innerHTML;
        };
    }
   
</script> 

