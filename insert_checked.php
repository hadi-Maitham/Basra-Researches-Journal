<?php
// update
/*
$database =new PDO("mysql:host=localhost;dbname=myproject;charset=utf8;","root","");

if(isset($_POST['send']))
{
  $id=$_POST['id'];
  $check=$_POST['checks'];
  $uploadFile=$database->prepare("UPDATE posts SET 	Checks='$check' WHERE ID_post=$id ");

  if($uploadFile->execute())
  {
    echo"yes";
  }
  else
  {
    echo"no";
  }
}
*/
?>
<html>
<body>
<?php
 $host='localhost';
 $usr='root';
 $pass='';
 $db='myproject';
 $conn=mysqli_connect($host,$usr,$pass,$db);
 $query="SELECT title,name_users, Concat(department,' ',	date,'--',ID_post)AS full FROM posts";
 $res=mysqli_query($conn,$query);
 echo "<table>"
 "
 <tr>
 <td>id</td>
 <td>title</td>
 <td>names</td>
 <td>option</td>
 </tr>";
 while($row=mysqli_fetch_assoc($res))
 {
 echo "<tr>
 <td><input type='checkbox' name='num[]' value='$row[0]'></td>
 <td>$row[0]</td>
 <td>$row[1]</td>
 <td>$row[2]</td>
 </tr>";
 }
 echo "<table>";
?>
</body>
</html>