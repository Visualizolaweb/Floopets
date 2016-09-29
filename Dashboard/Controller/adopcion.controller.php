<?php
	require_once("../Model/conexion.php");
	require_once("../Model/adopcion.class.php");

	$accion = $_REQUEST["accion"];
	switch ($accion) {
		case 'c':
			$usu_cod_usuario 		= $_POST["usu_cod_usuario"];
			$nombre_adopcion 		= strtolower(str_replace('ñ', 'n', $usu_cod_usuario));
			$nombre_adopcion 		= strtolower(str_replace(' ', '', $nombre_adopcion));
			$ani_cod_animal 		= $_POST["ani_cod_animal"];
			$ado_imagen 			= $_POST["ado_imagen"];
			$count_galeria			= count($_FILES['ado_imagen']['name']);

			try {
				if($count_galeria != ""){
					include("Upload_ado_image.php");
				}
				Gestion_adopcion::Create($ani_cod_animal,$usu_cod_usuario,$ado_imagen);
				$mensaje = "Se registro exitosamente";
			} catch (Exception $e) {
				$mensaje = "Ha ocurrido un error, el error fue :".$e->getMessage()." en ".$e->getFile()." en la linea ".$e->getLine();
			}
			header("Location: ../View/dashboard.php?p=".base64_encode("historial_adopciones")."&m=$mensaje");

			break;

		case 'u':

			$ado_fecha = $_POST["ado_fecha"];

			$nombre_cod_animal 	= strtolower(str_replace('ñ', 'n', $ani_cod_animal));
			$nombre_cod_animal 	= strtolower(str_replace(' ', '', $nombre_cod_animal));
			$ado_imagen = $_POST["ado_imagen"];
			$count_galeria			= count($_FILES['ado_imagen']['name']);
			$ani_cod_animal = $_POST["ani_cod_animal"];
			$usu_cod_usuario = $_POST["usu_cod_usuario"];
			$ado_cod_adopcion = $_POST["ado_cod_adopcion"];

				try{
					if($count_galeria >= 1){
					include("Upload_ado_image.php");
				}
					Gestion_adopcion::Update($ani_cod_animal,$usu_cod_usuario,$ado_fecha,$ado_imagen,$ado_cod_adopcion);
					$mensaje = "Se actualizo correctamente";
				}catch(Exception $e){
					$mensaje = "Ha ocurrido un error, el error fue :".$e->getMessage()." en ".$e->getFile()." en la linea ".$e->getLine();
				}
				header("Location: ../View/dashboard.php?p=".base64_encode("historial_adopciones")."&m=".$mensaje);
				break;

		case 'd':
					try {
		          $adopcion = Gestion_adopcion::Delete($_REQUEST["ad"]);
		          $mensaje = "Se eliminó correctamente";
		          header("Location: ../View/dashboard.php?p=".base64_encode("historial_adopciones"));
		        } catch (Exception $e) {
		          $msn = "error:".$e->getMessage()." en ".$e->getFile()." en la linea ".$e->getLine();
		          header("Location: ../View/dashboard.php?p=".base64_encode("historial_adopciones")."&m".$mensaje);
		        }
		      break;

	}

 ?>
