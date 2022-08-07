<?php


namespace modelo\entidades;

 final class AlumnoEntidad{

 private   $idAlumno;
 private   $nombres;
 private   $apellido;
 private   $dni;
 private   $cuil;
 private   $domicilio;
 private   $domicilioLocalidad;
 private   $domicilioProvincia;
 private   $telefono01;
 private   $telefono02;
 private   $correo;
 private   $fechaNacimiento;
 private   $fechaAlta;








        function __construct(){
// atributos de clase
                  $this->setIdAlumno(0);
                 
                  $this->setApellido("");
                  $this->setNombres("");
                  $this->setDni("");
                  $this->setCuil("");
                  $this->setDomicilio("");
                  $this->setDomicilioLocalidad("");
                  $this->setDomicilioProvincia("");
                  $this->setTelefono01("");
                  $this->setTelefono02("");
                  $this->setCorreo("");
                  $this->setFechaNacimiento("");
                  $this->setFechaAlta("");




        }
        // getter

        public function getId(): int{

            return $this->idAlumno;
        }
        public function getNombres(): string{

            return $this->nombres;
        }
        public function getApellido(): string{

            return $this->apellido;
        }
        public function getDni(): string{

            return $this->dni;
        }
        public function getCuil(): string{

            return $this->cuil;
        }
        public function getDomicilio(): string{

            return $this->domicilio;
        }
        public function getDomicilioLocalidad(): string{

            return $this->domicilioLocalidad;
        }
        public function getDomicilioProvincia(): string{

            return $this->domicilioProvincia;
        }
        public function getTelefono01(): string{

            return $this->telefono01;
        }
        public function getTelefono02(): string{

            return $this->telefono02;
        }
        public function getCorreo(): string{

            return $this->correo;
        }
        public function getFechaNacimiento(): string{

            return $this->fechaNacimiento;
        } 
        public function getFechaAlta(): string{

            return $this->fechaAlta;
        }

        // setter
        public function setIdAlumno($idAlumno): void {


            $this->idAlumno=(is_integer($idAlumno) && ($idAlumno>0))? $idAlumno:0;
        }
        public function setNombres($nombres): void {


            $this->nombres=(is_string($nombres) && strlen($nombres)<=45) ? trim($nombres): "";
        }
        public function setApellido($apellido): void {


            $this->apellido=(is_string($apellido) && strlen($apellido)<=45) ? trim($apellido): "";
        }
        public function setDni($dni): void {


            $this->dni=(is_string($dni) && strlen($dni)<=8)? trim($dni):"";
        }
        public function setCuil($cuil): void {


            $this->cuil=(is_string($cuil) && strlen($cuil)<=11)? trim($cuil):"";
        }
        
        public function setDomicilio($domicilio): void {


            $this->domicilio=(is_string($domicilio) && strlen($domicilio)<=100)? trim($domicilio):"";
        }
        public function setDomicilioLocalidad($domicilioLocalidad): void {


            $this->domicilioLocalidad=(is_string($domicilioLocalidad) && strlen($domicilioLocalidad)<=45)? trim($domicilioLocalidad):"";
        }

        public function setDomicilioProvincia($domicilioProvincia): void {


            $this->domicilioProvincia=(is_string($domicilioProvincia) && strlen($domicilioProvincia)<=45)? trim($domicilioProvincia):"";
        }

        public function setTelefono01($telefono01): void {


            $this->telefono01=(is_string($telefono01) && strlen($telefono01)<=20)? trim($telefono01):"";
        }
        public function setTelefono02($telefono02): void {


            $this->telefono02=(is_string($telefono02) && strlen($telefono02)<=20)? trim($telefono02):"";
        }
       
        public function setCorreo($correo): void {


            $this->correo=(is_string($correo) && strlen($correo)<=80)? trim($correo):"";
        }
        public function setFechaNacimiento($fechaNacimiento): void {
            $this->fechaNacimiento = (is_string($fechaNacimiento) && preg_match("/^[0-3][0-9]-[0,1][0-9]-\d{4}(\s{1})[0-2][0-9]:[0-5][0-9]:[0-5][0-9]$/", $fechaNacimiento)) ? $fechaNacimiento : "";
        }
        public function setFechaAlta($fechaAlta): void {
            $this->fechaAlta = (is_string($fechaAlta) && preg_match("/^[0-3][0-9]-[0,1][0-9]-\d{4}(\s{1})[0-2][0-9]:[0-5][0-9]:[0-5][0-9]$/", $fechaAlta)) ? $fechaAlta : "";
        }
        

        // metodos extras

        public function toJSON(): object{
          
            $json= json_decode('{}');


            $json->{"idAlumno"}= $this->getIdAlumno();
            $json->{"nombres"}= $this->getNombres();
            $json->{"apellido"}= $this->getApellido();
            $json->{"dni"}= $this->getDni();
            $json->{"cuil"}= $this->getCuil();
            $json->{"domicilio"}= $this->getDomicilio();
            $json->{"domicilioLocalidad"}= $this->getDomicilioLocalidad();
            $json->{"domicilioProvincia"}= $this->getDomocilioProvincia();
            $json->{"telefono01"}= $this->getTelefono01();
            $json->{"telefono02"}= $this->getTelefono02();
            $json->{"correo"}= $this->getCorreo();

            $json->{"fechaDeNacimimiento"}= $this->getFechaNacimiento();
            $json->{"fechaDeAlta"}= $this->getFechaAlta();





            return $json;


        }

}
?>