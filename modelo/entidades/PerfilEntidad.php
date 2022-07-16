<?php


namespace modelo\entidades;

 final class PerfilEntidad{

 private   $Id;
 private   $Nombre;

        function __construct(){
// atributos de clase
                  $this->setId(0);
                  $this->setNombre("");


        }
        // getter

        public function getId(): int{

            return $this->Id;
        }
        public function getNombre(): string{

            return $this->Nombre;
        }


        public function setId($Id): void {


            $this->Id=(is_integer($Id) && ($Id>0))? $Id:0;
        }
        public function setNombre($Nombre): void {


            $this->Nombre=(is_string($Nombre) && strlen($Nombre)<=45) ? trim($Nombre): "";
        }

        // metodos extras

        public function toJSON(): object{
            $json= json_decode('{}');


            $json->{"Id"}= $this->getId();
            $json->{"Nombre"}= $this->getNombre();

            return $json;


        }

}
?>