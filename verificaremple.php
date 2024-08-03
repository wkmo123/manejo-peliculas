<?php
include("./class/class_log.php");
$useremple=$_REQUEST['usuarioemple'];
$passemple=$_REQUEST['contraemple'];
$ver->validarEmpleado($useremple,$passemple);
?>