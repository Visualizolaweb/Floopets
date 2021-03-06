<?php
	class Gestion_voluntarios
	{
		// Metodo Create()
		function Create($vo_cod_voluntario,$vo_nombre,$vo_telefono,$vo_direccion,$vo_imagen,$org_cod_organizacion)
		{
			//Instanciamos y nos conectamos a la bd
			$conexion=floopets_BD::Connect();
			$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			//Crear el query que vamos a realizar.
			$consulta ="INSERT INTO voluntarios (vo_cod_voluntario,vo_nombre,vo_telefono,vo_direccion,vo_imagen,org_cod_organizacion,vo_estado) VALUES (?,?,?,?,?,?,'Pendiente')";
			$query = $conexion->prepare($consulta);
			$query->execute(array($vo_cod_voluntario,$vo_nombre,$vo_telefono,$vo_direccion,$vo_imagen,$org_cod_organizacion));
			floopets_BD::Disconnect();
		}
		function ReadAll()
		{
				//Instanciamos y nos conectamos a la bd
				$Conexion = floopets_BD::Connect();
				$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//Crear el query que vamos a realizar
				$consulta = "SELECT * FROM voluntarios WHERE vo_estado='Pendiente'";
				$query = $Conexion->prepare($consulta);
				$query->execute();
				//Devolvemos el resultado en un arreglo
				//Fetch: es el resultado que arroja la consulta en forma de un vector o matriz segun sea el caso
				//Para consultar donde arroja mas de un dato el fatch debe ir acompañado con la palabra ALL
				$resultado = $query->fetchALL(PDO::FETCH_BOTH);
				return $resultado;
				floopets_BD::Disconnect();
		}

		function ReadById($vo_cod_voluntario)
		{
				//Instanciamos y nos conectamos a la bd
				$Conexion = floopets_BD::Connect();
				$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//Crear el query que vamos a realizar
				$consulta = "SELECT * FROM voluntarios WHERE vo_cod_voluntario = ?";
				$query = $Conexion->prepare($consulta);
				$query->execute(array($vo_cod_voluntario));
				//Devolvemos el resultado en un arreglo
				//Fetch: es el resultado que arroja la consulta en forma de un vector o matriz segun sea el caso
				//Para consultar donde arroja mas de un dato el fatch debe ir acompañado con la palabra ALL
				$resultado = $query->fetch(PDO::FETCH_BOTH);
				return $resultado;
				floopets_BD::Disconnect();
		}
		function Update($vo_cod_voluntario,$vo_nombre,$vo_telefono,$vo_direccion,$vo_imagen)
		{
			//Instanciamos y nos conectamos a la bd
			$Conexion = floopets_BD::Connect();
			$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//Crear el query que vamos a realizar
			$consulta = "UPDATE voluntarios SET vo_nombre= ?,vo_telefono=?,vo_direccion=?,vo_imagen=? WHERE vo_cod_voluntario = ?" ;
			$query = $Conexion->prepare($consulta);
			$query->execute(array($vo_cod_voluntario,$vo_nombre,$vo_telefono,$vo_direccion,$vo_imagen));
			floopets_BD::Disconnect();
		}
			function Delete($vo_cod_voluntario)
			{
				//Instanciamos y nos conectamos a la bd
				$Conexion = floopets_BD::Connect();
				$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//Crear el query que vamos a realizar
				$consulta = "DELETE FROM voluntarios WHERE vo_cod_voluntario = ?" ;
				$query = $Conexion->prepare($consulta);
				$query->execute(array($vo_cod_voluntario));
				floopets_BD::Disconnect();
		}


		function aceptar_voluntario($vo_cod_voluntario)
		{

		$Conexion = floopets_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



		//Crear el query que vamos a realizar
		$consulta = "UPDATE voluntarios SET  vo_estado='Aceptado' WHERE vo_cod_voluntario=? " ;

		$query = $Conexion->prepare($consulta);
		$query->execute(array($vo_cod_voluntario));

		floopets_BD::Disconnect();


		}

		function mis_voluntarios($org_cod_organizacion){
			//Instanciamos y nos conectamos a la bd
				$Conexion = floopets_BD::Connect();
				$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//Crear el query que vamos a realizar
				$consulta = "SELECT * FROM voluntarios WHERE vo_estado='Activo' AND org_cod_organizacion=?";
				$query = $Conexion->prepare($consulta);
				$query->execute(array($org_cod_organizacion));
				//Devolvemos el resultado en un arreglo
				//Fetch: es el resultado que arroja la consulta en forma de un vector o matriz segun sea el caso
				//Para consultar donde arroja mas de un dato el fatch debe ir acompañado con la palabra ALL
				$resultado = $query->fetchALL(PDO::FETCH_BOTH);
				return $resultado;
				floopets_BD::Disconnect();
		}
		function misvolun($org_cod_organizacion){
			//Instanciamos y nos conectamos a la bd
				$Conexion = floopets_BD::Connect();
				$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//Crear el query que vamos a realizar
				$consulta = "SELECT * FROM voluntarios WHERE vo_estado='Aceptado' AND org_cod_organizacion=?";
				$query = $Conexion->prepare($consulta);
				$query->execute(array($org_cod_organizacion));
				//Devolvemos el resultado en un arreglo
				//Fetch: es el resultado que arroja la consulta en forma de un vector o matriz segun sea el caso
				//Para consultar donde arroja mas de un dato el fatch debe ir acompañado con la palabra ALL
				$resultado = $query->fetchALL(PDO::FETCH_BOTH);
				return $resultado;
				floopets_BD::Disconnect();
		}

		 function ReadbyCV($vo_cod_voluntario)
			{
				//Instanciamos y nos conectamos a la bd
				$Conexion = floopets_BD::Connect();
				$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//Crear el query que vamos a realizar
				$consulta = "SELECT * FROM voluntarios WHERE vo_cod_voluntario=?";
				$query = $Conexion->prepare($consulta);
				$query->execute(array($vo_cod_voluntario));
				//Devolvemos el resultado en un arreglo
				//Fetch: es el resultado que arroja la consulta en forma de un vector o matriz segun sea el caso
				//Para consultar donde arroja mas de un dato el fatch debe ir acompañado con la palabra ALL
				$resultado = $query->fetch(PDO::FETCH_BOTH);
				return $resultado;
				floopets_BD::Disconnect();
	}




	}
?>
