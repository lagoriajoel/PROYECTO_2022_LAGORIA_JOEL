<?php
require_once "base_datos/Conexion.php";
require_once "modelo/DAO/PerfilDAO.php";
require_once "modelo/entidades/PerfilEntidad.php"; 
final class PerfilControlador{

    public function index($data, $filtros){
        try{
            $conexion = Conexion::establecer();
            $dao=new PerfilDAO($conexion);
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
        require_once "vista/perfiles/index.php"; 
       
      
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