<?php

class dbnba
{

  private $host="localhost";
  private $user="root";
  private $pass="root";
  private $db_name="nba";

  private $conexion;

  private $error=false;
  function __construct()
  {
      $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
      if ($this->conexion->connect_errno) {
        $this->error=true;
      }
  }

  function hayerror(){
    return $this->error;
  }

public function listaEquipos(){
  if ($this->error==true){
      return null;
  }else{
	$array=[];
	$resultado = $this->conexion->query("SELECT * FROM equipos ");

	while ($fila = $resultado->fetch_assoc()){
		$array[]=$fila;
	}
	return $tabla;
  }
}
  public function insertarEquipos($nombre,$ciudad,$conferencia,$division){
    if ($this->error==true){
        return null;
    }else{
      $sqlInserction="INSERT INTO equipos(Nombre,Ciudad,Conferencia,Division) VALUES ('".$nombre."','".$ciudad."','".$conferencia."','".$division."')";
      $this->conexion->query($sqlInserction);
    }
  }
  public function actualizarEquipo($nombre,$ciudad,$conferencia,$division){
      if ($this->error==true){
          return null;
      }else{
        $sqlInserction="UPDATE equipos SET Nombre='".$nombre."',Ciudad='".$ciudad."',Conferencia='".$conferencia."',Division='".$division."' WHERE Nombre='".$nombre."'";
        $this->conexion->query($sqlInserction);
      }
    }
    public function mostrarUltimoEquipo($nombre){
      if ($this->error==true){
          return null;
      }else{
		$array=[];
			$resultado = $this->conexion->query("SELECT * FROM equipos WHERE nombre='".$nombre."'");

		while ($fila=$resultado->fetch_assoc()){
			$array[]=$fila;
		}
		return $array;
	  }
    }

}
  ?>
