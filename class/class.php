<?php
class Conexion{
    public static function con(){
        $host="localhost";
        $user="root";
        $pass="";
        $dbname="cine_ud";
        //realizamos la conexion a la bd
        $link=mysqli_connect($host,$user,$pass)
        or die ("ERROR AL CONECTAR LA BD".mysqli_error($link));
        //SETEAR LA bd
        mysqli_query($link,"SET NAMES 'utf8'");
        //seleccionamos la bd
        mysqli_select_db($link,$dbname)
        or die ("ERROR AL SELECCIONAR LA BD".mysqli_error($link));
        return $link;  
    }
}
class Administrador{
    private $admin;
    public function __construct(){
        $this->admin=array();
    }
    public function InsertarPeliculas($id,$imagen,$titulo,$clasificacion,$duracion){
        $sql="insert into pelicula values($id,'$imagen','$titulo','$clasificacion','$duracion');";
        $res=mysqli_query(Conexion::con(),$sql);
        echo "<script type='text/javascript'>
    Swal.fire({
        icon: 'success',
        title: 'Operacion Exitosa',
        text: 'Se inserto el empleado con id',
    }).then((result)=>{
        if(result.isConfirmed){
            window.location='./inicio.php';
        }
    });
    </script>";
    }
    public function verGenero(){
      $sql="select * from genero";
      $res=mysqli_query(Conexion::con(),$sql);
      //recorrer la tabla empleados y almacenarla en el vector
      while($row=mysqli_fetch_array($res)){
        $this->admin[]=$row;
      }
      return $this->admin;
     }
     public function verDirector(){
      $sql="select * from director";
      $res=mysqli_query(Conexion::con(),$sql);
      //recorrer la tabla empleados y almacenarla en el vector
      while($row=mysqli_fetch_array($res)){
        $this->admin[]=$row;
      }
      return $this->admin;
     }
    public function InsertarGenero($id_g,$id_p){
      $id=$id_g*15+random_int(1,1000);
        $sql="insert into peli_genero values($id,$id_p,$id_g)";
        $res=mysqli_query(Conexion::con(),$sql);
      echo "<script type='text/javascript'>
      Swal.fire({
          icon: 'success',
          title: 'Operacion Exitosa',
          text: 'Se inserto el genero con id $id_g',
      }).then((result)=>{
          if(result.isConfirmed){
          }
      });
      </script>";
    }
    public function InsertarDirector($id_d,$id_p){
      $id=$id_d*6+random_int(1,1000);
        $sql="insert into director_pelicula values($id,$id_p,$id_d)";
        $res=mysqli_query(Conexion::con(),$sql);
        echo "<script type='text/javascript'>
      Swal.fire({
          icon: 'success',
          title: 'Operacion Exitosa',
          text: 'Se inserto el director con id $id_d',
      }).then((result)=>{
          if(result.isConfirmed){
              window.location='./administrar_peliculas.php';
          }
      });
      </script>";
    }
    public function VerPeliculas(){
       $sql ="select * from pelicula pe";
       $res=mysqli_query(Conexion::con(),$sql);
       while($row=mysqli_fetch_array($res)){
        $this->admin[]=$row;
      }
      return $this->admin;
    }
}
class Empleados{
    private $emple;
    public function __construct(){
     $this->emple=array();
    }
 //insertar empleados 
 
 public function insertar($id,$n,$a,$contra){
     $sql="insert into empleado values($id,'$n','$a','$contra')";
     $res=mysqli_query(Conexion::con(),$sql);
     echo "<script type='text/javascript'>
     Swal.fire({
         icon: 'success',
         title: 'Operacion Exitosa',
         text: 'Se inserto el empleado con id $id',
     }).then((result)=>{
         if(result.isConfirmed){
             window.location='./inicio.php';
         }
     });
     </script>";
    }
    // Ver empleados
    public function veremple(){
     $sql="select * from empleado";
     $res=mysqli_query(Conexion::con(),$sql);
     //recorrer la tabla empleados y almacenarla en el vector
     while($row=mysqli_fetch_array($res)){
       $this->emple[]=$row;
     }
     return $this->emple;
    }
    //editar empleados
 
    public function editemple($id,$n,$a,$contra){
     $sql="update empleado set nombre='$n',apellido='$a',contraseña='$contra' where id=$id";
     $res=mysqli_query(Conexion::con(),$sql);
     echo "<script type='text/javascript'>
        Swal.fire({
          icon : 'success',
          title : 'Exito!!',
          text : 'El empleado con id $id fuen modificado Correctamente'
        }).then((result) => {
         if (result.isConfirmed) {
          window.location='./inicio.php'  
         }
       });
     </script>";
    }
 
    public function get_emple_id($id){
     $sql="select * from empleado where id=$id";
     $res=mysqli_query(Conexion::con(),$sql);
     if($reg=mysqli_fetch_assoc($res)){
       $this->emple[]=$reg;
     }
  return $this->emple;
    }
 
    public function elimemple($id){
     $sql="delete from empleado where id=$id";
     $res=mysqli_query(Conexion::con(),$sql);
     echo "<script type='text/javascript'>
        Swal.fire({
          icon : 'success',
          title : 'Operacion Exitosa!!',
          text : 'El empleado con id $id fue eliminado Correctamente'
        }).then((result) => {
         if (result.isConfirmed) {
          window.location='./inicio.php'  
         }
       });
     </script>";
    }
 }
 class Usuario{
    private $usuario;
    public function __construct(){
     $this->usuario=array();
    }
    public function insertarUsuario($cedula,$nombre,$apellido,$correo,$contraseña){
        $sql = "insert into usuario values($cedula,'$nombre','$apellido','$correo','$contraseña')";
        $res = mysqli_query(Conexion::con(),$sql);
        echo "<script type='text/javascript'>
     Swal.fire({
         icon: 'success',
         title: 'Operacion Exitosa',
         text: 'Se inserto el empleado con id $cedula',
     }).then((result)=>{
         if(result.isConfirmed){
             window.location='./inicio.php';
         }
     });
     </script>";
    }
    // Ver usuario
    public function verusuario(){
     $sql="select * from usuario";
     $res=mysqli_query(Conexion::con(),$sql);
     //recorrer la tabla empleados y almacenarla en el vector
     while($row=mysqli_fetch_array($res)){
       $this->usuario[]=$row;
     }
     return $this->usuario;
    }
    //editar usuario
 
    public function editusuario($id,$n,$a,$contra){
     $sql="update usuario set nombre='$n',apellido='$a',contraseña='$contra' where id=$id";
     $res=mysqli_query(Conexion::con(),$sql);
     echo "<script type='text/javascript'>
        Swal.fire({
          icon : 'success',
          title : 'Exito!!',
          text : 'El empleado con id $id fuen modificado Correctamente'
        }).then((result) => {
         if (result.isConfirmed) {
          window.location='./inicio.php'  
         }
       });
     </script>";
    }

    public function get_usuario_id($id){
     $sql="select * from usuario where id=$id";
     $res=mysqli_query(Conexion::con(),$sql);
     if($reg=mysqli_fetch_assoc($res)){
       $this->emple[]=$reg;
     }
  return $this->emple;
    }
 
    public function elimusuario($id){
     $sql="delete from usuario where id=$id";
     $res=mysqli_query(Conexion::con(),$sql);
     echo "<script type='text/javascript'>
        Swal.fire({
          icon : 'success',
          title : 'Operacion Exitosa!!',
          text : 'El usuario con id $id fue eliminado Correctamente'
        }).then((result) => {
         if (result.isConfirmed) {
          window.location='./inicio.php'  
         }
       });
     </script>";
    }
    
 }
?>
<script src="./js/funciones.js"></script>
    <script src="./sw/dist/sweetalert2.all.min.js"></script>