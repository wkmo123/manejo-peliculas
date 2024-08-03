
$consulta3 = db_query("SELECT id, color FROM banderas");


$query3 = 'SELECT nombre FROM carros';
    $resultado3 = mysqli_query($db,$query3);
    $arreglo_carros = array("seleccione el carro");
    while($res = mysqli_fetch_assoc($resultado3)){
        array_push($arreglo_carros,$res{['modelo']});
    }
    $sel_id_carros = crearselectorevento("id_banderas","$id_categoriaaux",$arreglo_carros,TRUE,'onchange="ruta(3);"');


    $str.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$sel_id_fecha&nbsp;&nbsp;&nbsp;$sel_id_animales&nbsp;&nbsp;$str_fecha&nbsp;&nbsp;&nbsp$sel_id_banderas";
    $str.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$sel_id_fecha&nbsp;&nbsp;&nbsp;$sel_id_animales&nbsp;&nbsp;$str_fecha&nbsp;&nbsp;&nbsp$sel_id_banderas";
