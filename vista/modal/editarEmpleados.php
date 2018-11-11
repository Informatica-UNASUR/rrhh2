<div id="editarEmpleadoModal2" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editarEmpleado">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Empleado</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <br>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Datos básicos</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <br><div class="form-group row mb-2">
                            <label class="col-sm-2 col-form-label text-right">Nombre</label>
                            <div class="col-sm-4">
                                <input type="text" name="txtNombre"  id="edit_name" class="form-control" placeholder="Ingrese el nombre del empleado" required>
                                <input type="hidden" name="txtIdEmpleado" id="edit_id" >
                                <input type="hidden" id="opcion" name="opcion" value="modificar">
                            </div>
                            <label class="col-sm-1 col-form-label">Apellido</label>
                            <div class="col-sm-4">
                                <input type="text" name="txtApellido"  id="edit_ape" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-sm-2 col-form-label text-right">CI</label>
                            <div class="col-sm-4">
                                <input type="text" name="txtCi"  id="edit_ci" class="form-control" required>
                            </div>
                            <label class="col-sm-1 col-form-label">Sexo</label>
                            <div class="col-sm-4">
                                <select name="cbSexo" id="edit_sexo" class="custom-select">
                                    <option value="" selected disabled>--Selecciona--</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-sm-2 col-form-label text-right">Cumpleanos</label>
                            <div class="col-sm-4">
                                <input type="text" name="fechaNac"  id="edit_fecha" class="form-control">
                            </div>
                            <label class="col-sm-1 col-form-label">Telefono</label>
                            <div class="col-sm-4">
                                <input type="text" name="txtTelefono"  id="edit_telefono" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-sm-2 col-form-label text-right">Direccion</label>
                            <div class="col-sm-4">
                                <input name="txtDireccion"  id="edit_direccion" class="form-control" required>
                            </div>
                            <label class="col-sm-1 col-form-label text-right">Email</label>
                            <div class="col-sm-4">
                                <input type="email" name="txtEmail"  id="edit_email" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-sm-2 col-form-label text-right">Cuenta bancaria</label>
                            <div class="col-sm-4">
                                <input type="text" name="txtCtaBanco"  id="edit_cta" class="form-control" required>
                            </div>
                            <label class="col-sm-1 col-form-label">Nac.</label>
                            <div class="col-sm-4">
                                <input type="text" name="txtNacionalidad"  id="edit_nacionalidad" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-sm-2 col-form-label text-right">Horario</label>
                            <div class="col-sm-4">
                                <select name="cbHorario" id="idHorario" class="custom-select">
                                    <?php
                                    $r = EmpleadoControlador::mostrarHorarios();
                                    while(($fila = $r->fetch(PDO::FETCH_ASSOC)) != NULL) {
                                        echo '<option value="'.$fila['idHorario'].'">'.'ENT: '.$fila['horaEntrada'].'/SAL: '.$fila['horaSalida'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <label class="col-sm-1 col-form-label text-right">Estado</label>
                            <div class="col-sm-4">
                                <select class="custom-select" name="txtEstado" id="edit_estado" required>
                                    <option selected value='1'>Activado</option>
                                    <option value='0'>Desactivado</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label class="col-sm-2 col-form-label text-right">Estado civil</label>
                            <div class="col-sm-4">
                                <select name="cbCivil" id="idEstadoCivil" class="custom-select">
                                    <?php
                                    $r = EmpleadoControlador::mostrarEstadoCivil();
                                    while(($fila = $r->fetch(PDO::FETCH_ASSOC)) != NULL) {
                                        echo '<option value="'.$fila['idEstadoCivil'].'">'.$fila['estadoCivil'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <label class="col-sm-1 col-form-label text-right">Contrato</label>
                            <div class="col-sm-4">
                                <select name="txtContrato" id="idContrato" class="custom-select">
                                    <?php
                                    $r = EmpleadoControlador::mostrarContratos();
                                    while(($fila = $r->fetch(PDO::FETCH_ASSOC)) != NULL) {
                                        echo '<option value="'.$fila['idContrato'].'">'.$fila['tipoContrato'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-sm-2 col-form-label text-right">Fecha ingreso</label>
                            <div class="col-sm-4">
                                <input type="text" name="txtFechaIn"  id="edit_ingreso" class="form-control" required>
                            </div>
                            <label class="col-sm-1 col-form-label">Salario</label>
                            <div class="col-sm-4">
                                <input type="text" name="txtSalario" id="edit_salario" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-sm-2 col-form-label text-right">Departamento</label>
                            <div class="col-sm-4">
                                <select name="cbDepartamento" id="idDepartamento" class="custom-select">
                                    <option value="" disabled>--Selecciona el departamento--</option>
                                    <?php
                                    $r = EmpleadoControlador::mostrarDepartamentos();
                                    while(($fila = $r->fetch(PDO::FETCH_ASSOC)) != NULL) {
                                        echo '<option value="'.$fila['idDepartamento'].'">'.$fila['nombreDepartamento'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <label class="col-sm-1 col-form-label">Cargo</label>
                            <div class="col-sm-4">
                                <select name="cbCargo" id="idCargo" class="custom-select">
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
                </div>

                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                    <input type="submit" class="btn btn-success" value="Guardar datos">
                </div>
            </form>
        </div>
    </div>
</div>