<?php


$host='localhost';
$usr='root';
$db='myproject';
$conn=mysqli_connect($host,$usr,$pass,$db);
@$show=mysqli_query($conn,"SELECT * FROM information_tight WHERE Evaluation='ch1.pdf' ");
@$result=mysqli_fetch_assoc($show);
$idname=$result['Evaluation'];
echo "<input type='file' value='$idname' name='Names'> ";


?>