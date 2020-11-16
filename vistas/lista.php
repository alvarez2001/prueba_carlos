<?php 
require_once './header.php';
require_once '../controllers/usuarios-controllers.php';
 ?>

<div class="container vh-100">
    <div class="row">
        <div class="col-12 mt-5">
            <h1 class="text-center text-white text-uppercase">Lista de usuarios</h1>
        </div>
        <div class="col-12  mx-auto my-3">
        <table class="table table-light table-striped rounded text-center">
                <thead class="thead-primary">
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Email</th>
                    <th scope="col">Imagen</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                        $usuarios = new Usuarios();
                        $usuariosLista = $usuarios->listado_usuarios();

                        if($usuariosLista->num_rows > 0){
                            while ($row  = $usuariosLista->fetch_assoc()){
                                ?>
                                <tr>
                                    <td><?php echo $row['id']?></td>
                                    <td><?php echo $row['nombre']?></td>
                                    <td><?php echo $row['apellidos']?></td>
                                    <td><?php echo $row['email']?></td>
                                    <td>
                                        <img src="<?php echo '../'.$row['imagen']?>" alt="<?php echo $row['nombres']?>" style="width:60px; heigth:60px;">
                                    </td>
                                </tr>
                                <?php
                            }
                        }else{
                            ?>
                            <tr>
                            <td colspan="5">No hay datos en este momento</td>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once './footer.php'; ?>