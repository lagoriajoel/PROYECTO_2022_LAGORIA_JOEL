<?php
require_once "base_datos/Conexion.php";
require_once "modelo/DAO/PerfilDAO.php";
require_once "modelo/entidades/PerfilEntidad.php"; 

use modelo\entidades\PerfilEntidad as PerfilEntidad;

final class PerfilControlador{

    public function index($data, $filtros){
        try{
            $conexion = Conexion::establecer();
            $dao=new PerfilDAO($conexion);
            $listado= $dao->listar(null);
        
            $conexion = null;
        }
        catch(PDOException $ex){
            $error = $ex->getMessage();
        }
        catch(Exception $ex){
            $error = $ex->getMessage();
        }
        //Se cargar la vista
        require_once "vista/perfiles/index.php"; 
       
      
    }

    public function cargar($data, $filtros){
        
    }

    public function guardar($data, $filtros){
        $accion = filter_input(INPUT_POST, "accion");
        $error = "";
        $perfil = new PerfilEntidad();
        try{
            if($accion === "registrarAlumno"){
              
                $perfil->setId(filter_input(INPUT_POST,"datoId"));
                $perfil->setNombre(filter_input(INPUT_POST,"datoNombre"));
             
              
              

                $conexion = Conexion::establecer();
                $dao = new AlumnoDAO($conexion);
                $dao->guardar($perfil);
                $conexion= null;
             
           

            }
        }
        catch(PDOException $ex){
            $error = $ex->getMessage();
        }
        catch(Exception $ex){
            $error = $ex->getMessage();
        }
        require_once "vista/perfiles/altaPerfil.php";
    }

    public function actualizar($data, $filtros){
        
    }

    public function eliminar($data, $filtros){

    }

    public function listar($data, $filtros){
        
    }

} 