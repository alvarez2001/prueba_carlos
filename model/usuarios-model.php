<?php
include '../controllers/usuarios-controllers.php';

if(isset($_POST['form-registro'])){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $imagen = $_FILES['imagen'];

    $campos = [];

    if($nombre == ''){
        array_push($campos,'Ingrese su nombre');
    }
    if($apellido == ''){
        array_push($campos,'Ingrese su apellido');
    }
    if($email == ''){
        array_push($campos,'Ingrese su email');
    }
    if($imagen['name'] == ''){
        array_push($campos,'Ingrese su avatar');
    }
    if(count($campos) > 0){
        $error = $campos;
        $error = serialize($error);
        $error = urlencode($error);
        header("Location: ../vistas/login.php?error='$error'");
    }else{
        $crearUsuario = new Usuarios();
        $crearUsuario->registrar_usuario($nombre,$apellido,$email,$imagen);
    }
}