<?php
 require_once "DAOinterface.php";

 class AlumnoDAO  implements DAOinterface {


  private $conexion=null;
   

     function __construct($conexion){
       
       $this->conexion = $conexion; 

    }

    // implementar metodos de la interfaz



    public function cargar($id){
        
       
       
        $sql='SELECT * FROM alumnos WHERE id=?';

        $stmt=$this->conexion->prepare($sql);
        $stmt->execute(array($id));

        $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
       
        $count=$stmt->rowCount();
       
        if ($count===0) {
           echo "registro vacio";
        } 
        else {
          
            foreach($resultado as $result){

                echo  $result['id']." ".$result['apellido']." ".$result['nombres']." ".$result['dni']." ".$result['cuil']." ".$result['domicilio']." ".$result['domicilio_localidad']." ".$result['domicilio_provincia']." ".$result['telefono01']." ".$result['telefono02']." ".$result['fecha_nacimiento']." ".$result['fecha_alta'];
              }
        }
        
        
    }


    public function guardar($entidad){
        
        $this->validar($entidad);
        $this->existePerfil($entidad);


        $sql='INSERT INTO alumnos VALUES (DEFAULT ,?,?,?,?,?,?,?,?,?,?,?)';

        $stmt= $this->conexion->prepare($sql);
        $stmt->execute(array($entidad->getApellido(),$entidad->getNombres(),$entidad->getDni(),$entidad->getCuil(),$entidad->getDomicilio(),$entidad->getDomicilioLocalidad(),$entidad->getDomicilioProvincia(),$entidad->getTelefono01(),$entidad->getTelefono02(),$entidad->getFechaNacimiento(),$entidad->getFechaAlta()));
        echo "registro Agregado";

      if ($stmt->rowCount()!= 1){

        
        try {
            throw new Exception("No se puede Ingresar Registro");
        } catch(Exception $e) {
            echo $e->getMessage();
        }
      }
      

    }

 
   

   
        
    public function eliminar($id){

      $sql='DELETE FROM alumnos WHERE id = ?';
      $stmt= $this->conexion->prepare($sql);
     if ($stmt->execute(array($id))) {
        echo "Registro eliminado correctamente";
     }else{echo " Error al eliminar el registro";}


    }

    public function actualizar($entidad){

       try {
        $sql='UPDATE usuarios SET id=?, apellido=?,=?,nombres=?,dni=?,cuil=?,domicilio=?,domicilio_localidad=?,domicilio_provincia=?,telefono01=?,telefono02=?,fecha_nacimiento=?,fecha_alta=? WHERE id=?';
        $stmt->execute(array($entidad->getId(),$entidad->getApellido(),$entidad->getNombres(),$entidad->getDni(),$entidad->getCuil(),$entidad->getDomicilio(),entidad->getDomicilioLocalidad(),entidad->getDomicilioProvincia(),$entidad->getTelefono01(),$entidad->getTelefono02()),$entidad->getFechaNacimiento(),$entidad->getFechaDeAlta()); 
        echo "Registro Actualizado correctamente";
      
    } catch(Exception $e) {
        echo "Error al actualizar la informacion".$e->getMessage();
    }
       
      
      

    }

    public function listar($filtros){

        $sql='SELECT * FROM alumnos' ;
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
       $stmt->execute(array($entidad->getId()));

       if($stmt==1){

        throw new Exception("Error al ingresar datos 1");
       }

    }

 
 }
?>