<!--         Modal Login -->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLoginTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLoginTitle">Acceso al sistema</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="loginForm" class="form-signin" action="validarCode.php" method="POST" role="form">
                    <div class="form-group">
                        &nbsp;
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input type="text" name="txtUsuario" id="usuario" class="form-control" placeholder="Ingrese su usuario" required>
                        </div> <!-- input-group.// -->
                    </div> <!-- form-group// -->
                    <div class="form-group">
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input name="txtPassword" id="password" class="form-control" placeholder="Ingrese su contraseña" type="password" required>
                        </div> <!-- input-group.// -->
                    </div> <!-- form-group// -->
                    &nbsp;
                    <button id="ingresar" class="btn btn-lg btn-primary btn-block" type="submit" disabled>Ingresar</button>
                </form>
            </div>
            <div class="modal-footer">
                &nbsp;
            </div>
        </div>
    </div>
</div>
