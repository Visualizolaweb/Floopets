<?php

	class Gestion_usuarios
	{
			function Create($usu_nombre,$usu_apellido,$usu_telefono,$usu_cedula,$usu_email,$cod_rol,$usu_clave,$usu_imagen,$usu_carpeta)
			{
				//Instanciamos y nos conectamos a la bd
				$conexion=floopets_BD::Connect();
				$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				//Creamos el query de la consulta a la BD
				$consulta ="INSERT INTO usuario (usu_nombre,usu_apellido,usu_telefono,usu_cedula,usu_email,cod_rol,usu_clave,usu_imagen,usu_carpeta) VALUES (?,?,?,?,?,?,?,?,?)";
				$query = $conexion->prepare($consulta);
				$query->execute(array($usu_nombre,$usu_apellido,$usu_telefono,$usu_cedula,$usu_email,$cod_rol,$usu_clave,$usu_imagen,$usu_carpeta));
				floopets_BD::Disconnect();
		}

		function Update($usu_cod_usuario,$usu_nombre,$usu_apellido,$usu_telefono,$usu_cedula,$usu_email,$usu_clave,$usu_imagen,$usu_carpeta)
			{
				//Instanciamos y nos conectamos a la bd
				$conexion=floopets_BD::Connect();
				$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				//Creamos el query de la consulta a la BD
				$consulta ="UPDATE usuario SET usu_nombre = ?, usu_apellido = ?,usu_telefono=?,usu_cedula=?,usu_email=?,usu_clave=?,usu_imagen=?,usu_carpeta=?  WHERE usu_cod_usuario = ?";
				$query = $conexion->prepare($consulta);
				$query->execute(array($usu_nombre,$usu_apellido,$usu_telefono,$usu_cedula,$usu_email,$usu_clave,$usu_imagen,$usu_carpeta,$usu_cod_usuario));
				floopets_BD::Disconnect();
		}
		function ReadAll()
		{
				//Instanciamos y nos conectamos a la bd
				$Conexion = floopets_BD::Connect();
				$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//Crear el query que vamos a realizar
				$consulta = "SELECT usuario.*, rol.* FROM rol INNER JOIN usuario ON rol.cod_rol = usuario.cod_rol";
				$query = $Conexion->prepare($consulta);
				$query->execute();
				//Devolvemos el resultado en un arreglo
				//Fetch: es el resultado que arroja la consulta en forma de un vector o matriz segun sea el caso
				//Para consultar donde arroja mas de un dato el fatch debe ir acompañado con la palabra ALL
				$resultado = $query->fetchALL(PDO::FETCH_BOTH);
				return $resultado;
				floopets_BD::Disconnect();
		}

		function Mis_mascotas($usu_cod_usuario)
		{
				//Instanciamos y nos conectamos a la bd
				$Conexion = floopets_BD::Connect();
				$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//Crear el query que vamos a realizar
				$consulta = "SELECT animal.*,usuario.*,solicitud_adopcion.*,raza.* FROM usuario INNER JOIN solicitud_adopcion ON usuario.usu_cod_usuario=solicitud_adopcion.usu_cod_usuario INNER JOIN animal ON solicitud_adopcion.ani_cod_animal=animal.ani_cod_animal INNER JOIN raza on animal.ra_cod_raza=raza.ra_cod_raza WHERE usuario.usu_cod_usuario=? AND animal.ani_estado='adoptado' AND solicitud_adopcion.sol_estado='Aprobado' ";
				$query = $Conexion->prepare($consulta);
				$query->execute(array($usu_cod_usuario));
				//Devolvemos el resultado en un arreglo
				//Fetch: es el resultado que arroja la consulta en forma de un vector o matriz segun sea el caso
				//Para consultar donde arroja mas de un dato el fatch debe ir acompañado con la palabra ALL
				$resultado = $query->fetchALL(PDO::FETCH_BOTH);
				return $resultado;
				floopets_BD::Disconnect();
		}

		function Readbyusu($usu_cod_usuario)
		{
			//Instanciamos y nos conectamos a la bd
			$Conexion = floopets_BD::Connect();
			$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//Crear el query que vamos a realizar
			$consulta = "SELECT * FROM usuario WHERE usu_cod_usuario=?";
			$query = $Conexion->prepare($consulta);
			$query->execute(array($usu_cod_usuario));
			//Devolvemos el resultado en un arreglo
			//Fetch: es el resultado que arroja la consulta en forma de un vector o matriz segun sea el caso
			//Para consultar donde arroja mas de un dato el fatch debe ir acompañado con la palabra ALL
			$resultado = $query->fetch(PDO::FETCH_BOTH);
			return $resultado;
			floopets_BD::Disconnect();
		}

		function ReadbyID($usu_cod_usuario)
		{
			//Instanciamos y nos conectamos a la bd
			$Conexion = floopets_BD::Connect();
			$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//Crear el query que vamos a realizar
			$consulta = "SELECT usuario.*,rol.* FROM usuario INNER JOIN rol ON usuario.cod_rol=rol.cod_rol WHERE usuario.usu_cod_usuario=?";
			$query = $Conexion->prepare($consulta);
			$query->execute(array($usu_cod_usuario));
			//Devolvemos el resultado en un arreglo
			//Fetch: es el resultado que arroja la consulta en forma de un vector o matriz segun sea el caso
			//Para consultar donde arroja mas de un dato el fatch debe ir acompañado con la palabra ALL
			$resultado = $query->fetch(PDO::FETCH_BOTH);
			return $resultado;
			floopets_BD::Disconnect();
		}

		function Mi_Organizacion($usu_cod_usuario)
		{
			$conexion=floopets_BD::Connect();
			$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			$consulta="SELECT organizacion_usuario.*,organizacion.* FROM usuario INNER JOIN organizacion_usuario ON usuario.usu_cod_usuario=organizacion_usuario.usu_cod_usuario INNER JOIN organizacion ON organizacion_usuario.org_cod_organizacion=organizacion.org_cod_organizacion WHERE usuario.usu_cod_usuario=?";

			$query=$conexion->prepare($consulta);
			$query->execute(array($usu_cod_usuario));

			$resultado=$query->fetch(PDO::FETCH_BOTH);

			return $resultado;
			floopets_BD::Disconnect();

		}



		function Delete($usu_cod_usuario)
		{
				//Instanciamos y nos conectamos a la bd
				$Conexion = floopets_BD::Connect();
				$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//Crear el query que vamos a realizar
				$consulta = "DELETE FROM usuario WHERE usu_cod_usuario = ?" ;
				$query = $Conexion->prepare($consulta);
				$query->execute(array($usu_cod_usuario));
				floopets_BD::Disconnect();
		}


		function ValidaUsuario($usu_email, $usu_clave){
		      $Conexion=floopets_BD::Connect();
		      $Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		      $consulta = "SELECT * FROM usuario WHERE usu_email = ? AND usu_clave = ?";

		      $query = $Conexion->prepare($consulta);

		      $query->execute(array($usu_email, $usu_clave));
		      // fetch cuando voy a mostrar un solo registro
		      // fetchALL cuando voy a mostrar mas de un registro

		      $results = $query->fetch(PDO::FETCH_BOTH);
		      floopets_BD::Disconnect();

		      return $results;
    	}
    function ReadbyCC($usu_cedula)
			{
				//Instanciamos y nos conectamos a la bd
				$Conexion = floopets_BD::Connect();
				$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//Crear el query que vamos a realizar
				$consulta = "SELECT * FROM usuario WHERE usu_cedula=?";
				$query = $Conexion->prepare($consulta);
				$query->execute(array($usu_cedula));
				//Devolvemos el resultado en un arreglo
				//Fetch: es el resultado que arroja la consulta en forma de un vector o matriz segun sea el caso
				//Para consultar donde arroja mas de un dato el fatch debe ir acompañado con la palabra ALL
				$resultado = $query->fetch(PDO::FETCH_BOTH);
				return $resultado;
				floopets_BD::Disconnect();
	}
	function reademail($usu_email)
		{
			//Instanciamos y nos conectamos a la bd
			$Conexion = floopets_BD::Connect();
			$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//Crear el query que vamos a realizar
			$consulta = "SELECT * FROM usuario WHERE usu_email=?";
			$query = $Conexion->prepare($consulta);
			$query->execute(array($usu_email));
			//Devolvemos el resultado en un arreglo
			//Fetch: es el resultado que arroja la consulta en forma de un vector o matriz segun sea el caso
			//Para consultar donde arroja mas de un dato el fatch debe ir acompañado con la palabra ALL
			$resultado = $query->fetch(PDO::FETCH_BOTH);
			return $resultado;
			floopets_BD::Disconnect();
}
	function tieneorganizacion($usu_cod_usuario){
      $Conexion = floopets_BD::Connect();
      $Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $consulta = "SELECT * FROM organizacion_usuario WHERE usu_cod_usuario = ?";

      $query = $Conexion->prepare($consulta);

      $query->execute(array($usu_cod_usuario));
      // fetch cuando voy a mostrar un solo registro
      // fetchALL cuando voy a mostrar mas de un registro

      $results = $query->fetch(PDO::FETCH_BOTH);
      floopets_BD::Disconnect();

      return $results;
    }


	}
?>
