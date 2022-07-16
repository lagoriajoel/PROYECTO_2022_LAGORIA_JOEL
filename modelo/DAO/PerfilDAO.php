<?php
 require_once "DAOinterface.php";
 require_once "modelo/DAO/DAOInterface.php";
require_once "modelo/entidades/PerfilEntidad.php"; 

 class PerfilDAO  implements DAOinterface {


  private $conexion=null;
   

     function __construct($conexion){
       
       $this->conexion = $conexion; 

    }

    // implementar metodos de la interfaz

 
    
     
    
    
    public function cargar($id){
        
       
       
        $sql='SELECT * FROM perfiles WHERE id=?';

        $stmt=$this->conexion->prepare($sql);
        $stmt->execute(array($id));

        $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
       
        $count=$stmt->rowCount();
       
        if ($count===0) {
           echo "registro vacio";
        } 
        else {
          
            foreach($resultado as $result){

                echo  $result['id']." ".$result['nombre'];
              }
        }
        
        
    }

    public function guardar($entidad){
        
        $this->validar($entidad);
        $this->existePerfil($entidad);


        $sql='INSERT INTO perfiles VALUES (DEFAULT, :nombre)';

        $stmt= $this->conexion->prepare($sql);
        $stmt->execute(array("nombre"=>$entidad->getNombre()));

      if ($stmt->rowCount()!= 1){

        
        try {
            throw new Exception("No se puede Ingresar Registro");
        } catch(Exception $e) {
            echo $e->getMessage();
        }
      }
      

    }
        
    public function eliminar($id){

      $sql='DELETE FROM perfiles WHERE id = ?';
      $stmt= $this->conexion->prepare($sql);
     if ($stmt->execute(array($id))) {
        echo "Registro eliminado correctamente";
     }else{echo " Error al eliminar el registro";}


    }

    public function actualizar($entidad){

       try {
        $sql='UPDATE perfiles SET nombre=? WHERE id=?';
        $stmt->execute(array($entidad->getNombre(), $entidad->getId())); 
        echo "Registro Actualizado correctamente";
      
    } catch(Exception $e) {
        echo "Error al actualizar la informacion".$e->getMessage();
    }
       
      
      

    }

    public function listar($filtros): array{

           $sql='SELECT id, nombre FROM perfiles' ;
           $stmt= $this->conexion->prepare($sql);
           $stmt->execute(); 
           $listado=$stmt->fetchAll(PDO::FETCH_ASSOC);
           $stmt->closeCursor();
           return $listado;


    }


    public function validar ($entidad){



        if($entidad->getNombre()===""){


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
       $stmt->execute(array($entidad->getId()));

       if($stmt==1){

        throw new Exception("Error al ingresar datos 1");
       }

    }

 
 }
?>