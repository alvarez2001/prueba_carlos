<?php require_once './header.php'; ?>

<div class="container vh-100">
    <div class="row">
        <div class="col-12 mt-5">
            <h1 class="text-center text-white text-uppercase">Registro</h1>
        </div>
        <div class="col-12 col-md-6 mx-auto mt-3">
            <form class="card was-validated" action="../model/usuarios-model.php" method="post" enctype="multipart/form-data">
                <div class="row card-body">
                    <div class="col-12 col-md-6 form-group d-none">
                        <input class="form-control" type="hidden" name="form-registro" >
                    </div>

                    <div class="col-12 col-md-6 form-group">
                        <label for="nombre">Nombre:</label>
                        <input class="form-control" type="text" name="nombre" id="nombre" required placeholder="Ingrese su nombre">
                    </div>

                    <div class="col-12 col-md-6 form-group">
                        <label for="apellido">Apellido:</label>
                        <input class="form-control" type="text" name="apellido" id="apellido" required placeholder="Ingrese su apellido">
                    </div>

                    <div class="col-12 form-group">
                        <label for="email">E-mail</label>
                        <input class="form-control" type="email" name="email" id="email" required placeholder="Ingrese su E-mail">
                    </div>

                    <div class="col-12 col-md-6 form-group">
                        <label for="imagen">Suba su avatar</label>
                        <input type="file" required class="d-block" name="imagen" id="imagen">
                    </div>

                    <?php if(isset($_GET['error'])){?>
                        <div class="col-12">
                            <div class="alert alert-danger" role="aler">
                                <ul>
                                    <?php
                                        $error = unserialize($_GET['error']);
                                        foreach($error as $err){
                                            ?>
                                            <li>
                                                <?php echo $err;?>
                                            </li>
                                            <?php
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    <?php }?>

                    <div class="col-12 form-group text-center">
                        <button class="btn btn-primary" type="submit">Registrarse</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once './footer.php'; ?>