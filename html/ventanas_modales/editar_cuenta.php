<div class="modal fade" id="editar-cuenta" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Editar Cuenta de Usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input name="usuario" class="form-control" type="text" id="usuario" required value="<?php echo $usuario; ?>">
                    </div>
                    <div class="form-group">
                        <label for="pass1">Contraseña nueva</label>
                        <input name="contrasenia" type="password" class="form-control" required id="pass1">
                    </div>
                    <div class="form-group">
                        <label for="pass2">Confirmar Contraseña</label>
                        <input name="confirm-contra" type="password" class="form-control" required id="pass2">
                    </div>
            </div>
            <div class="modal-footer">
                <button id="editar" type="submit" class="btn btn-primary" name="editar-usuario" disabled>Aceptar</button>
            </div>
            <p id="mensaje"></p>
        </div>
    </div>
    </div>