<?php
require_once "base_datos/Conexion.php";
require_once "modelo/DAO/UsuarioDAO.php";
require_once "modelo/entidades/UsuarioEntidad.php"; 

use modelo\entidades\UsuarioEntidad as UsuarioEntidad;

final class UsuarioControlador{

    public function index($data, $filtros){
     
        $listado = [];
        try{
            $conexion = Conexion::establecer();
            $dao = new UsuarioDAO($conexion);
            $filtros = json_decode('{"perfilId":0, "estado": 2}');
            $perfilId = (isset($_POST["datoPerfil"])) ? (int)$_POST["datoPerfil"] : 0;
            $estado = (isset($_POST["datoEstado"])) ? (int)$_POST["datoEstado"] : 2;
            $filtros->{"perfilId"} = $perfilId;
            $filtros->{"estado"} = $estado;
            $listado = $dao->listar($filtros); 
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
        $accion=null;
        //El ID del registro viene en $data
        $usuario = new UsuarioEntidad();
        try{
            $conexion = Conexion::establecer();
            $dao = new UsuarioDAO($conexion);
            $usuario = $dao->cargar((int)$data); 
            $conexion = null;
        }
        catch(PDOException $ex){
            echo "ERROR => ".$ex->getMessage();
        }
        catch(Exception $ex){
            echo "ERROR => ".$ex->getMessage();
        }
        //Se cargar la vista
        require_once "vista/usuarios/consultas.php";
    }


    public function guardar($data, $filtros){
         //Identificar que accion quiero ejecutar (si mostrar el formulario o guardar en BD)
         $accion = filter_input(INPUT_POST, "accion");
         $error = "";
         $usuario = new UsuarioEntidad();
         try{
             if($accion === "registrar"){
                 $usuario->setCuenta(filter_input(INPUT_POST,"datoCuenta"));
                 $usuario->setApellido(filter_input(INPUT_POST,"datoApellido"));
                 $usuario->setNombres(filter_input(INPUT_POST,"datoNombres"));
                 $usuario->setclave(filter_input(INPUT_POST,"datoClave"));
                 $usuario->setCorreo(filter_input(INPUT_POST,"datoCorreo"));
                 $usuario->setPerfilId((int)filter_input(INPUT_POST,"datoPerfil"));
 
                 $conexion = Conexion::establecer();
                 $dao = new UsuarioDAO($conexion);
                 $dao->guardar($usuario);
                 $usuario = new UsuarioEntidad();
                 $conexion = null;
             }
         }
         catch(PDOException $ex){
             $error = $ex->getMessage();
         }
         catch(Exception $ex){
             $error = $ex->getMessage();
         }
 
         require_once "vista/usuarios/alta.php";
    }


    
    public function actualizar($data, $filtros){
      
        $accion = filter_input(INPUT_POST, "accion");
        $error = "";
        $usuario = new UsuarioEntidad();
        try{
            if($accion === "actualizar"){
               
                $usuario->setIdUsuario((int)filter_input(INPUT_POST,"datoId"));
                $usuario->setCuenta(filter_input(INPUT_POST,"datoCuenta"));
                $usuario->setApellido(filter_input(INPUT_POST,"datoApellido"));
                $usuario->setNombres(filter_input(INPUT_POST,"datoNombres"));
                $usuario->setCorreo(filter_input(INPUT_POST,"datoCorreo"));
                $usuario->setEstado((int)filter_input(INPUT_POST,"datoEstado"));

                $usuario->setPerfilId((int)filter_input(INPUT_POST,"datoPerfil"));

                $conexion = Conexion::establecer();
                $dao = new UsuarioDAO($conexion);
                $dao->actualizar($usuario);
                $conexion = null;
              
            }
            if ($accion === "eliminar") {
               
                this.eliminar();
            }
        }
        catch(PDOException $ex){
            $error = $ex->getMessage();
        }
        catch(Exception $ex){
            $error = $ex->getMessage();
        }

       

    }

    public function actualizarContrasenia($data, $filtros){
        $accion = filter_input(INPUT_POST, "accion");
        $error = "";

      
        //El ID del registro viene en $data
        $usuario = new UsuarioEntidad();
        try{
            $conexion = Conexion::establecer();
            $dao = new UsuarioDAO($conexion);
            $usuario = $dao->cargar((int)$data); 
         

             if ($accion=="actualizar") {
               
               
               
                $claveActual = filter_input(INPUT_POST, "datoClave");
                $claveNueva = filter_input(INPUT_POST, "claveNueva");
                $ClaveConfirmacion = filter_input(INPUT_POST, "ClaveConfirmacion");


                $dao->actualizarContraseña($data,$claveActual, $claveNueva, $ClaveConfirmacion); //

             }

            $conexion = null;
        }
        catch(PDOException $ex){
            $error = $ex->getMessage();
        }
        catch(Exception $ex){
            $error = $ex->getMessage();
        }

      
        require_once "vista/usuarios/actualizarContrasenia.php";


       
    }

    public function exportar(){

            
        $listado = [];
        try{
            $conexion = Conexion::establecer();
            $dao = new UsuarioDAO($conexion);
            $filtros = json_decode('{"perfilId":0, "estado": 2}');
            $perfilId = (isset($_POST["datoPerfil"])) ? (int)$_POST["datoPerfil"] : 0;
            $estado = (isset($_POST["datoEstado"])) ? (int)$_POST["datoEstado"] : 2;
            $filtros->{"perfilId"} = $perfilId;
            $filtros->{"estado"} = $estado;
            $listado = $dao->listar($filtros); 
            $conexion = null;
        }
        catch(PDOException $ex){
            $error = $ex->getMessage();
        }
        catch(Exception $ex){
            $error = $ex->getMessage();
        }
        //Se cargar la vista
        require_once "vista/usuarios/reporteLista.php";


    }




    public function login($data, $filtros){
        $accion = filter_input(INPUT_POST, "accion");
        $error = "";
        try{
            if($accion === "autenticarse"){
                $cuenta = filter_input(INPUT_POST,"datoCuenta");    //Sanear con filter_var()
                $clave = filter_input(INPUT_POST,"datoClave");      //Sanear con filter_var()

                $conexion = Conexion::establecer();
                $dao = new UsuarioDAO($conexion);
                $dao->login($cuenta, $clave);
                $conexion = null;
                header("Location:http://localhost/Proyecto_2022_Lagoria_Joel/inicio/index");
                die();
            }
        }
        catch(PDOException $ex){ 
            $error = $ex->getMessage();
        }
        catch(Exception $ex){
            $error = $ex->getMessage();
        }
        
        require_once "vista/usuarios/login.php";
    }

   

    public function eliminar($data, $filtros){
       
        $accion = filter_input(INPUT_POST, "accion");
        $error = "";
        print_r($accion);
        try{
            if($accion === "actualizar"){
                
                $id= filter_input((int)INPUT_POST,"datoId");    //Sanear con filter_var()
                print_r($id);

                $conexion = Conexion::establecer();
                $dao = new UsuarioDAO($conexion);
                $dao->eliminar($id);


                $conexion = null;
                header("Location:http://localhost/Proyecto_2022_Lagoria_Joel/usuario");
                die();

                }
            }
            catch(PDOException $ex){ 
                $error = $ex->getMessage();
            }
            catch(Exception $ex){
                $error = $ex->getMessage();
            }
     }


    public function listar($data, $filtros){
        echo '<h1>Listando usuarios...</h1>';
    }
    public function logout(){
        $conexion = Conexion::establecer();
        $dao = new UsuarioDAO($conexion);
        $dao->logout();
        $conexion = null;
        header("Location:https://localhost/Proyecto_2022_Lagoria_Joel/");
        die();
    }

}