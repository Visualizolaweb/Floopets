<?php
 session_start();
	require_once("../Model/conexion.php");
	require_once("../Model/denuncia.class.php");
	require_once("../Model/usuarios.class.php");

	$accion = $_REQUEST["accion"];
	switch ($accion) {
		case 'c':


			$td_cod_tipo_denuncia	= $_POST["td_cod_tipo_denuncia"];
			$de_contacto 			=$_POST["de_contacto"];
			$nombre_de_contacto 	= strtolower(str_replace('ñ', 'n', $de_contacto));
			$nombre_de_contacto 	= strtolower(str_replace(' ', '', $nombre_de_contacto));
			$de_descripcion			= $_POST["de_descripcion"];
			$de_telefono  			=$_POST["de_telefono"];
			$de_nombre    			= $_POST["de_nombre"];
			//$de_imagen			=$_POST["de_imagen"];
			$de_imagen				= $_FILES['de_imagen']['name'];

			$count_galeria			= count($_FILES['de_imagen']['name']);

			try {
				if($count_galeria >= 1){
					include("Upload_de_image.php");
				}
				Gestion_denuncia::Create($td_cod_tipo_denuncia,$de_descripcion,$de_contacto,$de_telefono,$de_nombre,$de_imagen[0]);
				$mensaje = base64_encode("Su denuncia se creo exitosamente, en breve sera tomada por una fundacion.");
        		$tipo_mensaje = base64_encode("info");
            header ("Location: ../../index.php?m=$mensaje&tm=$tipo_mensaje");
			} catch (Exception $e) {
				$mensaje = "Ha ocurrido un error, el error fue :".$e->getMessage()." en ".$e->getFile()." en la linea ".$e->getLine();
			}


			break;
			case 'u':

			$de_cod_denuncia =$_POST["de_cod_denuncia"];
			$td_cod_tipo_denuncia		= $_POST["td_cod_tipo_denuncia"];
			$de_descripcion			= $_POST["de_descripcion"];
			$de_contacto  =$_POST["de_contacto"];
			$de_telefono  =$_POST["de_telefono"];
			$de_nombre = $_POST["de_nombre"];
			$de_fecha = $_POST["de_fecha"];
			$de_imagen			=$_POST["de_imagen"];
			$de_estado =$_POST["de_estado"];
			$de_cod_denuncia =$_POST["de_cod_denuncia"];

			try {
				Gestion_denuncia::Update($td_cod_tipo_denuncia,$de_descripcion,$de_contacto,$de_telefono,$de_nombre,$de_fecha,$de_imagen,$de_estado,$de_cod_denuncia);
				$mensaje = "Se actualizo exitosamente";
				$tipo_mensaje="success";
				// header("Location: ../View/dashboard.php?p=".base64_encode("denuncias")."&m=$mensaje&tm=$tipo_mensaje");
			} catch (Exception $e) {
				$mensaje = "Ha ocurrido un error, el error fue :".$e->getMessage()." en ".$e->getFile()." en la linea ".$e->getLine();
			}
			header("Location: ../View/dashboard.php?p=".base64_encode("denuncias")."&m=$mensaje&tm=$tipo_mensaje");
				// header("Location: ../View/Gestion_denuncia.php?m= ".$mensaje );
				break;

		case 'd':
			try {
          $denuncia = Gestion_denuncia::Delete($_REQUEST["dn"]);
          $msn  = "se elimino correctamente";
					$tmsn = "success";
          header("Location: ../View/dashboard.php?p=".base64_encode("denuncias")."&m=".base64_encode($msn)."&tm=".base64_encode($tmsn));
        } catch (Exception $e) {
          $msn = "error:".$e->getMessage()." en ".$e->getFile()." en la linea ".$e->getLine();
					$tmsn = "error";
          header("Location: ../View/dashboard.php?p=".base64_encode("denuncias")."&m=".base64_encode($msn)."&tm=".base64_encode($tmsn));
        }
      break;

	case 'tomar':
			$denuncia =  Gestion_denuncia::ReadbyID(base64_decode($_REQUEST["dn"]));
			 $gs = Gestion_usuarios::Mi_Organizacion($_SESSION["usu_cod_usuario"]);
			 $org_cod_organizacion	= $gs[1];
			 // $de_cod_denuncia 			=$_POST["de_cod_denuncia"];

			 $de_estado = "tomado";


			try {

				Gestion_denuncia::Tomardenuncia($denuncia[0], $org_cod_organizacion);
			 Gestion_denuncia::Updateestado($de_estado,$denuncia[0]);
				$mensaje = "Se creo exitosamente";
			} catch (Exception $e) {
				$mensaje = "Ha ocurrido un error, el error fue :".$e->getMessage()." en ".$e->getFile()." en la linea ".$e->getLine();
			}
			 header("Location: ../View/dashboard.php?p=".base64_encode("Gestion_denuncia"));

			break;
	}

 ?>
