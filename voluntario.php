<?php
require_once("Dashboard/Model/conexion.php");
require_once("Dashboard/Model/organizacion.class.php");
$organizacion = Gestion_organizacion::ReadAll();
 ?>
 <link type="text/css" rel="stylesheet" href="WebFloopets/materialize/css/materialize.css"  media="screen,projection"/>
 <meta charset="utf-8">
 <script type="text/javascript" src="WebFloopets/materialize/js/materialize.js"></script>

 <div class="container">

<div class="row">
		<form class="col s12" id="form" action="Dashboard/Controller/voluntarios.controller.php" method="POST" enctype="multipart/form-data">
        <h3 class="center">Registra tus Datos para Ser Voluntario</h3>


        <div class="row">
					<div class="input-field col s4">
            <input type="text" name="vo_cod_voluntario" required>
						<label >Cédula</label>
					</div>
					<div class="input-field col s4">
            <input type="text" name="vo_nombre" required>
						<label>Nombre</label>
					</div>
				  <div class="input-field col s4">
            <input type="number" name="vo_telefono" required>
						<label >Teléfono</label>

					</div>
        </div>
				  <div class=>
						<label class="">Dirección</label>
						<input class="input-field col s3" type="text" name="vo_direccion" required>
					</div>

					<div class="input-field col s12 m6 l6" style="z-index:1;">
    				<select name="org_cod_organizacion">
    					<option value="" disabled selected>Organizacion</option>
    					<?php
    							foreach ($organizacion as $row){
    									echo "<option value='".$row["org_cod_organizacion"]."'>".$row["org_nombre"]."</option>";
    							}
    					 ?>
    				</select>
			    </div>
					<div class=" form-group file-field input-field col s12 m6">
				       <div class="btn">
				         <label class="form-label">Galeria</label>
				         <input type="file" multiple name="vo_imagen[]" class="form-control">
				       </div>
				       <div class="file-path-wrapper form-group">
				         <input class="form-control file-path validate"  type="text" placeholder="" name="vo_imagen" >
				       </div>
				    </div>
					<div class="form-group">
						<button name="accion" value="c" class="btn btn-primary">Registrar</button>
					</div>
				</form>
			</div>
		</div>


</body>
<script type="text/javascript">
	$('select').material_select();

</script>
</html>