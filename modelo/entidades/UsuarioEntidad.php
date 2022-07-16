<?php


namespace modelo\entidades;

 final class UsuarioEntidad{

 private   $idUsuario;
 private   $cuenta;
 private   $clave;
 private   $apellido;
 private   $nombres;
 private   $correo;
 private   $fechaDeAlta;
 private   $estado;
 private   $perfilId;
 

        function __construct(){
// atributos de clase
                  $this->setIdUsuario(0);
                  $this->setCuenta("");
                  $this->setClave("");
                  $this->setApellido("");
                  $this->setNombres("");
                  $this->setCorreo("");
            
                  $this->setFechaDeAlta("");
                  $this->setEstado(0);
                  $this->setPerfilId(3);




        }
        // getter

        public function getIdUsuario(): int{

            return $this->idUsuario;
        }
        public function getCuenta(): string{

            return $this->cuenta;
        }
        public function getNombres(): string{

            return $this->nombres;
        }
        public function getApellido(): string{

            return $this->apellido;
        }
        public function getClave(): string{

            return $this->clave;
        }
             
        
        public function getCorreo(): string{

            return $this->correo;
        }
       
        public function getFechaDeAlta(): string{

            return $this->fechaDeAlta;
        }
        public function getEstado(): int{

            return $this->estado;
        }
        public function getIdPerfil(): int{

            return $this->perfilId;
        }

        // setter
        public function setIdUsuario($idUsuario): void {


            $this->idUsuario=(is_integer($idUsuario) && ($idUsuario>0))? $idUsuario:0;
        }
        public function setCuenta($cuenta): void {


            $this->cuenta=(is_string($cuenta) && strlen($cuenta)<=20)? trim($cuenta):"";
        }
        public function setClave($clave): void {


            $this->clave=(is_string($clave) && strlen($clave)<=32)? trim($clave):"";
        }
        public function setNombres($nombres): void {


            $this->nombres=(is_string($nombres) && strlen($nombres)<=45) ? trim($nombres): "";
        }
        public function setApellido($apellido): void {


            $this->apellido=(is_string($apellido) && strlen($apellido)<=45) ? trim($apellido): "";
        }
       
        
        
        public function setCorreo($correo): void {


            $this->correo=(is_string($correo) && strlen($correo)<=80)? trim($correo):"";
        }
        
        public function setFechaDeAlta($fechaDeAlta): void {


            $this->fechaDeAlta=(is_string($fechaDeAlta) && strlen($fechaDeAlta)<=19)? trim($fechaDeAlta):"";
        }
        public function setEstado($estado): void {


            $this->estado=(is_integer($estado) && ($estado>=0))? $estado:0;
        }
        public function setPerfilId($perfilId): void {


            $this->perfilId=(is_integer($perfilId) && ($perfilId>0))? $perfilId:0;
        }

        // metodos extras

        public function toJSON(): object{
          
            $json= json_decode('{}');


            $json->{"idUsuario"}= $this->getIdUsuario();
            $json->{"nombres"}= $this->getNombres();
            $json->{"apellido"}= $this->getApellido();
            $json->{"cuenta"}= $this->getCuenta();
            $json->{"clave"}= $this->getClave();    
            $json->{"correo"}= $this->getCorreo();  
            $json->{"fechaDeAlta"}= $this->getFechaAlta();
            $json->{"estado"}= $this->getEstado();
            $json->{"perfilId"}= $this->getPerfilId();




            return $json;


        }

}
?>