<?php

class Gestion_denuncia{
	//Metodo create()
	//El metodo create guarda los datos en la tabla contactos, captura todos los parametros desde el  formulario

	function Create($td_cod_tipo_denuncia,$de_descripcion,$de_contacto,$de_telefono,$de_nombre,$de_imagen){

		//Instanciamos y nos conectamos a la bd
		$Conexion = floopets_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//Crear el query que vamos a realizar
		$consulta = "INSERT INTO denuncia (td_cod_tipo_denuncia,de_descripcion,de_contacto,de_telefono,de_nombre,de_fecha,de_imagen,de_estado) VALUES (?,?,?,?,?,now(),?,'Pendiente')";

		$query = $Conexion->prepare($consulta);
		$query->execute(array($td_cod_tipo_denuncia,$de_descripcion,$de_contacto,$de_telefono,$de_nombre,$de_imagen));

		floopets_BD::Disconnect();
	}

	function ReadbyID($de_cod_denuncia){

		//Instanciamos y nos conectamos a la bd
		$Conexion = floopets_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



		//Crear el query que vamos a realizar
		$consulta = "SELECT * FROM denuncia WHERE de_cod_denuncia=?";

		$query = $Conexion->prepare($consulta);
		$query->execute(array($de_cod_denuncia));

		//Devolvemos el resultado en un arreglo
		//Fetch: es el resultado que arroja la consulta en forma de un vector o matriz segun sea el caso
		//Para consultar donde arroja mas de un dato el fatch debe ir acompañado con la palabra ALL

		$resultado = $query->fetch(PDO::FETCH_BOTH);
		return $resultado;

		floopets_BD::Disconnect();
	}


	//Metodo ReadAll()
	//Busca todos los registros de la tabla

	function ReadAll(){

		//Instanciamos y nos conectamos a la bd
		$Conexion = floopets_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//Crear el query que vamos a realizar
		$consulta = "SELECT tipo_denuncia.*,denuncia.* FROM denuncia INNER JOIN tipo_denuncia ON denuncia.td_cod_tipo_denuncia=tipo_denuncia.td_cod_tipo_denuncia WHERE denuncia.de_estado='Pendiente'";
		$query = $Conexion->prepare($consulta);
		$query->execute();
		//Devolvemos el resultado en un arreglo
		//Fetch: es el resultado que arroja la consulta en forma de un vector o matriz segun sea el caso
		//Para consultar donde arroja mas de un dato el fatch debe ir acompañado con la palabra ALL
		$resultado = $query->fetchALL(PDO::FETCH_BOTH);
		return $resultado;
		floopets_BD::Disconnect();
	}

	function Update($td_cod_tipo_denuncia,$de_descripcion,$de_contacto,$de_telefono,$de_nombre,$de_fecha,$de_imagen,$de_estado,$de_cod_denuncia){
	//Instanciamos y nos conectamos a la bd
		$Conexion = floopets_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



		//Crear el query que vamos a realizar
		$consulta = "UPDATE denuncia SET td_cod_tipo_denuncia=?,de_descripcion=?,de_contacto=?,de_telefono=?,de_nombre=?,de_fecha=?,de_imagen=?, de_estado=? WHERE de_cod_denuncia =?" ;

		$query = $Conexion->prepare($consulta);
		$query->execute(array($td_cod_tipo_denuncia,$de_descripcion,$de_contacto,$de_telefono,$de_nombre,$de_fecha,$de_imagen,$de_estado,$de_cod_denuncia));

		floopets_BD::Disconnect();

	}
	function Updateestado($de_estado,$de_cod_denuncia){
	//Instanciamos y nos conectamos a la bd
		$Conexion = floopets_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



		//Crear el query que vamos a realizar
		$consulta = "UPDATE denuncia SET  de_estado=? WHERE de_cod_denuncia =?" ;

		$query = $Conexion->prepare($consulta);
		$query->execute(array($de_estado,$de_cod_denuncia));

		floopets_BD::Disconnect();

	}

		function Delete($de_cod_denuncia){
	//Instanciamos y nos conectamos a la bd
		$Conexion = floopets_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



		//Crear el query que vamos a realizar
		$consulta = "DELETE FROM denuncia WHERE de_cod_denuncia =?" ;

		$query = $Conexion->prepare($consulta);
		$query->execute(array($de_cod_denuncia));

		floopets_BD::Disconnect();
	}
	// $consulta="SELECT denuncia.*,tipo_denuncia.* FROM tipo_denuncia INNER JOIN denuncia on tipo_denuncia.td_cod_tipo_denuncia=denuncia.td_cod_tipo_denuncia INNER JOIN denuncias_organizacion ON denuncia.de_cod_denuncia=denuncias_organizacion.de_cod_denuncia INNER JOIN organizacion ON denuncias_organizacion.org_cod_organizacion=organizacion.org_cod_organizacion WHERE organizacion.org_cod_organizacion=?"

function historial(){

		//Instanciamos y nos conectamos a la bd
		$Conexion = floopets_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//Crear el query que vamos a realizar
		$consulta = "SELECT tipo_denuncia.*,denuncia.* FROM denuncia INNER JOIN tipo_denuncia ON denuncia.td_cod_tipo_denuncia=tipo_denuncia.td_cod_tipo_denuncia WHERE denuncia.de_estado='tomado'";
		$query = $Conexion->prepare($consulta);
		$query->execute();
		//Devolvemos el resultado en un arreglo
		//Fetch: es el resultado que arroja la consulta en forma de un vector o matriz segun sea el caso
		//Para consultar donde arroja mas de un dato el fatch debe ir acompañado con la palabra ALL
		$resultado = $query->fetchALL(PDO::FETCH_BOTH);
		return $resultado;
		floopets_BD::Disconnect();
	}


			 function Readto()
   {
    //para el modificar por cada usuario usuario
    $conexion=floopets_BD::Connect();
    $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $consulta="SELECT denuncia.*,tipo_denuncia.* FROM tipo_denuncia INNER JOIN denuncia on tipo_denuncia.td_cod_tipo_denuncia=denuncia.td_cod_tipo_denuncia ";
    // $consulta="SELECT * FROM citas  WHERE Cod_usu=?";
    $query=$conexion->prepare($consulta);
    $query->execute(array());

	$resultado=$query->fetchAll(PDO::FETCH_BOTH);

	floopets_BD::Disconnect();

	return $resultado;
  }
  function Tomardenuncia($de_cod_denuncia, $org_cod_organizacion)
  {

		//Instanciamos y nos conectamos a la bd
		$Conexion = floopets_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//Crear el query que vamos a realizar
		$consulta = "INSERT INTO denuncias_organizacion (de_cod_denuncia, org_cod_organizacion) VALUES (?,?)";

		$query = $Conexion->prepare($consulta);

		$query->execute(array($de_cod_denuncia, $org_cod_organizacion));

		floopets_BD::Disconnect();
	}

	function Denuncias_tomadas($org_cod_organizacion)
   {
    //Instanciamos y nos conectamos a la bd
		$Conexion = floopets_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//Crear el query que vamos a realizar
		$consulta="SELECT denuncia.*,tipo_denuncia.* FROM tipo_denuncia INNER JOIN denuncia on tipo_denuncia.td_cod_tipo_denuncia=denuncia.td_cod_tipo_denuncia INNER JOIN denuncias_organizacion ON denuncia.de_cod_denuncia=denuncias_organizacion.de_cod_denuncia INNER JOIN organizacion ON denuncias_organizacion.org_cod_organizacion=organizacion.org_cod_organizacion WHERE organizacion.org_cod_organizacion=? AND denuncia.de_estado='tomado'";
		$query = $Conexion->prepare($consulta);
		$query->execute(array($org_cod_organizacion));
		//Devolvemos el resultado en un arreglo
		//Fetch: es el resultado que arroja la consulta en forma de un vector o matriz segun sea el caso
		//Para consultar donde arroja mas de un dato el fatch debe ir acompañado con la palabra ALL
		$resultado = $query->fetchALL(PDO::FETCH_BOTH);
		return $resultado;
		floopets_BD::Disconnect();
}
}



?>
