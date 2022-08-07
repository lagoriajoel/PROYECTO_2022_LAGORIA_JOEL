<?php
//Capturar los parámetros de entrada
//Desde el HTACCESS se analiza el patrón de la url solicitada, y envia los parametros que se correspondan
// controlador
// controlador/accion
// controlador/accion/data
//Captura de parámetros => $_POST[] || $_GET[]
//Faltaría validar, si ingresan parametros, que estos sean validos, sino se los cambia a los valores por defecto

//Manejo de SESIONES
$controlador = "usuario";
$accion = "login";
$data = $filtros = "";

session_start();

if(isset($_SESSION["logueado"]) && ($_SESSION["logueado"] === 2022)){

    $controlador = filter_input(INPUT_GET,"controlador");   //$controlador = $_GET["controlador"]
    if(!$controlador) $controlador = "inicio";              //Controlador por defecto, sino se especifico el parametro
    $accion = filter_input(INPUT_GET,"accion");             //$accion = $_GET["accion"]
    if(!$accion) $accion = "index";
    $data = filter_input(INPUT_GET,"data");                 //$data = $_GET["data"]
    if(!$data) $data = "";
    $filtros = "";
}

//Invocar el controlador y accion correspondiente.
require_once 'controlador/'.ucfirst($controlador).'Controlador.php';
//Convertir $controlador a objeto. String => Object()
// Ejemplo => $objeto = new InicioControlador();
$clase = $controlador."Controlador";
$objeto = new $clase;
//llamar al metodo que corresponda
// Ejemplo => $objeto->index();
call_user_func_array(array($objeto, $accion), array($data, $filtros));