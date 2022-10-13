<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="heders.css">
        <link rel="stylesheet" href="style.css">
        <script src="jquery.js"></script>
        <script src="javascript.js"></script>
    </head>
<body>

    <nav class="menu ">
        <ul dir="rtl">
            <li><a class="menu-item fa fa-home" aria-hidden="true" href="Home.php"> الصفحة الرئيسية </a></li>
            <li><a class="menu-item fa fa-book" href="possts.php" aria-hidden="true">  رفع مجلة البحث </a></li>
            <li> <a class="menu-item fa fa-user " href="#"> الاعضاء </a>
            <ul>
                <li><a class="menu-item im" href="pay_users.php">مسؤول المجلة </a></li>
                <li><a class="menu-item im" href="pay_editor.php">رئيس المجلة</a></li>
                <li><a class="menu-item im" href="information_tight.php">المحكمين</a></li>
            </ul>
            </li>
            <li> <a class="menu-item fa fa-envelope-o" href="helps.php" aria-hidden="true"> اتصل بناء </a> </li>
            <li><a class="menu-item item fa fa-user-o" href="recode.php" aria-hidden="true">  أنشاء حساب </a> </li>
           
        </ul>
    </nav>
 
</body>
</html>
<style>
.im
{
    color: white;
    background-color: #343a40;
    width:150px;
    padding-left:10px;
}
ul li ul li
{
    display: none;
}
ul li:hover ul li
{
    display: block; 
}
.item
{
    margin-right: 550px;
    background-color:rgb(31, 162, 167) ;
    padding: 18px;
    height: 60px;
    margin-top: 10px;
    border-radius: 10px;
}
</style>

