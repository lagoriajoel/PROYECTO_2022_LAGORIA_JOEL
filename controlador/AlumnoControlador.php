<?php
require_once "base_datos/Conexion.php";
require_once "modelo/DAO/AlumnoDAO.php";
require_once "modelo/entidades/AlumnoEntidad.php"; 
use modelo\entidades\AlumnoEntidad as AlumnoEntidad;
final class AlumnoControlador{

    public function index($data, $filtros){
      $accion=null;
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
        $accion=null;
        //El ID del registro viene en $data
        $alumno = new AlumnoEntidad();
        try{
            $conexion = Conexion::establecer();
            $dao = new AlumnoDAO($conexion);
            $alumno = $dao->cargar((int)$data); 
            $conexion = null;
        }
        catch(PDOException $ex){
            $error = $ex->getMessage();
        }
        catch(Exception $ex){
            $error = $ex->getMessage();
        }      
     
        require_once "vista/alumnos/consultas.php";
    }

    public function guardar($data, $filtros){
        $accion = filter_input(INPUT_POST, "accion");
        $error = "";
        $alumno = new AlumnoEntidad();
        try{
            if($accion === "registrarAlumno"){
              
                $alumno->setApellido(filter_input(INPUT_POST,"datoApellido"));
                $alumno->setNombres(filter_input(INPUT_POST,"datoNombres"));
                $alumno->setDni(filter_input(INPUT_POST,"datoDni"));
                $alumno->setCuil(filter_input(INPUT_POST,"datoCuil"));
                $alumno->setDomicilio(filter_input(INPUT_POST,"datoDomicilio"));
                $alumno->setDomicilioLocalidad(filter_input(INPUT_POST,"datoLocalidad"));
                $alumno->setDomicilioProvincia(filter_input(INPUT_POST,"datoProvincia"));
                $alumno->setTelefono01(filter_input(INPUT_POST,"datoTelefono1"));
                $alumno->setTelefono02(filter_input(INPUT_POST,"datoTelefono2"));
                $alumno->setCorreo(filter_input(INPUT_POST,"datoCorreo"));
                $alumno->setFechaNacimiento(filter_input(INPUT_POST,"datoNacimiento"));
              
              

                $conexion = Conexion::establecer();
                $dao = new AlumnoDAO($conexion);
                $dao->guardar($alumno);
                $conexion= null;
             
           

            }
        }
        catch(PDOException $ex){
            $error = $ex->getMessage();
        }
        catch(Exception $ex){
            $error = $ex->getMessage();
        }
        require_once "vista/alumnos/altaAlumno.php";

    }

    public function actualizar($data, $filtros){
      
        $accion = filter_input(INPUT_POST, "accion");
        $error = "";
        $alumno = new AlumnoEntidad();
        try{
            if($accion === "actualizar"){
               
                $alumno->setIdAlumno((int)filter_input(INPUT_POST,"idAlumno"));            
                $alumno->setApellido(filter_input(INPUT_POST,"apellido"));
                $alumno->setNombres(filter_input(INPUT_POST,"nombres"));
                $alumno->setDni(filter_input(INPUT_POST,"dni"));
                $alumno->setCuil(filter_input(INPUT_POST,"cuil"));
                $alumno->setDomicilio(filter_input(INPUT_POST,"domicilio"));
                $alumno->setDomicilioLocalidad(filter_input(INPUT_POST,"localidad"));
                $alumno->setDomicilioProvincia(filter_input(INPUT_POST,"provincia"));
                $alumno->setTelefono01(filter_input(INPUT_POST,"telefono01"));
                $alumno->setTelefono02(filter_input(INPUT_POST,"telefono02"));
                $alumno->setCorreo(filter_input(INPUT_POST,"correo"));
                $alumno->setFechaNacimiento(filter_input(INPUT_POST,"fechaNacimiento"));
        

                $conexion = Conexion::establecer();
                $dao = new AlumnoDAO($conexion);
                $dao->actualizar($alumno);
              
             
              
                
            }
           
        }
        catch(PDOException $ex){
            $error = $ex->getMessage();
        }
        catch(Exception $ex){
            $error = $ex->getMessage();
        }
           
        require_once "vista/alumnos/consultas.php";


    }

    public function exportar(){
        try{
            $conexion = Conexion::establecer();
            $dao=new AlumnoDAO($conexion);
            $listado= $dao->listar(null);
        
            $conexion = null;
        }
    
        catch(PDOException $ex){
            $error = $ex->getMessage();
        }
        catch(Exception $ex){
            $error = $ex->getMessage();
        }
    
        require_once "vista/alumnos/reporteLista.php";
    
    }

    public function eliminar($data, $filtros){
        
        $accion="eliminar"; 
     
        $error = "";
      // (1) Velrificar que existe el registro con el id en $data


        try{
          
        

                $conexion = Conexion::establecer();
                $dao = new AlumnoDAO($conexion);
                $alumno = $dao->cargar((int) $data); 
                $dao->eliminar($alumno->getId());
                $conexion = null;
                //armar la vista "registro eliminado"
       
                
            
           
        }
        catch(PDOException $ex){
            $error = $ex->getMessage();
        }
        catch(Exception $ex){
            $error = $ex->getMessage();
        }
    
        require_once "vista/alumnos/vistaEliminar.php";
           
    }

    public function listar($data, $filtros){
        
    }
    public function reportes($data, $filtros){
        $accion=null;
        //El ID del registro viene en $data
        $alumno = new AlumnoEntidad();
        try{
            $conexion = Conexion::establecer();
            $dao = new AlumnoDAO($conexion);
            $alumno = $dao->cargar((int)$data); 
            $conexion = null;
        }
        catch(PDOException $ex){
            echo "ERROR => ".$ex->getMessage();
        }
        catch(Exception $ex){
            echo "ERROR => ".$ex->getMessage();
        }
     
        require_once "vista/alumnos/reportes.php";

    }


}