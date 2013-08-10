<?php 
	class clsDatos{
	private $conexion;
	public function __construct() {
		$servidor="localhost";
		$usuario="root";
		$clave="root";
		$base="mvc";
		$this->conexion=new mysqli($servidor,$usuario,$clave,$base);

	}

	public function __destruct(){}

	public function filtro($sql){
		$result=$conexion->query($sql);
		return $result;
	}
	
	public function cerrarfiltro($dato){

		$dato->free();
	}

	public function proximo($datos){
		$arreglo= $datos->fetch_array();
	}

	Public function ejecutar($sql){

		$conexion->query($sql);
	}

	public function cerrarconexion(){
		 $conexion->close();

	}
	}
 ?>