<?php
	require_once("../Model/conexion.php");
	require_once("../Model/tipo_organizacion.class.php");
	$tp=Gestion_tipo_organizacion::ReadAll();
?>
<h2 class="center">Registrar Organización</h2>
<div class="row">
	<form id="form" class="col s12" action="../Controller/organizacion.controller.php" method="POST" enctype="multipart/form-data">
  		<div class="row">
				<div class="row">
					<div class="input-field col s12">
						<!-- <input type="text" name="to_cod_tipo_organizacion" value="<?php echo $tp["to_cod_tipo_organizacion"]?>" hidden> -->

						<select name="to_cod_tipo_organizacion" required>
							<?php
								foreach ($tp as $row) {
							?>
							<option value="<?php echo $row["to_cod_tipo_organizacion"] ?>" ><?php echo $row["to_nombre"] ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input type="text" name="org_nombre" id="org_nombre" required>
						<label for="org_nombre">Nombre Organizacion</label>
					</div>
				</div>
				<div class="row">
        	<div class="input-field col s12">
          <textarea id="textarea" class="materialize-textarea" name="org_descripcion"></textarea>
          <label for="textarea">Descripcion fundacion</label>
      </div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6 l6">
						<input type="email" name="org_email" id="org_email" required>
								<label for="org_email">Correo Electronico</label>
	        </div>
					<div class="input-field col s12 m6 l6">
						<input type="number" name="org_telefono" id="org_telefono" required>
								<label for="org_telefono">Telefono</label>
	        </div>
					<div class="input-field col s12 m6 l6">
						<input type="text" name="org_nit" id="org_nit" required>
								<label for="org_nit">Nit</label>
	        </div>
					<div class="input-field col s12 m6 l6">
						<input type="text" name="org_direccion" id="org_direccion" required>
								<label for="org_direccion">Direccion</label>
	        </div>

   <div class="file-field input-field col s12 m6">
       <div class="btn">
         <span>Logo</span>
         <input type="file"  name="org_logo[]">
       </div>
       <div class="file-path-wrapper">
         <input class="file-path validate"  type="text" placeholder="Puede subir mas de una imagen" name="org_logo"  >
       </div>
       </div>
				</div>
				<a href="<?=$_SERVER['HTTP_REFERER'] ?>" class="waves-effect waves-light btn red darken-1 left">Cancelar</a>
				<button class="waves-effect waves-light  btn right cyan darken-1" name="accion" value="c" style="margin-right: 50px;">Registrar</button>
  		</div>
	</form>
</div>
