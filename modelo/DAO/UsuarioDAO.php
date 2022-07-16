<?php
 require_once "DAOinterface.php";

 class UsuarioDAO  implements DAOinterface {


  private $conexion=null;
   

     function __construct($conexion){
       
       $this->conexion = $conexion; 

    }

    // implementar metodos de la interfaz



    public function cargar($id){
        
       
       
        $sql='SELECT * FROM usuarios WHERE id=?';

        $stmt=$this->conexion->prepare($sql);
        $stmt->execute(array($id));

        $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
       
        $count=$stmt->rowCount();
       
        if ($count===0) {
           echo "registro vacio";
        } 
        else {
          
            foreach($resultado as $result){

                echo  $result['id']." ".$result['cuenta']." ".$result['clave']." ".$result['apellido']." ".$result['nombres']." ".$result['correo']." ".$result['fecha_alta']." ".$result['estado']." ".$result['id_perfil'];
              }
        }
        
        
    }


    public function guardar($entidad){
        
        $this->validar($entidad);
        $this->existePerfil($entidad);


        $sql='INSERT INTO usuarios VALUES (DEFAULT ,?,?,?,?,?,?,?,?)';

        $stmt= $this->conexion->prepare($sql);
        $stmt->execute(array($entidad->getCuenta(),$entidad->getClave(),$entidad->getApellido(),$entidad->getNombres(),$entidad->getFechaDeAlta(),$entidad->getCorreo(),$entidad->getEstado(),$entidad->getIdPerfil()));

      if ($stmt->rowCount()!= 1){

        
        try {
            throw new Exception("No se puede Ingresar Registro");
        } catch(Exception $e) {
            echo $e->getMessage();
        }
      }
      

    }

 
   

   
        
    public function eliminar($id){

      $sql='DELETE FROM usuarios WHERE id = ?';
      $stmt= $this->conexion->prepare($sql);
     if ($stmt->execute(array($id))) {
        echo "Registro eliminado correctamente";
     }else{echo " Error al eliminar el registro";}


    }

    public function actualizar($entidad){

       try {
        $sql='UPDATE usuarios SET id=?, cuenta=?, clave=?,apellido=?,nombres=?,correo=?,fecha_alta=?,estado=?,id_perfil=? WHERE id=?';
        $stmt->execute(array($entidad->getId(),$entidad->getCuenta(),$entidad->getClave(),$entidad->getApellido(),$entidad->getNombres(),$entidad->getFechaDeAlta(),$entidad->getCorreo(),$entidad->getEstado(),$entidad->getIdPerfil())); 
        echo "Registro Actualizado correctamente";
      
    } catch(Exception $e) {
        echo "Error al actualizar la informacion".$e->getMessage();
    }
       
      
      

    }

    public function listar($filtros){

        $sql='SELECT * FROM usuarios' ;
        $stmt= $this->conexion->prepare($sql);
        $stmt->execute(); 
        $listado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $listado;


    }


    public function validar ($entidad){



        if($entidad->getNombres()===""){


            try {
                throw new Exception("Error al ingresar datos");
            } catch(Exception $e) {
                echo $e->getMessage();
            }
            
        }
    }

    private function existePerfil($entidad){

       $sql='SELECT id FROM perfiles WHERE id=?';

       $stmt=$this->conexion->prepare($sql);
       $stmt->execute(array($entidad->getIdUsuario()));

       if($stmt==1){

        throw new Exception("Error al ingresar datos 1");
       }

    }

 
 }
?>