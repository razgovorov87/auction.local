<?php 
require '../db.php';

$car = R::dispense('cars');
$car->title = '';
$car->description = '';
$car->number = '';
R::store($car);
header('Location: ../panel.php');
 ?>