<body>
  <?php
  include('./class/class.php');
  session_start();
  $_SESSION = array();
  session_destroy();
  $validado = $_SESSION["usuario"] ?? false;

  if (!$validado) {
    header("location:./principal.php");
    echo "<script> Salida(); </script>";
  }

  #header('Location:login_administrador.php');

  ?>
  <script src="./sw/dist/sweetalert2.all.min.js"></script>
  <script src="./js/jquery-3.6.0.min.js"></script>
  <script src="./js/mensaje_salida.js"></script>

</body>