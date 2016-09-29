<?php
  require_once ("../Model/conexion.php");
  require_once ("../Model/organizacion.class.php");
  require_once ("../Model/adopcion.class.php");
  require_once ("../Model/animal.class.php");
  
  $organizacion=Gestion_organizacion::ReadbyID($_SESSION["org_cod_organizacion"]);
  $adopciones=Gestion_adopcion::Readbyorg_cod($_SESSION["org_cod_organizacion"]);
  $animal=Gestion_animal::Nombresraza($_SESSION["org_cod_organizacion"]);

  // print_r($animal);
  
  // print_r($organizacion);
  // print_r($adopciones);
?>
<div class="row">
  <div class="col12">
    <h4 class="center"><?php echo $organizacion[2];?></h4>
    

    <div class="col s6 ayuda">
      <h5 class="center">Mascotas para adopcion</h5>
      <?php
        foreach ($animal as $fila) {
          ?>
          <div class="row" >
            <div class="col s12 mascotas">
              <div class="col s5">
                <p>Mascota: <?php echo $fila[2]?></p>
                <p>Raza: <?php echo $fila[14]?></p> 
                <p>Esterilizado: <?php echo $fila[5]?></p>
              </div>
              <div class="col s5">
                <p>Descripcion: <?php echo $fila[7]?></p>
                <p>Sexo: <?php echo $fila[9]?></p>
                <a href="#" class="waves-effect btn">ver mas</a>
              </div>

            </div>
          </div>
          <?php
        }
      ?>
    </div>
    <div class="col s6">
      <h5 class="center">Voluntarios</h5>
    </div>
  </div>

</div>
