<?php
	class Gestion_organizacion{

		function Create($to_cod_tipo_organizacion,$org_nombre,$org_descripcion,$org_nit,$org_email,$org_telefono,$org_direccion,$org_logo){
			//Instanciamos y nos conectamos a la bd
			$conexion=floopets_BD::Connect();
			$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			//Creamos el query de la consulta a la BD
			$consulta="INSERT INTO organizacion (to_cod_tipo_organizacion,org_nombre,org_descripcion,org_nit,org_email,org_telefono,org_direccion,org_logo) VALUES (?,?,?,?,?,?,?,?)";

			$query=$conexion->prepare($consulta);
			$query->execute(array($to_cod_tipo_organizacion,$org_nombre,$org_descripcion,$org_nit,$org_email,$org_telefono,$org_direccion,$org_logo));

			floopets_BD::Disconnect();
		}
		function ReadAll()
		{
				//Instanciamos y nos conectamos a la bd
				$Conexion = floopets_BD::Connect();
				$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//Crear el query que vamos a realizar
				$consulta = "SELECT * FROM organizacion";
				$query = $Conexion->prepare($consulta);
				$query->execute();
				//Devolvemos el resultado en un arreglo
				//Fetch: es el resultado que arroja la consulta en forma de un vector o matriz segun sea el caso
				//Para consultar donde arroja mas de un dato el fatch debe ir acompañado con la palabra ALL
				$resultado = $query->fetchALL(PDO::FETCH_BOTH);
				return $resultado;
				floopets_BD::Disconnect();
		}
		function Nombres()
   {
    //para el modificar por cada usuario usuario
    $conexion=floopets_BD::Connect();
    $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $consulta="SELECT organizacion.*,tipo_organizacion.* FROM tipo_organizacion INNER JOIN organizacion on tipo_organizacion.to_cod_tipo_organizacion=organizacion.to_cod_tipo_organizacion ";
    // $consulta="SELECT * FROM citas  WHERE Cod_usu=?";
    $query=$conexion->prepare($consulta);
    $query->execute(array());

	$resultado=$query->fetchAll(PDO::FETCH_BOTH);

	floopets_BD::Disconnect();

	return $resultado;
  }

		function ReadbyID($org_cod_organizacion){
			//Intanciamos y nos conectamos a la bd
			$conexion=floopets_BD::Connect();
			$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


			//Creamos el query de la consulta a la bd
			$consulta="SELECT * FROM organizacion WHERE org_cod_organizacion=? ";

			$query=$conexion->prepare($consulta);
			$query->execute(array($org_cod_organizacion));

			$resultado = $query->fetch(PDO::FETCH_BOTH);

			floopets_BD::Disconnect();
			return $resultado;
		}

		function Update($org_cod_organizacion,$to_cod_tipo_organizacion,$org_nombre,$org_descripcion,$org_nit,$org_email,$org_telefono,$org_direccion,$Logo)
		{
				//Instanciamos y nos conectamos a la bd
				$Conexion = floopets_BD::Connect();
				$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//Crear el query que vamos a realizar
				$consulta = "UPDATE organizacion SET to_cod_tipo_organizacion = ?, org_nombre=?, org_descripcion=?,org_nit=?, org_email=?, org_telefono=?, org_direccion=?,Logo=?  WHERE org_cod_organizacion = ?" ;
				$query = $Conexion->prepare($consulta);
				$query->execute(array($to_cod_tipo_organizacion,$org_nombre,$org_descripcion,$org_nit,$org_email,$org_telefono,$org_direccion,$Logo,$org_cod_organizacion));
				floopets_BD::Disconnect();
		}

		function Delete($org_cod_organizacion){
			//Instanciamos y nos conectamos a la bd
			$Conexion = floopets_BD::Connect();
			$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



			//Crear el query que vamos a realizar
			$consulta = "DELETE FROM organizacion WHERE org_cod_organizacion = ?" ;

			$query = $Conexion->prepare($consulta);
			$query->execute(array($org_cod_organizacion));

			floopets_BD::Disconnect();

		}
		function ReadbyNIT($org_nit){

			//Instanciamos y nos conectamos a la bd
			$Conexion = floopets_BD::Connect();
			$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



			//Crear el query que vamos a realizar
			$consulta = "SELECT * FROM organizacion WHERE org_nit=?";

			$query = $Conexion->prepare($consulta);
			$query->execute(array($org_nit));

			//Devolvemos el resultado en un arreglo
			//Fetch: es el resultado que arroja la consulta en forma de un vector o matriz segun sea el caso
			//Para consultar donde arroja mas de un dato el fatch debe ir acompañado con la palabra ALL

			$resultado = $query->fetch(PDO::FETCH_BOTH);
			return $resultado;

			floopets_BD::Disconnect();
		}
		function Createorganizacion($org_cod_organizacion, $usu_cod_usuario){

		//Instanciamos y nos conectamos a la bd
		$Conexion = floopets_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//Crear el query que vamos a realizar
		$consulta = "INSERT INTO organizacion_usuario (org_cod_organizacion, usu_cod_usuario) VALUES (?,?)";

		$query = $Conexion->prepare($consulta);
		$query->execute(array($org_cod_organizacion, $usu_cod_usuario));

		floopets_BD::Disconnect();
	}


	}
 ?>
