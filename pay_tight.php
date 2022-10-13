<?php
include 'heders_editor.php';
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
<table class="table" dir="rtl" id="table">
<br>
  <div class="form-group">
  <input type="text" name="textsearch" class="inputs"  placeholder="Search" >
    <input type="submit" name="searchs"  class="btn btn-primary" value="Search">
  </div>
  <thead class="thead-dark">
    <tr>
      <th>رقم التسلسل</th>
      <th>تاريخ التسليم</th>
      <th>الاسم</th>
      <th>الايميل</th>
      <th>استمارة تقيم</th>
      <th>استمارة تبين درجات</th>
      <th>كتاب التكليف</th>
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
          $query="SELECT * FROM information_tight WHERE Name_user LIKE '%$keys%' OR Email LIKE '%$keys%' OR date LIKE '%$keys%'";
      }
      else
      $query="SELECT * FROM information_tight";
      $res=mysqli_query($conn,$query);
      if($res)
      {
      while($row=mysqli_fetch_assoc($res))
      {
      ?>
      <tr>
      <td><?php echo $row['ID_tight'] ?></td>
      <td><?php echo $row['date'] ?></td>
      <td><?php echo $row['Name_user'] ?></td>
      <td><?php echo $row['Email'] ?></td>
      <td><a href="FileEvaluation/<?php  echo $row['Evaluation'] ; ?>" download>download</a></td>
      <td><a href="FileShowing/<?php  echo $row['Showing'] ; ?>" download>download</a></td>
      <td><a href="assigned/<?php  echo $row['Assigned'] ; ?>" download>download</a></td>

      </tr>

      <?php
      }
    }
      ?>
</table>
</form>
</body>
</html>
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