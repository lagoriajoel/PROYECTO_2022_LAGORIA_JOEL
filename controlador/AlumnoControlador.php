<?php
require_once "base_datos/Conexion.php";
require_once "modelo/DAO/AlumnoDAO.php";
require_once "modelo/entidades/AlumnoEntidad.php"; 
final class AlumnoControlador{

    public function index($data, $filtros){

        try{
            $conexion = Conexion::establecer();
            $dao=new AlumnoDAO($conexion);
            $listado= $dao->listar(null);
        
            $conexion = null;
        }
        catch(PDOException $ex){
            echo "ERROR => ".$ex->getMessage();
        }
        catch(Exception $ex){
            echo "ERROR => ".$ex->getMessage();
        }
        //Se cargar la vista
      
        require_once "vista/alumnos/index.php";
    }

    public function cargar($data, $filtros){
        
    }

    public function guardar($data, $filtros){

    }

    public function actualizar($data, $filtros){
        
    }

    public function eliminar($data, $filtros){

    }

    public function listar($data, $filtros){
        
    }

}