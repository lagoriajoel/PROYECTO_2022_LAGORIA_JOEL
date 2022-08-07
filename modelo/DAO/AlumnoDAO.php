<?php
 require_once "DAOinterface.php";
 require_once "modelo/DAO/DAOInterface.php";
require_once "modelo/entidades/alumnoEntidad.php";

use modelo\entidades\AlumnoEntidad as AlumnoEntidad;

 class AlumnoDAO  implements DAOinterface {


  private $conexion;
   

     function __construct($conexion){
       
       $this->conexion = $conexion; 

    }

    // implementar metodos de la interfaz



    public function cargar($id){
        
       
        if(!is_integer($id)) throw new Exception("El formato del identificador de alumno es incorrecto");

        $sql = 'SELECT id, apellido, nombres, dni, cuil, domicilio, domicilio_localidad, domicilio_provincia, telefono01, telefono02, correo, DATE_FORMAT(fecha_nacimiento,"%Y-%m-%d") as fechaNacimiento,DATE_FORMAT(fecha_alta,"%Y-%m-%d") as fechaAlta FROM alumnos WHERE id = :id';
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute(array("id" => $id));
        if($stmt->rowCount() != 1){
            throw new Exception("No se encontraron coincidencias con el id = ".$id);
        }
        $registro = $stmt->fetch(PDO::FETCH_ASSOC);
        $alumno = new AlumnoEntidad();
        $alumno->setIdAlumno((int)$registro["id"]);
        $alumno->setApellido($registro["apellido"]);
        $alumno->setNombres($registro["nombres"]);
        $alumno->setDni($registro["dni"]);
        $alumno->setCuil($registro["cuil"]);
        $alumno->setDomicilio($registro["domicilio"]);
        $alumno->setDomicilioLocalidad($registro["domicilio_localidad"]);
        $alumno->setDomicilioProvincia($registro["domicilio_provincia"]);
        $alumno->setTelefono01($registro["telefono01"]);
        $alumno->setTelefono02($registro["telefono02"]);
        $alumno->setCorreo($registro["correo"]);
        $alumno->setFechaNacimiento($registro["fechaNacimiento"]);
        $alumno->setFechaAlta($registro["fechaAlta"]);

        
        return $alumno;
    }
    


    public function guardar($entidad){
        
      try {
        //code...
      

        $sql = 'INSERT INTO alumnos VALUES(DEFAULT, :apellido, :nombres, :dni, :cuil, :domicilio, :domicilio_localidad, :domicilio_provincia,:telefono01, :telefono02,:correo, :fecha_nacimiento, NOW())';
       $stmt = $this->conexion->prepare($sql);
       $stmt->execute(array(
     
           "apellido" => $entidad->getApellido(),
           "nombres" => $entidad->getNombres(),
           "dni" => $entidad->getDni(),
           "cuil" => $entidad->getCuil(),
           "domicilio" => $entidad->getDomicilio(),
           "domicilio_localidad" => $entidad->getDomicilioLocalidad(),
           "domicilio_provincia" => $entidad->getDomicilioProvincia(),
           "telefono01" => $entidad->getTelefono01(),
           "telefono02" => $entidad->getTelefono02(),
           "correo" => $entidad->getCorreo(),
           "fecha_nacimiento" => $entidad->getFechaNacimiento()
        ));
         
       

       
       if($stmt->rowCount() != 1){
           throw new Exception("No se pudo insertar el registro");
       }

      } catch(Exception $e) {
        echo "Error al guardar registro".$e->getMessage();
    }
        
      }
      

        
    public function eliminar($id){

      $sql='DELETE FROM alumnos WHERE id = ?';
      $stmt= $this->conexion->prepare($sql);
      $stmt->execute(array($id));
      if($stmt->rowCount() != 1){
        throw new Exception("No se pudo eliminar el registro");
    }
     


    }

    public function actualizar($entidad){
      
       
    
        $sql='UPDATE alumnos SET apellido=?, nombres=?, dni=?,cuil=?,domicilio=?,domicilio_localidad=?,domicilio_provincia=?,telefono01=?,telefono02=?,fecha_nacimiento=?, correo=? WHERE id=?';
        $stmt= $this->conexion->prepare($sql);
        $stmt->execute(array($entidad->getApellido(),$entidad->getNombres(),$entidad->getDni(),$entidad->getCuil(),$entidad->getDomicilio(),$entidad->getDomicilioLocalidad(),$entidad->getDomicilioProvincia(),$entidad->getTelefono01(),$entidad->getTelefono02(),$entidad->getFechaNacimiento(), $entidad->getCorreo(), $entidad->getId())); 
       
        
         
        if($stmt->rowCount() != 1){
            throw new Exception("Error al actualizar la informacion");
        }
       
      
      

    }

    public function listar($filtros){

        $sql='SELECT * FROM alumnos' ;
        $stmt= $this->conexion->prepare($sql);
        $stmt->execute(); 
        $listado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $listado;
        if($stmt->rowCount() != 1){
            throw new Exception("Error al listar la informacion");
        }
       


    }


    public function validar($entidad){
        
        
        if($entidad->getApellido() === ""){
            throw new Exception("Debe especificar el apellido del usuario");
        }
        if($entidad->getNombres() === ""){
            throw new Exception("Debe especificar el nombre del usuario");
        }
        if($entidad->getDni() === ""){
            throw new Exception("Debe especificar un dni");
        }
        if($entidad->getCuil() === ""){
            throw new Exception("Debe especificar un cuil");
        }
        if($entidad->getDomicilio() === ""){
            throw new Exception("Debe especificar un Domicilio");
        }
        if($entidad->getDomicilioLocalidad() === ""){
            throw new Exception("Debe especificar una Localidad");
        }
        if($entidad->getDomicilioProvincia() === ""){
            throw new Exception("Debe especificar una Provincia");
        } if($entidad->getTelefono01() === ""){
            throw new Exception("Debe especificar una telefono");
        }
        if($entidad->getTelefono02() === ""){
            throw new Exception("Debe especificar una telefono");
        }
        if($entidad->getCorreo() === ""){
            throw new Exception("Debe especificar la dirección de correo");
        }
        if($entidad->getFechaNacimiento() == 0){
            throw new Exception("Debe especificar una fecha de nacimiento");
        }
        if($entidad->getFechaAlta() == 0){
            throw new Exception("Debe especificar una fecha de alta");
        }
    }

    private function existeAlumno($entidad){

       $sql='SELECT id FROM alumnos WHERE id=?';

       $stmt=$this->conexion->prepare($sql);
       $stmt->execute(array($entidad->getId()));

       if($stmt==1){

        throw new Exception("Error al ingresar datos 1");
       }

    }

 
 }
?>