<?php
include('./class/class.php');
//crear el objeto de la clase Empleado
$emp = new Empleados();
//enviar los datos capturados en el formulario
$emp->insertar($_REQUEST['txtID'],$_REQUEST['txtNombre'],$_REQUEST['txtApellido'],$_REQUEST['txtContraseña']);
?>