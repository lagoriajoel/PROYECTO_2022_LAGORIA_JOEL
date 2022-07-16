<?php
require_once "../modelo/entidades/PerfilEntidad.php";
require_once "../modelo/entidades/AlumnoEntidad.php";
require_once "../modelo/entidades/UsuarioEntidad.php";



use modelo\entidades\PerfilEntidad as PerfilEntidad;
use modelo\entidades\AlumnoEntidad as AlumnoEntidad;
use modelo\entidades\UsuarioEntidad as UsuarioEntidad;


$perfil= new PerfilEntidad();

$perfil->setId(5);
$perfil->setNombre("Operador");


print_r($perfil->toJSON());


// datatime => string => yyyy-mm-dd hh-mm-ss

// isString && strlen ==19
// estado => tiniint (1)    estado===0 || estado ===1
// fechaNacimiento string   strl(10) 



$perfilAlumno= new AlumnoEntidad();

$perfilAlumno->setIdAlumno(5);
$perfilAlumno->setNombres("joel");
$perfilAlumno->setApellido("Lagoria");
$perfilAlumno->setDni("34075813");

print_r($perfilAlumno->toJSON());

// usuario entidad
$perfilUsuario= new UsuarioEntidad();

$perfilUsuario->setIdUsuario(20);
$perfilUsuario->setCuenta("lagoriaJoel");
$perfilUsuario->setClave("456789");
$perfilUsuario->setCorreo("lagoriajoel3413@gmail.com");



print_r($perfilUsuario->toJSON());

