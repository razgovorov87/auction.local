<?php 
require '../db.php'; 

R::nuke();
unset($_SESSION['logged_user']);
header('Location: ../index.php')
?>