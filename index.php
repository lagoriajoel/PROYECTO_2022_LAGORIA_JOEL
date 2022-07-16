<?php
//Capturar los parámetros de entrada
$controlador = filter_input(INPUT_GET,"controlador");
if(!$controlador) $controlador = "inicio";
$accion = filter_input(INPUT_GET,"accion");
if(!$accion) $accion = "index";
$data = filter_input(INPUT_GET,"data");
if(!$data) $data = "";
$filtros = "";
//Invocar el controlador y accion correspondiente.
require_once 'controlador/'.ucfirst($controlador).'Controlador.php';
//Convertir $controlador a objeto. String => Object()
$clase = $controlador."Controlador";
$objeto = new $clase;
//llamar al metodo que corresponda
call_user_func_array(array($objeto, $accion), array($data, $filtros)); 



