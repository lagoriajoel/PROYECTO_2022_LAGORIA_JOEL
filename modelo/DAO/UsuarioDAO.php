<?php

require_once "modelo/DAO/DAOInterface.php";
require_once "modelo/entidades/UsuarioEntidad.php";

use modelo\entidades\UsuarioEntidad as UsuarioEntidad;

 class UsuarioDAO  implements DAOinterface {


  private $conexion;
   

     function __construct($conexion){
       
       $this->conexion = $conexion; 

    }

    // implementar metodos de la interfaz



    public function cargar($id){
        if(!is_integer($id)) throw new Exception("El formato del identificador de usuario es incorrecto");

        $sql = 'SELECT id, cuenta, apellido, nombres, correo, DATE_FORMAT(fechaAlta,"%Y-%m-%d") as fechaAlta, estado, perfilId FROM usuarios WHERE id = :id';
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute(array("id" => $id));
        if($stmt->rowCount() != 1){
            throw new Exception("No se encontraron coincidencias con el id = ".$id);
        }
        $registro = $stmt->fetch(PDO::FETCH_ASSOC);
        $usuario = new UsuarioEntidad();
        $usuario->setIdUsuario((int)$registro["id"]);
        $usuario->setCuenta($registro["cuenta"]);
        $usuario->setApellido($registro["apellido"]);
        $usuario->setNombres($registro["nombres"]);
        $usuario->setCorreo($registro["correo"]);
        $usuario->setFechaAlta($registro["fechaAlta"]);
        $usuario->setEstado((int)$registro["estado"]);
        $usuario->setPerfilId((int)$registro["perfilId"]);
        return $usuario;
    }


    public function guardar($entidad){
        
        $this->validar($entidad);
        $this->existeUsuario($entidad);
        $sql = 'INSERT INTO usuarios VALUES(DEFAULT, :cuenta, :clave, :apellido, :nombres, :correo, NOW(), 1, :perfilId)';
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute(array(
            "cuenta" => $entidad->getCuenta(),
            "clave" => password_hash($entidad->getClave(), PASSWORD_DEFAULT, array("cost" => 10)),
            "apellido" => $entidad->getApellido(),
            "nombres" => $entidad->getNombres(),
            "correo" => $entidad->getCorreo(),
            "perfilId" => $entidad->getPerfilId()
        ));
        if($stmt->rowCount() != 1){
            throw new Exception("No se pudo insertar el registro");
        }
    }

 
   

   
        
    public function eliminar($id){
   // if(!is_integer($id)) throw new Exception("El formato del identificador de usuario es incorrecto");
      print_r("aca");
      $sql='DELETE FROM usuarios WHERE id =:id';
      $stmt= $this->conexion->prepare($sql);
    
     $stmt-> bindParam(':id', $id, PDO::PARAM_INT);
     $stmt->execute();
     if($stmt->rowCount() != 1){
        throw new Exception("No se pudo eliminar el registro");
    }


    }

    public function actualizar($entidad){
     $id=$entidad->getIdUsuario();
     
    
        $sql='UPDATE usuarios SET cuenta=?,apellido=?,nombres=?,correo=?,estado=?,perfilId=? WHERE id=?';
        $stmt= $this->conexion->prepare($sql);
        $stmt->execute(array($entidad->getCuenta(),$entidad->getApellido(),$entidad->getNombres(),$entidad->getCorreo(),$entidad->getEstado(),$entidad->getPerfilId(),$id)); 
        if($stmt->rowCount() != 1){
            throw new Exception("No se pudo actualizar el registro");
        }
    
       } 
      public function actualizarContraseña($id, $claveActual, $claveNueva, $ClaveConfirmacion){  

                //verificar que las claves nuevas coincidas 
            if($claveNueva != $ClaveConfirmacion){
                    throw new Exception("Las contraseñas ingresadas no coinciden");
                }
             // (1) obtener la clave actual del registro 


            $sql = 'SELECT  clave as claveHash FROM usuarios WHERE id = :id';
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute(array("id" => $id));
            if($stmt->rowCount() != 1){
                throw new Exception("La cuenta es incorrecta");
            }
            $registro = $stmt->fetch(PDO::FETCH_OBJ);
            //Validación de contraseña actual
            if(!password_verify($claveActual, $registro->claveHash)){
                throw new Exception("La contraseña  Actual es incorrecta");
            }
            // (3) Actualizar la clave, con $claveNueva. Usar password_hash  
          
           $sql2='UPDATE usuarios SET clave=:clave WHERE id=:id';
           $stmt= $this->conexion->prepare($sql2);
           $stmt->execute(array("clave" => password_hash($claveNueva, PASSWORD_DEFAULT, array("cost" => 10)),
                                "id" => $id)); 
           if($stmt->rowCount() != 1){
            throw new Exception("No se pudo actualizar la clave");
        }



    }

    public function listar($filtros){

        $clausulas = array();
        if($filtros->{"perfilId"} > 0) $clausulas[] = '(per.id = '.$filtros->{"perfilId"}.')';
        if($filtros->{"estado"} === 0 || $filtros->{"estado"} === 1) $clausulas[] = '(usu.estado = '.$filtros->{"estado"}.')';

        $sql = 'SELECT usu.id, usu.cuenta, usu.apellido, usu.nombres, usu.correo, usu.fechaAlta, usu.estado, per.nombre as perfil FROM usuarios as usu INNER JOIN perfiles as per ON  usu.perfilId = per.id';
        if(count($clausulas) > 0){
            $sql .= ' WHERE ';
            foreach($clausulas as $clausula){
                $sql .= $clausula . ' AND ';
            }
            $sql = substr_replace($sql, ";", strlen($sql) - 5);
        }

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        $listado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $listado;


    }


      

   
        public function validar($entidad){
            if($entidad->getCuenta() === ""){
                throw new Exception("Debe especificar el nombre de la cuenta");
            }
            if($entidad->getApellido() === ""){
                throw new Exception("Debe especificar el apellido del usuario");
            }
            if($entidad->getNombres() === ""){
                throw new Exception("Debe especificar el nombre del usuario");
            }
            if($entidad->getClave() === ""){
                throw new Exception("Debe especificar una contraseña");
            }
            if($entidad->getCorreo() === ""){
                throw new Exception("Debe especificar la dirección de correo");
            }
            if($entidad->getPerfilId() == 0){
                throw new Exception("Debe especificar el perfil de la cuenta");
            }
        }


        private function existeUsuario($entidad){
            //si el perfil existe en la base datos, entonces 
            //se lanza una excepcion con el mensaje correspondiente
        }

    private function existePerfil($entidad){

       $sql='SELECT id FROM perfiles WHERE id=?';

       $stmt=$this->conexion->prepare($sql);
       $stmt->execute(array($entidad->getIdUsuario()));

       if($stmt==1){

        throw new Exception("Error al ingresar datos 1");
       }

    }
    public function logout(){
        session_unset();
        if (ini_get("session.use_cookies")){
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
            }
        session_destroy();
    }

    public function login($cuenta, $clave){
        $sql = 'SELECT id, nombres, clave as claveHash, correo, estado, perfilId FROM usuarios WHERE cuenta = :cuenta';
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute(array("cuenta" => $cuenta));
        //Validación de nombre de usuario o cuenta
       if($stmt->rowCount() != 1){
            throw new Exception("La cuenta es incorrecta");
        }
        $registro = $stmt->fetch(PDO::FETCH_OBJ);
        //Validación de contraseña
        if(!password_verify($clave, $registro->claveHash)){
            throw new Exception("La contraseña es incorrecta");
        }
        //Validación de cuenta activa (estado == 1 => ACTIVO)
        if(((int)$registro->estado) != 1){
            throw new Exception("La cuenta se encuentra inactiva. Consulte con el Administrador.");
        }
            //Se crea la sesión y se configuran las variables de sesión
        //session_start();
          
        $_SESSION["logueado"] = 2022;
        $_SESSION["id"] = (int) $registro->id;
        $_SESSION["usuario"] = $registro->nombres;
        $_SESSION["correo"] = $registro->correo;
        $_SESSION["perfilId"] = $registro->perfilId;
    }

 
 }
?>