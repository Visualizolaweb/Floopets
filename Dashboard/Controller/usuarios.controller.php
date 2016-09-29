<?php
	require_once("../Model/conexion.php");
	require_once("../Model/usuarios.class.php");
	

	$accion = $_REQUEST["accion"];
	switch ($accion) {
		case 'c':

			// $usu_cod_usuario		= $_POST["usu_cod_usuario"];
			$usu_cod_usuario				=$_POST["usu_cod_usuario"];
			$usu_nombre 						= $_POST["usu_nombre"];
			$usu_apellido 					=$_POST["usu_apellido"];
			$usu_email							=$_POST["usu_email"];
			$nombre_usu_imagen 	= strtolower(str_replace('ñ', 'n', $usu_email));
			$nombre_usu_imagen 	= strtolower(str_replace(' ', '', $nombre_usu_imagen));
			$usu_telefono						=$_POST["usu_telefono"];
			$cod_rol								=$_POST["cod_rol"];
			$usu_clave							=$_POST["usu_clave"];
			$usu_cedula							=$_POST["usu_cedula"];
			$usu_imagen   			= $_POST["usu_imagen"];
			$count_galeria		= count($_FILES['usu_imagen']['name']);

			try {
				if($count_galeria != ""){
					include("Upload_usu_image.php");
				}
				Gestion_usuarios::Create($usu_nombre,$usu_apellido,$usu_telefono,$usu_cedula,$usu_email,$cod_rol,$usu_clave,$usu_imagen);
				$mensaje = "Se registro exitosamente";
			} catch (Exception $e) {
				$mensaje = "Ha ocurrido un error, el error fue :".$e->getMessage()." en ".$e->getFile()." en la linea ".$e->getLine();
			}
			header("Location: ../../login.php?m=".$mensaje);

			break;

		case 'u':
				$usu_cod_usuario				=$_POST["usu_cod_usuario"];
			$usu_nombre 						= $_POST["usu_nombre"];
			$usu_apellido 					=$_POST["usu_apellido"];
			$usu_email							=$_POST["usu_email"];
			$nombre_usu_imagen 	= strtolower(str_replace('ñ', 'n', $usu_email));
			$nombre_usu_imagen 	= strtolower(str_replace(' ', '', $nombre_usu_imagen));
			$usu_telefono						=$_POST["usu_telefono"];
			// $cod_rol								=$_POST["cod_rol"];
			$usu_clave							=$_POST["usu_clave"];
			$usu_cedula							=$_POST["usu_cedula"];
			$usu_imagen   			= $_POST["usu_imagen"];

				try{
					if($usu_imagen != ""){
					include("Upload_usu_image.php");
				}
					Gestion_usuarios::Update($usu_cod_usuario,$usu_nombre,$usu_apellido,$usu_telefono,$usu_cedula,$usu_email,$usu_clave,$usu_imagen);
					$mensaje = "Se actualizo correctamente";
				}catch(Exception $e){
					$mensaje = "Ha ocurrido un error, el error fue :".$e->getMessage()." en ".$e->getFile()." en la linea ".$e->getLine();
				}
				header("Location: ../View/dashboard.php?p=".base64_encode("gestion_usuarios") );
				break;

		case 'd':
					try {
		          $user = Gestion_usuarios::Delete(base64_decode($_REQUEST["us"]));
		          $mensaje = "Se eliminó correctamente";
		          header("Location: ../View/gestion_usuarios.php?m=".$mensaje);
		        } catch (Exception $e) {
		          $msn = "error:".$e->getMessage()." en ".$e->getFile()." en la linea ".$e->getLine();
		          header("Location: ../View/dashboard.php?p=".base64_encode("mi_perfil") );
		          
		        }
		      break;

		      case 'existe_usuario':
			  	$usu_cedula = $_POST["Cc"];
			  	try{
			  		$usuario = Gestion_usuarios::ReadbyCC($usu_cedula);

			  		if(count($usuario[0]) > 0){
			  			$existe = true;
			  			$message = "Ya existe un usuario con este documento";
			  		}else{
			  			$existe = false;
			  			$message = "";
			  		}
			  	}catch(Exception $e){
			  		echo $e->getMessage();
			  	}

			  	echo json_encode(array('ue' => $existe, 'msn' => $message));

			  break;

	}

 ?>
