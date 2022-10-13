<?php
session_start();
session_destroy();
header("location:Home.php?logout=you are sucessfully logout!");
?>