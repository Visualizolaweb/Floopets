<?php

require_once("../Model/conexion.php");
require_once("../Model/tipo_evento.class.php");
$tipo_evento=Gestion_tipo_evento::ReadAll();
 ?>

<table>
	<thead>
		<tr>
			<td>Cod tipo evento</td>
			<td>Nombre evento</td>
			<td>Estado</td>
      <td>acciones</td>
		</tr>
		<tbody>
			<?php
			@$mensaje = $_REQUEST["m"];

			echo @$mensaje;

			foreach ($tipo_evento as $row) {
				echo"<tr>
						<td>".$row["te_cod_tipo_evento"]."</td>
						<td>".$row["te_nombre"]."</td>
						<td>
                    		<a href='../View/editar_tipo_evento.php?ui=".base64_encode($row["te_cod_tipo_evento"])."'>actualizar</a>

                    		<a href='../Controller/tipo_evento.controller.controller.php?ui=".base64_encode($row["te_cod_tipo_evento"])."&accion=d'>eliminar</a>

					</tr>";
			}

			 ?>
		</tbody>
	</thead>
</table>
