<!-- contenedor de perfil usuario (en pruebas) -->
<?php
  require_once ("../Model/conexion.php");
  require_once ("../Model/usuarios.class.php");
  $user_data=Gestion_usuarios::ReadbyID($_SESSION["usu_cod_usuario"]);
  $nombre_usu_imagen= strtolower(str_replace('ñ', 'n', $user_data["usu_email"]));
  $nombre_usu_imagen = strtolower(str_replace(' ', '', $nombre_usu_imagen));

?>

<form action="../Controller/usuarios.controller.php" method="POST">
<div class="row animated zoomIn">
  <h4 class="center">Mi Perfil</h4>
  <div class="col l4 s5 offset-l1">
    <!-- imagen de prueba -->
    <!-- <img src="img/imagen_evento/vacunatuchanda/5.jpg" style="max-height:400px; border-radius:5px; margin-left:30px;" /> -->
    <?php
    if ($user_data[8] == "") {
      echo"
      <img class='responsive-img' style='width:300px ;height:300px ;border-radius:10px;'
      src='../../WebFloopets/images/base.jpg'>
      ";
    }else {
      echo"
      <img class='responsive-img' style='width:300px ;height:300px ;border-radius:5px;'
      src='img/imagen_usuario/".$nombre_usu_imagen."/".$user_data[8]."'>
      ";
    }
    ?>
  </div>
  <div class="col s7 l7" style="margin-top:70px;">

      <div class="input-field col s6">
        <input type="text" name="Nombre" value="<?php echo $user_data[1]?>">
        <label for="Nombre">Nombre</label>
      </div>
      <div class="input-field col s6">
        <input type="text" name="Apellidos" value="<?php echo $user_data[2]?>">
        <label for="Apellidos">Apellidos</label>
      </div>


      <div class="input-field col s6">
        <input type="number" name="Telefono" value="<?php echo $user_data[3]?>">
        <label for="Telefono">Telefono</label>
      </div>
      <div class="input-field col s6">
        <input type="email" name="Correo" value="<?php echo $user_data[5]?>">
        <label for="Correo">Correo Electronico</label>
      </div>


      <div class="input-field col s6">
        <input type="number" name="Cedula" value="<?php echo $user_data[4]?>">
        <label for="Cedula">Cedula</label>
      </div>

        <input type="hidden" name="Tipo" value="<?php echo $user_data[9]?>">


      <div class="input-field col s12">
      <button name="accion" value="u" class="waves-effect btn">Actualizar</button>
      </div>



  </div>
</div>
</form>
