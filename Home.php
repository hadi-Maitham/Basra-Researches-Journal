<?php
include 'heders.php';
?>

<!DOCTYPE html>
<html>
 <head>
        <title>الصفحة الرئيسية</title>
        <meta charset="utf-8">
 </head>
 <body dir="rtl">
    <form method="POST" enctype="multipart/form-data">
    <div class="form-group">
    <input type="submit" name="searchs"  class="btn btn-primary" value="Search">
  <input type="text" name="textsearch" class="inputs"  placeholder="Search" >
   
  </div>
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
        $query="SELECT * FROM posts  WHERE Acceptance='Yes' AND ((title LIKE '%$keys%' )OR (keyword LIKE '%$keys%')) ";
    }
    else
    $query="SELECT * FROM posts WHERE 	Acceptance='Yes' ";
    $res=mysqli_query($conn,$query);
    if($res)
    {
    while($row=mysqli_fetch_assoc($res))
    {
    ?>
      <div class="article">
      <div class="container">
        <h3><?php echo $row['title'] ?> </h3><br>
        <p><a href="filepost/<?php  echo $row['name'] ; ?>" download  class="a">download</a></p>
     </div>
     </div>
    <?php
    }}
?>
 </form>    
</body>
</html>
<style>
    body
    {
        background: #f6f6f6;
        text-align: right;
    }
   .article
   {
       background:#fff;
       padding: 10px;
       margin-top: 30px;
   } 

   .a
  {
       text-decoration: none;
       color: white;
       background-color: rgb(179, 16, 116);
       font-size: 20px;
       padding: 6px;
       margin-right: 30px;
  }
  .a:hover
   {
    text-decoration: none;
     color: white;  
     background-color: rgb(12, 134, 165);
   }
   .form-group
  {
    margin-right: 350px;
    margin-top:10px ;
  }
  .form-control
   {
     width:700px;
     margin-left: 20%;
     text-align:right;
     border: 1px solid rgb(31, 162, 167);
  }
  .inputs
  {
    width: 600px;
    height:33px;
    text-align: right;
   
  }
   /*
img
 {
    width: 500px;
    margin-left: 500px;
 }*/

</style>