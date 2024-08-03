<?php
    include('./class/class.php');
    $admin = new Administrador();
    $image= $_FILES['img_p']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));
    $admin->InsertarPeliculas($_REQUEST['id_p'],$imgContent,$_REQUEST['txtTitulo'],$_REQUEST['txtClasificacion'],$_REQUEST['txtDuracion']);
    $admin->InsertarGenero($_POST['genero'],$_REQUEST['id_p']);
    $admin->InsertarDirector($_POST['director'],$_REQUEST['id_p']);         
?>