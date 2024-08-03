<?php
    include('./class/class.php');
    $usuario = new Usuario();
    $usuario->insertarUsuario($_REQUEST['cedula'],$_REQUEST['nombre'],$_REQUEST['apellido'],$_REQUEST['correo'],$_REQUEST['password']);
    header("location:./login_usuario.php")
?>