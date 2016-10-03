<?php
require_once("Dashboard/Model/conexion.php");
require_once("Dashboard/Model/animal-copy.class.php");

$animales = Gestion_animal::paraAdoptarbyPet($_POST["tipo_animal"]);

if(count($animales)<=0){
  echo "En este momento y por fortuna no hay ningun ".$_POST["tipo_animal"]." para adoptar";
}
foreach ($animales  as $row) {
?>

  <div class="item col m4">
    <div class="mascota">
      <img src="Dashboard/View/img/imagen_animal/<?php echo $row["ani_carpeta"]."/".$row["ani_imagen"]?>">
    </div>
    <div class="detalle">
      <h5><?php echo $row["ani_nombre"]; ?></h5>
      <p>Edad: <?php echo $row["ani_edad"]; ?></p>
     <?php echo "<a class='btn waves-effect blue lighten-3' href='Dashboard/Controller/animal.controller.php?an=".base64_encode($row["ani_cod_animal"])."&accion=enproceso'>Adoptar</a>" ; ?>
    </div>
  </div>
<?php
}
?>
