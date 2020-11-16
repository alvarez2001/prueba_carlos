<?php
include_once 'db.php';

$conexion = new DB();
$conexion->crearDb();
$conexion->crearTablaUsuario();