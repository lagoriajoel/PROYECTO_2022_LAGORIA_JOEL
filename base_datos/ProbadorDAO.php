<?php
require_once "Conexion.php";
require_once "../modelo/DAO/PerfilDAO.php";
require_once "../modelo/entidades/PerfilEntidad.php";
require_once "../modelo/DAO/UsuarioDAO.php";
require_once "../modelo/entidades/UsuarioEntidad.php";
require_once "../modelo/DAO/AlumnoDAO.php";
require_once "../modelo/entidades/AlumnoEntidad.php";

use modelo\entidades\PerfilEntidad as PerfilEntidad;
use modelo\entidades\UsuarioEntidad as UsuarioEntidad;
use modelo\entidades\AlumnoEntidad as AlumnoEntidad;


try {
    $conexion= Conexion::establecer();
  

    $perfilAdmin = new PerfilEntidad();
   
    $perfilOper = new PerfilEntidad();
    $perfilOper->setId(0);
    $perfilOper->setNombre("Op");
// se crea el dao correspondiente

$daoPerfil= new PerfilDAO($conexion);
// $daoPerfil->guardar($perfilAdmin);
// $daoPerfil->guardar($perfilOper);

//$daoPerfil->cargar(4);


} catch (PDOException $ex) {
   
    echo "error ".$ex->getMessage();
}

// probador para usuario

try {
    

$usuario1=new UsuarioEntidad();


$usuario2->setCuenta("cuenta2");
$usuario2->setClave("0000");
$usuario2->setApellido("Lagoria");
$usuario2->setNombres("J");
$usuario2->setCorreo("lagoriajoel3413@gmail.com");
$usuario2->setFechaDeAlta("22/07/2022");
$usuario2->setEstado(1);
$usuario2->setPerfilId(3);


$usuarioDAO= new UsuarioDAO($conexion);

$usuarioDAO->guardar($usuario2);
// $usuarioDAO->cargar(1);



//$alum1= new AlumnoEntidad();


                  $alum1->setIdAlumno(2);
                  $alum1->setApellido("lagoria");
                  $alum1->setNombres("j");
                  $alum1->setDni("34075813");
                  $alum1->setCuil("20-34075813-8");
                  $alum1->setDomicilio("barrio bicentenerio");
                  $alum1->setDomicilioLocalidad("caleta olivia");
                  $alum1->setDomicilioProvincia("santa cruz");
                  $alum1->setTelefono01("1231");
                  $alum1->setTelefono02("1235");
                  $alum1->setCorreo("lagoriaj@gmail.com");
                  $alum1->setFechaNacimiento("1988/07/18");
                  $alum1->setFechaDeAlta("05/05/2022");

   $AlumnoDAO= new AlumnoDAO($conexion);

  // $AlumnoDAO->guardar($alum1);


    
} catch (PDOException $ex) {
   
    echo "error ".$ex->getMessage();
}