<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<form action="../Controller/donacion.controller.php" method="POST" enctype="multipart/form-data">
	<h1>Registrar donacion</h1>
	<div class="form-group">
		<label>descripcion</label>
		<input type="text" name="don_descripcion"></input>
	</div>
    <div class="form-group">
        <label>fecha</label>
        <input type="date" name="don_fecha"></input>
    </div>
    <div class="file-field input-field col s12 m6">
       <div class="btn">
         <span>imagen</span>
         <input type="file" multiple name="Imagen_Upload[]">
       </div>
       <div class="file-path-wrapper">
         <input class="file-path validate"  type="text" placeholder="" name="don_imagen">
       </div>
    </div>

		<div class="form-group">
                        <select  Required name="org_cod_organizacion">
                            <option value="" disabled selected>organizacion</option>
                            <?php
                                 // Cargo la bd
                                 require_once("../Model/conexion.php");
                                // Cargo la clase tipo empresa
                                require_once("../Model/organizacion.class.php");

                                 $organizacion = Gestion_organizacion::ReadAll();

                                foreach ($organizacion as $row){
                                    echo "<option value='".$row["org_cod_organizacion"]."'>".$row["nombre"]."</option>";
                                }
                             ?>
                        </select>
                        <label></label>
                    </div>
                    <div class="form-group">
                        <select  Required name="td_cod_tipo_donacion">
                            <option value="" disabled selected>tipo donacion</option>
                            <?php
                                 // Cargo la bd
                                 require_once("../Model/conexion.php");
                                // Cargo la clase tipo donacion
                                require_once("../Model/tipo_donacion.class.php");

                                 $tipo_donacion = Gestion_tipo_donacion::ReadAll();

                                foreach ($tipo_donacion as $row){
                                    echo "<option value='".$row["td_cod_tipo_donacion"]."'>".$row["nombre"]."</option>";
                                }
                             ?>
                        </select>
                        <label></label>
                    </div>
                    <div class="form-group">
                        <select  Required name="usu_cod_usuario">
                            <option value="" disabled selected>usuario</option>
                            <?php
                                 // Cargo la bd
                                 require_once("../Model/conexion.php");
                                // Cargo la clase tipo empresa
                                require_once("../Model/usuarios.class.php");

                                 $usuarios = gestion_usuarios::ReadAll();

                                foreach ($usuarios as $row){
                                    echo "<option value='".$row["usu_cod_usuario"]."'>".$row["nombre"]."</option>";
                                }
                             ?>
                        </select>
                        <label></label>
                    </div>
	<div class="form-group">
		<button name="accion" value="c" class="btn btn-primary">Registrar</button>
	</div>
</form>
