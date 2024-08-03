<?php
session_start();
include("./class/class.php");
class Login
{
    public function validarAdmin($user, $pass)
    {
        $sql = "select * from administrador where id='$user'";
        $res = mysqli_query(Conexion::con(), $sql);
        if ($row = mysqli_fetch_array($res)) {

            $sql = "select * from administrador where id='$user' and contraseña='$pass'";
            $res = mysqli_query(Conexion::con(), $sql);
            if ($row = mysqli_fetch_array($res)) {
                //creamos la variable de sesion
                $_SESSION['usuario'] = $row['id'];

                echo "<script type='text/javascript'>
    Swal.fire({
        icon: 'success',
        title: 'BIENVENIDO $user',
        text: 'Al Sistema',
    }).then((result)=>{
        if(result.isConfirmed){
            window.location='./administrador.php';
        }
    });
    </script>";
            } else {
                echo "<script type='text/javascript'>
    Swal.fire({
        icon: 'error',
        title: 'ERROR!!!',
        text: 'Usario o contraseña fallida',
    }).then((result)=>{
        if(result.isConfirmed){
            window.location='./principal.php';
        }
    });
    </script>";
            }
        } else {
            echo "<script type='text/javascript'>
    Swal.fire({
        icon: 'error',
        title: 'ERROR!!!',
        text: 'No existe el usuario $user',
    }).then((result)=>{
        if(result.isConfirmed){
            window.location='./principal.php';
        }
    });
</script>";
        }
    }
    public function validarEmpleado($user, $pass)
    {
        $sql = "select * from empleado where id='$user'";
        $res = mysqli_query(Conexion::con(), $sql);
        if ($row = mysqli_fetch_array($res)) {

            $sql = "select * from empleado where id='$user' and contraseña='$pass'";
            $res = mysqli_query(Conexion::con(), $sql);
            if ($row = mysqli_fetch_array($res)) {
                //creamos la variable de sesion
                $_SESSION['usuario'] = $row['id'];

                echo "<script type='text/javascript'>
    Swal.fire({
        icon: 'success',
        title: 'BIENVENIDO $user',
        text: 'Al Sistema',
    }).then((result)=>{
        if(result.isConfirmed){
            window.location='./iniciar.php';
        }
    });
    </script>";
            } else {
                echo "<script type='text/javascript'>
    Swal.fire({
        icon: 'error',
        title: 'ERROR!!!',
        text: 'Usario o contraseña fallida',
    }).then((result)=>{
        if(result.isConfirmed){
            window.location='./index.php';
        }
    });
    </script>";
            }
        } else {
            echo "<script type='text/javascript'>
    Swal.fire({
        icon: 'error',
        title: 'ERROR!!!',
        text: 'No existe el usuario $user',
    }).then((result)=>{
        if(result.isConfirmed){
            window.location='./index.php';
        }
    });
    </script>";
        }
    }
}
?>

<body>
    <script src="./sw/dist/sweetalert2.all.min.js"></script>
</body>