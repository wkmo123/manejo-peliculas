<?php
include('./class/class.php');
$emp = new Empleados();
$emp->elimemple($_GET['id']);
?>