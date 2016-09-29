


<?php
	require_once("../Model/conexion.php");
	require_once("../Model/tipo_evento.class.php");
	$eve = Gestion_tipo_evento::ReadAll();
?>
<script type="text/javascript">
$(document).ready(function()
    {
	//Realizamos la validacion de campos vacios
 		$("#btn").click(function() {
          //aqui el de los campos

           if($("input").val() == "" || $("select").val() == ""){
            swal("Los campos no deben ir vacios!");
            }

         });

 		
})

	
</script>
 <?php
	if(isset($_GET["m"]))
	{
		echo "<script>swal( '".$_GET["m"]."');</script>";
	}
 ?>


<div class="row">
<form class="col s12 animated zoomIn" action="../Controller/evento.controller.php" method="POST" enctype="multipart/form-data" id="form">
	<h3>Registrar Evento</h3>

	<div class="row">
		<h5 class="center grey lighten-4">Fecha y Hora del Evento</h5>
		<div class="input-field col s3">
				<label>Fecha Inicio</label><br>
				<input type="date" name="eve_fecha" min="<?php echo date('Y-m-d');?>" id="fecha_inicio" >
		</div>
		<div class="input-field col s3">
				<label>Hora Inicio</label><br>
				<input type="time" name="eve_hora" >
		</div>

		<div class="input-field col s3">
			<label>Fecha Fin</label><br>
			<input type="date" name="eve_fecha_hasta" min="<?php echo date('Y-m-d');?>" id="fecha_fin">
		</div>
		<div class="input-field col s3">
				<label>Hora Fin</label><br>
				<input type="time" name="eve_hora_hasta" >
		</div>

	</div>

	<div class="row">
        <div class="input-field col s6">

					<select  name="te_cod_tipo_evento" >
						<option value="" disabled selected>Seleccione el Tipo de Evento</option>
							<?php
								foreach ($eve as $row) {
									echo "<option value = '".$row["te_cod_tipo_evento"]."'>".$row["te_nombre"]."</option>";
								}
							 ?>
					</select>
        </div>
        <div class="input-field col s6">
					<label>Titulo del Evento</label>
					<input type="text" name="eve_nombre" >
        </div>
      </div>

			<div class="row">
				<div class="input-field col s6">
					<label>Dirección</label>
					<input type="text" name="eve_direccion"  placeholder="Use # y -">
				</div>
			</div>

		<div class="row">
			<div class="input-field col s6">
						 <textarea id="textarea1" class="materialize-textarea"  name="eve_descripcion" ></textarea>
						 <label for="textarea1">Descripción del Evento</label>
					 </div>

					<!-- <input type="hidden" value="" name="Geo_x" id="ltn">
								<input type="hidden" value="" name="Geo_y" id="lng"> -->
						<div class="input-field col s16">
							<select id="first_name" type="text" class="validate" required name="eve_estado">
								<option value=""disabled selected>Seleccione un Estado</option>
								<option value="pendiente">Pendiente</option>
								<option value="publicado">Publicado</option>
								<option value="terminado">Terminado</option>
							</select>
						</div>
		</div>
		<div class="row">
			<div class="file-field col s6">
			    <div class="btn">
			      <span>Adjuntar Imágenes</span>
			      <input type="file" name="eve_imagen[]">
			    </div>
			    <div class="file-path-wrapper">
			      <input class="file-path validate" type="text" name="eve_imagen"  >
			    </div>
			  </div>
			<div class="col s6 center">
				<button name="accion" value="c" class="btn btn-primary" id="btn">Guardar</button>
			</div>
		</div>

</form>
</div>
