<div id="agregarEmpleadoModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="agregarEmpleado">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Empleado</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <br>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Datos básicos</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Datos Laborales</a>
<!--                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>-->
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <br><div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Nombre</label>
                            <div class="col-sm-4">
                                <input type="text" name="txtNombre"  id="name" class="form-control" placeholder="Ingrese el nombre del empleado" required>
                                <input type="hidden" id="opcion" name="opcion" value="registrar">
                            </div>
                            <label class="col-sm-1 col-form-label">Apellido</label>
                            <div class="col-sm-4">
                                <input type="text" name="txtApellido"  id="ape" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">CI</label>
                            <div class="col-sm-4">
                                <input type="number" name="txtCi"  id="ci" class="form-control" required>
                            </div>
                            <label class="col-sm-1 col-form-label">Sexo</label>
                            <div class="col-sm-4">
                                <select name="cbSexo" id="sexo" class="custom-select" required>
                                    <option value="" selected disabled>--Selecciona--</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Cumpleanos</label>
                            <div class="col-sm-4">
                                <input type="date" name="fechaNac"  id="fechaNac" class="form-control" required>
                            </div>
                            <label class="col-sm-1 col-form-label">Telefono</label>
                            <div class="col-sm-4">
                                <input type="text" name="txtTelefono"  id="telefono" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Direccion</label>
                            <div class="col-sm-9">
                                <textarea name="txtDireccion"  id="direccion" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Email</label>
                            <div class="col-sm-9">
                                <input type="email" name="txtEmail"  id="email" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Estado civil</label>
                                <div class="col-sm-9">
                                    <select name="cbCivil" id="edit_civil" class="custom-select" required>
                                        <option value="" selected disabled>--Selecciona--</option>
                                        <?php
                                        $r = EmpleadoControlador::mostrarEstadoCivil();
                                        while(($fila = $r->fetch(PDO::FETCH_ASSOC)) != NULL) {
                                            echo '<option value="'.$fila['idEstadoCivil'].'">'.$fila['estadoCivil'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Departamento</label>
                            <div class="col-sm-9">
                                <select name="cbDepartamento" id="edit_depto" class="custom-select" required>
                                    <option value="" selected disabled>--Selecciona--</option>
                                    <?php
                                    $r = EmpleadoControlador::mostrarDepartamentos();
                                    while(($fila = $r->fetch(PDO::FETCH_ASSOC)) != NULL) {
                                        echo '<option value="'.$fila['idDepartamento'].'">'.$fila['nombreDepartamento'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Salario</label>
                            <div class="col-sm-9">
                                <input type="number" name="txtSalario"  id="salario" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Cargo</label>
                            <div class="col-sm-9">
                                <select name="cbCargo" id="edit_cargo" class="custom-select" required>
                                    <option value="" selected disabled>--Selecciona--</option>
                                    <?php
                                    $r = EmpleadoControlador::mostrarCargos();
                                    while(($fila = $r->fetch(PDO::FETCH_ASSOC)) != NULL) {
                                        echo '<option value="'.$fila['idCargo'].'">'.$fila['nombreCargo'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
<!--                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>-->
                </div>

                <div class="modal-footer">
                    <input id="btnCerrar" type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                    <input type="submit" class="btn btn-success" value="Guardar datos">
                </div>
            </form>
        </div>
    </div>
</div>