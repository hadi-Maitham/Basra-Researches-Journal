
<?php
include 'heders_editor.php';
?>
<?php
error_reporting(0);
$users=$_GET['users'];
$priv=$_GET['de'];
$namefile=$_GET['namefile'];
?>

<!DOCTYPE html>
<html>
<head>
<title> عرض التفاصيل</title>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<script src="jquery.js"></script>
<script src="javascript.js"></script>
</head>
<body>
<form method="get" enctype="multipart/form-data" action="email_editor.php" >
<div class="alert alert-primary" role="alert"> دعوة للمقيميين </div>

  <input type="text" name=""  value="<?php echo "$users" ; ?>" class="inputs"  >
  <input type="text" name=""  value="<?php echo "$priv" ; ?>" class="inputs"  >


              <select name="departem" class="select">
                <?php
                    $host='localhost';
                    $usr='root';
                    $pass='';
                    $db='myproject';
                    $conn=mysqli_connect($host,$usr,$pass,$db);
                    error_reporting(0);
                    $query="SELECT * FROM information_users WHERE information_private='$priv' AND externals='No' ";
                    $rows=$conn->query($query);
                    if($rows)
                    {
                      $no=$rows->num_rows;
                      for($i=0;$i<$no;$i++)
                       {
                         $ro=$rows->fetch_assoc();
                         $emails=$ro['email'];
                         $name=$ro['name_users'];
                          echo "<option value=$emails>$name</option>";
                         // echo "<option>$emails</option>";
                       } 
                     }
                ?>
              </select> 
      <!---------------------------------------------------------------->  
      <select name="departem2" class="select">
                <?php
                    $query="SELECT * FROM information_users WHERE externals='No' AND information_private='$priv'";
                    $rows=$conn->query($query);
                    if($rows)
                    {
                      $no=$rows->num_rows;
                      for($i=0;$i<$no;$i++)
                       {
                         $ro=$rows->fetch_assoc();
                         $emails2=$ro['email'];
                         $name=$ro['name_users'];
                          echo "<option value=$emails2>$name</option>";
                       } 
                     }
                ?>
              </select> 
       <!------------------------------------مقميم الخارج------------------------------> 
       <p>محكم الخارجي</p>  
       <select name="departem3" class="select">
                <?php
                    $query="SELECT * FROM information_users WHERE information_private='$priv' AND externals='Yes' ";
                    $rows=$conn->query($query);
                    if($rows)
                    {
                      $no=$rows->num_rows;
                      for($i=0;$i<$no;$i++)
                       {
                         $ro=$rows->fetch_assoc();
                         $emails3=$ro['email'];
                         $name=$ro['name_users'];
                          echo "<option value=$emails3>$name</option>";
                       } 
                     }
                ?>
              </select> 
              <br><br>
              <!----
              <input type="file" accept=".docx,.pdf" required name="file" class="File">
              <label for="">استمارة التقييم</label><br>--->
              <input type="text" accept=".docx,.pdf" value="<?php echo "$namefile" ; ?>" id="fi2" required name="file" >


              <div class="field form-group">
                <input type="submit" value="أرسال" name="send" class="form-control cont">
              </div>

</form>
</body> 
</html>  

<style>
   .File
 {
     width:700px;
     margin-top: 10px;
     margin-left: 270px;
    border: 1px solid rebeccapurple;
 }

  p{
    margin-left: 850px;
  }
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
 .form-group
 {
    width: 700px;
    margin-left: 20%;
    border: 1px solid rebeccapurple;
    margin-top: 20px;
 }
 .inputs
  {
    width: 700px;
    height:33px;
    margin-left: 270px;
    margin-top: 20px;
  }
  .cont
  {
    text-align:center;
    background:rebeccapurple;
    color:white;
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
  .cont:hover
 {
    background-color: teal;
    color: white;  
 }
 #fi2
 {
  display:none;
 }
 
    
</style>


