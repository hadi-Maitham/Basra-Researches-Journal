<?php
include 'heder_post.php';
?>
 <?php
 
 session_start();
 if(isset($_SESSION['users']))
 {
   if($_SESSION['users']->typeuser=="4")
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
<title>رفع مجلة البحث </title>
<meta charset="utf-8">
<link rel="stylesheet" href="upost.css">
<link rel="stylesheet" href="style.css">
<script src="jquery.js"></script>
<script src="javascript.js"></script>

</head>
<body>
<div class="wrapper">
        <form  method="POST" enctype="multipart/form-data" action="insert_posts.php" >

            <div class="field form-group">
             <input type="text" required  name="title" placeholder="عنوان البحث "  class="form-control title">
            </div>
            <input type="file" name="file" class="File" accept=".pdf"  id="file">
            <input type="file" name="loading" class="File" accept=".pdf" id="loading" /> <lable>ملف بدون الاسم</lable>

            <div class="selection">
            <select class="form-control select" required name="dept">
            <?php
                      $host='localhost';
                      $usr='root';
                      $db='myproject';
                      $conn=mysqli_connect($host,$usr,$pass,$db);
                      $query1="SELECT * FROM department";
                     $rows1=$conn->query($query1);
                     if($rows1)
                     {
                       $no1=$rows1->num_rows;
                       for($i=0;$i<$no1;$i++)
                       {
                         $ro1=$rows1->fetch_assoc();
                         $id=$ro1['ID_dept'];
                         $name=$ro1['name_dept'];
                        echo "<option value=$id>$name</option>";
                         
                       }
                     }
                     ?>
             </select>
            </div> 
            <!--------------------------------------------->
            <select class="form-control select" required name="privatess">
            <?php
                      $host='localhost';
                      $usr='root';
                      $db='myproject';
                      $conn=mysqli_connect($host,$usr,$pass,$db);
                      $query2="SELECT * FROM privates";
                     $rows2=$conn->query($query2);
                     if($rows2)
                     {
                       $no2=$rows2->num_rows;
                       for($i=0;$i<$no2;$i++)
                       {
                         $ro2=$rows2->fetch_assoc();
                         $name=$ro2['name_private'];
                        echo "<option>$name</option>";
                         
                       }
                     }
                     ?>
             </select>
            </div> 
            <!---
            <div class="container custom-file">
                <input type="file" required name="file"  accept=".docx,.pdf" class="custom-file-input">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
               -->
               
                   <select name="idname" id="select">
                     <?php
                     $host='localhost';
                     $usr='root';
                     $db='myproject';
                     $conn=mysqli_connect($host,$usr,$pass,$db);
                     @$pemail=$_SESSION['login_email'];
                     @$show=mysqli_query($conn,"SELECT * FROM records WHERE Email='$pemail'");
                     @$result=mysqli_fetch_assoc($show);
                     $idsa=$result['ID'];
                     $idname=$result['Name'];
                     echo "<option value=$idsa></option>";
                     echo "<input type='text' value='$idname' name='idNames' class='Name'> ";
                     ?>
                   </select>  
        <!---------------------------------------------->
                   
               <!---
               <div class="field form-group">
                <input type="text" required   name="author" placeholder=" اسماء الباحثين "  class="form-control">
               </div>
               -->
                      <!---------
               <div class="field form-group">
                <input type="text" required  name="privatess" placeholder="  التخصص الدقيق "  class="form-control">
               </div>
                     --->
               <div class="field form-group">
                <input type="text" required  name="methodss" placeholder=" طريقة البحث "  class="form-control">
               </div>

               <div class="field form-group">
                <input type="email" required  name="Email" placeholder=" الأيميل "  class="form-control">
               </div>

               <div class="field form-group">
                <input type="tetx" required  name="keyword" placeholder=" الكلمات المفتاحية "  class="form-control">
               </div>

               <div class="form-group">
                <textarea dir="rtl" class="form-control" name="authors" required  placeholder=" الملخص العربي"  rows="5"></textarea>
                </div>

                <div class="form-group">
                <textarea dir="rtl" class="form-control" name="summarys" required  placeholder=" الملخص الأنكليزي"  rows="5"></textarea>
                </div>
            

               <div class="field fil form-group">
                <input type="submit" value="أرسال" name="send"  class="form-control cont" >
              </div> 

               
        </form>  
     </div>
 
</body>
</html>
<style>

 #select
 {
    display:none;
 }
 
 .Name
 {
    display:none; 
 }

 .cont
 {
  background-color: rebeccapurple;
  color: white;
 }
 .File
 {
     width:700px;
     margin-top: 10px;
 }
 .select
{
    width: 700px;
    margin-left: 270px;
    margin-top: 10px;
}
#loading
{
    margin-left: 270px;
    border: 1px solid rebeccapurple;
}
 
</style>

