<?php

include '../db.php';

class Usuarios{
    public function registrar_usuario($nombre, $apellido, $email, $imagen){
        $conexion = new DB();
        $establecida = $conexion->establecerConexion(true);
        $fechaActual = new DateTime();
        $rutaImagen = 'images/'.$fechaActual->getTimestamp().$imagen['name'];

        move_uploaded_file($imagen['tmp_name'],'./../'.$rutaImagen);

        $prepare = $establecida->prepare("INSERT INTO usuarios(nombre, apellidos, email, imagen) VALUES (?,?,?,?)");
        $prepare->bind_param('ssss', $nombre,$apellido,$email,$rutaImagen);
        
        if($prepare->execute()){
            $prepare->close();
            $establecida->close();
            header('Location: ../vistas/lista.php');
        }else{
            $error = ['No se ha podido guardar los datos'];
            $error = serialize($error);
            $error = urlencode($error);
            $prepare->close();
            $establecida->close();
            header("Location: ../vistas/login.php?error='$error'");

        }
        
    }

    public function listado_usuarios(){
        $conexion = new DB();
        $establecida = $conexion->establecerConexion(true);
        $prepare = $establecida->prepare("SELECT * FROM usuarios ORDER BY usuarios.nombre");
        if($prepare->execute()){
            
            $result = $prepare->get_result();
            $prepare->close();
            $establecida->close();
            return $result;
        }else{
            $error = ['ha ocurrido un error al hacer la consulta'];
            $error = serialize($error);
            $error = urlencode($error);
            $prepare->close();
            $establecida->close();
            header("Location: ../vistas/login.php?error='$error'");
        }
    }
}