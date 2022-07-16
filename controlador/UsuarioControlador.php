<?php
require_once "base_datos/Conexion.php";
require_once "modelo/DAO/UsuarioDAO.php";
require_once "modelo/entidades/UsuarioEntidad.php"; 

final class UsuarioControlador{

    public function index($data, $filtros){

        try{
            $conexion = Conexion::establecer();
            $dao=new UsuarioDAO($conexion);
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



        require_once "vista/usuarios/index.php";
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
        echo '<h1>Listando usuarios...</h1>';
    }

} 