<?php 
class prueba 
{ 
    var $servidor="localhost"; 
    var $usuario="root"; 
    var $passwd="root"; 
    var $bd="mvc"; 
    var $conexion; 

    public function conectar() 
    { 
        $conexion = new mysqli($this->servidor,$this->usuario,$this->passwd,$this->bd); 

        if($conexion->errno) 
        { 
                echo "Falla al intentar conexion a MySQL <br>"; 
                echo "codigo error :". $conexion->connect_errno; 
                echo " - " . $conexion->connect_error; 
                die(); 

        } 
        else 
        { 
            echo $conexion->host_info; 
            return $this->conexion; 
        } 
    } 
    var $select; 
    public function Select() 
    { 
        $select="select * from nombre"; 

        $this->sentencia =$this->prepare($select); 

        $sentencia->execute(); 

        $sentencia->bind_result($nombre); 

        while($sentencia->fetch()) 
        { 
            echo "$nombre"; 
        } 

    } 
} 
?>